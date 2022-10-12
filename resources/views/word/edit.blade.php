@extends('layouts.app')

@section('content')
    <h2>英単語編集</h2>
     <div>
        <form action="{{ url("word/{$word->notebook_id}/update/{$word->id}")}}" method="post">
            @method('PUT')
            @csrf
            <select name="kind">
                <option value="名詞" @if( old('kind',$word->kind) === '名詞') selected @endif>名詞</option>
                <option value="動詞" @if (old('kind',$word->kind) === '動詞') selected @endif>動詞</option>
                <option value="形容詞" @if (old('kind',$word->kind) === '形容詞') selected @endif>形容詞</option>
                <option value="副詞" @if (old('kind',$word->kind) === '副詞') selected @endif>副詞</option>
                <option value="前置詞" @if (old('kind',$word->kind) === '前置詞') selected @endif>前置詞</option>
                <option value="その他" @if (old('kind',$word->kind) === 'その他') selected @endif>その他</option>
            </select>

                    <label for="word">英単語</label>
                    <input type="text" id="word" name="word"
                        value="{{ old('word', $word->word) }}" placeholder="英単語" />

                    <label for="mean">意味</label>
                    <input type="text" id="mean" name="mean"
                        value="{{ old('mean', $word->mean) }}" placeholder="意味" />

                    <label for="is_memorized">暗記した？</label>
                    <input name="is_memorized" type="hidden" value="0" />
                    <input id="is_memorized" name="is_memorized" type="checkbox" value="1"
                    {{ old('memorized',$word->is_memorized) == '1' ? 'checked' : '' }}
                     />

                </div>
                    <div>
                        <a href="{{ url("word/{$word->notebook_id}")}}" role="button">戻る</a>
                        <button type="submit">編集</button>
                        <input type="hidden" id="id" name="id" value="{{$word->id}}">
                    </div>
        </form>
    </div>
    @endsection
