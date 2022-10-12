@extends('layouts.app')

@section('content')
<div>
    <h1>英単語テスト</h1>

    @if (session('message'))

    <div class="alert alert-success">

        {{ session('message') }}

    </div>

    @endif


    <a href='{{ url("word/{$notebook_id}")}}'>単語帳一覧に戻る</a>

    <div>
        <form method="POST" action="{{ url("word/{$notebook_id}/result")}}">
            @csrf
            <p>以下の英単語の意味を選択してください。</p>
            <p>{{$words[0]->word}}</p>

            @php

            $array = array();
            $array[0] = 0;
            $array[1] = 1;
            $array[2] = 2;
            $array[3] = 3;
            shuffle($array);
            @endphp

            <label for="selected_1"><input type="radio" id="selected_1" name="question" value="{{$words[$array[0]]->mean}}" /> {{$words[$array[0]]->mean}}</label><br>
            <label for="selected_2"><input type="radio" id="selected_2" name="question" value="{{$words[$array[1]]->mean}}" /> {{$words[$array[1]]->mean}}</label><br>
            <label for="selected_3"><input type="radio" id="selected_3" name="question" value="{{$words[$array[2]]->mean}}" /> {{$words[$array[2]]->mean}}</label><br>
            <label for="selected_4"><input type="radio" id="selected_4" name="question" value="{{$words[$array[3]]->mean}}" /> {{$words[$array[3]]->mean}}</label><br>

            <input type="hidden" name="correctMean" value="{{$words[0]->mean}}">
            <input type="hidden" name="correctWord" value="{{$words[0]->word}}">
            <input type="submit" value="回答する">

            </form>
    </div>

</div>

@endsection
