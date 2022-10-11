<?php

namespace App\Http\Controllers;

use App\Http\Requests\WordRequest;
use App\Models\Notebook;
use App\Models\Word;
use Illuminate\Http\Request;

class WordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    // https://nebikatsu.com/8428.html/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $words = Word::where('notebook_id', $id)->get();

        return view(
            'word.index',
            [
                'words' => $words,
                'notebook_id' => $id
            ],
        );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view(
            'word.create',
            ['notebook_id' => $id]
        );
    }

    /**
     * Store a newly created resource in storage.
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WordRequest $request, $id)
    {
        $word = new Word;

        $word->notebook_id = $id;

        $word->fill($request->all())->save();

        return redirect()->route('word.index', [$word->notebook_id])->with('message', '登録しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function edit(Request $request)
    {
        $word = Word::find($request->id);
        // $word = Word::find(124);

        return view('word.edit', [
            'word' => $word
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WordRequest $request, $id)
    {
        $word = Word::find($request->id);

        $word->fill($request->all())->save();

        return redirect()->route('word.index', [$word->notebook_id])->with('message', '登録しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $word = Word::find($request->id);

        Word::where('id', $request->id)->delete();

        return redirect()->route('word.index', [$word->notebook_id])->with('message', '登録しました。');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function test($id)
    {
        $words = Word::where('notebook_id', $id)->get();

        return view(
            'word.test',
            [
                'words' => $words,
                'notebook_id' => $id
            ],
        );
    }
}
