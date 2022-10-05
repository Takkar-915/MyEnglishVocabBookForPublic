@extends('layouts.app')


@section('content')
<div>
    <h1>英単語一覧</h1>

    <div>
        <button onclick="location.href='{{ route('word.create')}}'">新しく英単語を登録する</button>
    </div>

    <div>
        <table border="1">
            <thead>
                <tr>
                    <th>品詞</th>
                    <th>英単語</th>
                    <th>意味</th>
                    <th>暗記済</th>
                    <th>編集</th>
                    <th>削除</th>
                </tr>
            </thead>
                <tbody>
                    @foreach ($words as $word)
                    <tr>
                        <td>{{$word->kind}}</td>
                        <td>{{$word->word}}</td>
                        <td>{{$word->mean}}</td>
                        @if ($word->is_memorized === 1)
                            <td>✔</td>
                        @else
                            <td></td>
                        @endif
                        <td>
                            <button onclick="location.href='{{ route('word.edit', $word->id) }}'">編集</button>
                        </td>
                        <td>
                            <form action="{{ route('word.destroy', $word->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('削除してもよろしいですか?');">
                                    削除
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>
@endsection
