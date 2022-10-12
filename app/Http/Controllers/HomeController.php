<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotebookRequest;
use App\Models\Notebook;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $notebooks = Notebook::where('user_id', Auth::user()->id)->get();

        return view(
            'home',
            ['notebooks' => $notebooks]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.create');
    }

    public function store(NotebookRequest $request)
    {
        $notebook = new Notebook;

        $notebook->user_id = auth()->id();

        $notebook->fill($request->all())->save();

        return redirect()->route('home.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notebook = Notebook::find($id);

        return view('home.edit', [
            'notebook' => $notebook
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NotebookRequest $request, $id)
    {
        $notebook = Notebook::find($id);
        $notebook->fill($request->all())->save();

        return redirect()->route('home.index')->with('message', '編集しました。');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Word::where('notebook_id', $id)->delete();

        Notebook::where('id', $id)->delete();

        return redirect()->route('home.index')->with('message', '削除しました。');
    }
}
