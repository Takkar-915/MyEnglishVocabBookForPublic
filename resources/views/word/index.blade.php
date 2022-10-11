@extends('layouts.app')

@section('content')
<div>
    <h1>英単語一覧</h1>

    <div>
        <a href='{{ url("word/{$notebook_id}/create")}}'>新しく英単語を登録する</a>
    </div>

    <div>
        <a href='{{ url("home")}}'>単語帳一覧に戻る</a>
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
                            {{-- <a href='{{ url("word/{$notebook_id}/edit/{$word->id}")}}'>編集</a> --}}
                            {{-- <a href='{{ url("word/{$notebook_id}/edit",[$id = $word->id])}}'>編集</a> --}}
                            <form action={{ url("word/{$notebook_id}/edit/{$word->id}")}} method="get">
                                <div>
                                    <input type="hidden" id="id" name="id" value="{{$word->id}}">
                                    <input type="submit" value="編集">
                                </div>
                            </form>
                        </td>
                        <td>
                            <form action="{{ url("word/{$notebook_id}/destroy/{$word->id}")}}" method="post">
                                @csrf
                                @method('DELETE')
                                <div>
                                    <input type="hidden" id="id" name="id" value="{{$word->id}}">
                                    <button type="submit"
                                    onclick="return confirm('削除してもよろしいですか?');">削除</button>
                                </div>

                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>
@endsection
