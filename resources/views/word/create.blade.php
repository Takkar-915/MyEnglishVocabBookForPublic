@extends('layouts.app')

@section('content')
    <h2>新規英単語登録</h2>
    <form action="{{ route('word.store') }}" method="post">
        @csrf
        <div>
            <label for="kind">品詞</label>
            <select name="kind">
                <option value="">品詞を選択</option>
                <option value="名詞" @if( old('kind') === '名詞') selected @endif>名詞</option>
                <option value="動詞" @if (old('kind') === '動詞') selected @endif>動詞</option>
                <option value="形容詞" @if (old('kind') === '形容詞') selected @endif>形容詞</option>
                <option value="副詞" @if (old('kind') === '副詞') selected @endif>副詞</option>
                <option value="前置詞" @if (old('kind') === '前置詞') selected @endif>前置詞</option>
                <option value="その他" @if (old('kind') === 'その他') selected @endif>その他</option>
            </select>

            <label for="word">英単語</label>
            <input type="text" id="word" name="word" value="{{ old('word') }}"
                placeholder="英単語" />

            <label for="mean">意味</label>
            <input type="text" id="mean" name="mean" value="{{ old('mean') }}"
                placeholder="意味" />
        </div>

        <div>
            <a href="{{ route('word.index') }}" role="button">戻る</a>
        </div>

        <button type="submit">登録</button>

        </form>

    @endsection
