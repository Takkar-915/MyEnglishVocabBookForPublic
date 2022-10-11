@extends('layouts.app')

@section('content')
<div>
    <h1>英単語テスト</h1>

    <div>
        <form method="POST" action="answer.php">
        @foreach ($words as $word)
        <p>問1</p>
        <p>{{$word->word}}</p>
        <p>選択肢</p>
        <input type="radio" name="question" value="" />{{$word->mean}}<br>
        {{-- <input type="hidden" name="answer" value="<?php echo $answer ?>"> --}}
        @endforeach
        <input type="submit" value="回答する">
        </form>
    </div>

    <div>
    {{-- @while (count($word))

    @endwhile --}}
    </div>
</div>

@endsection
