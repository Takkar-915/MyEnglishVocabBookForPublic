@extends('layouts.app')

@section('content')
    <h2>新規英単語帳登録</h2>
    <form action="{{ url('home/store')}}" method="post">
        @csrf
        <div>
            <label for="notebook_name">英単語帳名</label>
            <input type="text" id="notebook_name" name="notebook_name" value="{{ old('notebook_name') }}"
                placeholder="(例)TOEIC公式問題集まとめ" />

            <label for="discription">内容の説明</label>
            <input type="text" id="discription" name="discription" value="{{ old('discription') }}"
                placeholder="(例)TOEIC公式問題集で分からなかった単語です" />
        </div>

        <div>
            <a href="{{ url('home')}}" role="button">戻る</a>
        </div>

        <button type="submit">登録</button>

        </form>

    @endsection
