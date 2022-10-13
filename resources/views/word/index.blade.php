@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1 class="mb-3">{{$notebook->notebook_name}}</h1>
    <p>{{$notebook->discription}}</p>

    <div class="mb-5">
    <div class="container mt-4">
    <div class="row justify-content-center">
        <div class="btn-group">
            <button class="btn btn-secondary" onclick="location.href='{{ url("home")}}'">英単語帳一覧に戻る</button>
            <button class="btn btn-secondary" onclick="location.href='{{ url("word/{$notebook_id}/create")}}'">新しく英単語を登録する</button>
            @if(count($words) >= 10)
            <button class="btn btn-secondary" onclick="location.href='{{ url("word/{$notebook_id}/test")}}'">英単語テスト</button>
            @else
            <button class="btn btn-secondary" onclick="location.href='{{ url("word/{$notebook_id}")}}'">coming soon…</button>
            @endif
        </div>
    </div>
    </div>
    </div>

    @if(count($words) < 10)
    <div>
        <p class="mb-5">登録された英単語数が10を超えたら英単語テストができるようになります。</p>
    </div>
    @endif


    <div>
        <table class="table table-bordered border-primary">
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
