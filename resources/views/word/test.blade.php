@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1 class="mb-5">英単語テスト</h1>

    @if (session('message'))

    <div class="alert alert-success">

        {{ session('message') }}

    </div>

    @endif

    <div class="mb-5">
        <div class="d-grid gap-2 col-6 mx-auto">
    <button class="btn btn-secondary" onclick="location.href='{{ url("word/{$notebook_id}")}}'">英単語帳に戻る</button>
        </div>
    </div>
    <div>
        <form method="POST" action="{{ url("word/{$notebook_id}/result")}}">
            @csrf
            <div class="form-group">
            <p>以下の英単語の意味を選択してください。</p>
            <p class="lead">{{$words[0]->word}}</p>

            @php

            $array = array();
            $array[0] = 0;
            $array[1] = 1;
            $array[2] = 2;
            $array[3] = 3;
            shuffle($array);
            @endphp
            <div class="form-check form-check-inline">
                <label for="selected_1"><input type="radio" id="selected_1" name="question" value="{{$words[$array[0]]->mean}}" /> {{$words[$array[0]]->mean}}</label><br>
            </div>
            <div class="form-check form-check-inline">
                <label for="selected_2"><input type="radio" id="selected_2" name="question" value="{{$words[$array[1]]->mean}}" /> {{$words[$array[1]]->mean}}</label><br>
            </div>
            <div class="form-check form-check-inline">
                <label for="selected_3"><input type="radio" id="selected_3" name="question" value="{{$words[$array[2]]->mean}}" /> {{$words[$array[2]]->mean}}</label><br>
            </div>
            <div class="form-check form-check-inline">
                <label for="selected_4"><input type="radio" id="selected_4" name="question" value="{{$words[$array[3]]->mean}}" /> {{$words[$array[3]]->mean}}</label><br>
            </div>

            <div class="mt-5">
            <button class="btn btn-secondary" type="submit">回答する</button>
            <input type="hidden" name="correctMean" value="{{$words[0]->mean}}">
            <input type="hidden" name="correctWord" value="{{$words[0]->word}}">
            </div>
        </div>
        </form>
    </div>

</div>

@endsection
