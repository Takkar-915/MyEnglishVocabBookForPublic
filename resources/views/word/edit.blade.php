@extends('layouts.app')

@section('content')
<div class="text-center">

    <h2 class="mb-5">英単語編集</h2>
    <div>
        <form action="{{ url("word/{$word->notebook_id}/update/{$word->id}")}}" method="post">
            @method('PUT')
            @csrf
            <div class="mb-3">
            <select name="kind">
                <option value="名詞" @if( old('kind',$word->kind) === '名詞') selected @endif>名詞</option>
                <option value="動詞" @if (old('kind',$word->kind) === '動詞') selected @endif>動詞</option>
                <option value="形容詞" @if (old('kind',$word->kind) === '形容詞') selected @endif>形容詞</option>
                <option value="副詞" @if (old('kind',$word->kind) === '副詞') selected @endif>副詞</option>
                <option value="前置詞" @if (old('kind',$word->kind) === '前置詞') selected @endif>前置詞</option>
                <option value="その他" @if (old('kind',$word->kind) === 'その他') selected @endif>その他</option>
            </select>
            </div>

            <div class="mb-3">
                <label for="word">英単語</label>
                <input type="text" id="word" name="word"
                    value="{{ old('word', $word->word) }}" placeholder="英単語" />
            </div>

            <div class="mb-3">
                <label for="mean">意味</label>
                <input type="text" id="mean" name="mean"
                    value="{{ old('mean', $word->mean) }}" placeholder="意味" />
            </div>

            <div class="mb-3">
                <label for="is_memorized">暗記した？</label>
                <input name="is_memorized" type="hidden" value="0" />
                <input id="is_memorized" name="is_memorized" type="checkbox" value="1"
                {{ old('memorized',$word->is_memorized) == '1' ? 'checked' : '' }}
                 />
            </div>

            <div class="mb-5">
                <button class="btn btn-secondary" type="submit">編集</button>
                <input type="hidden" id="id" name="id" value="{{$word->id}}">
            </div>

            <div>
                <button onClick="history.back()">戻る</button>
            </div>

        </form>
    </div>
</div>
    @endsection
