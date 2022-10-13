@extends('layouts.app')

@section('content')

<div class="text-center">

    <h2 class="mb-5">新規英単語帳登録</h2>

    <div>

        <form action="{{ url('home/store')}}" method="post">
            @csrf
        <div class="mb-3">
                <label for="notebook_name">英単語帳名</label>
                <input type="text" id="notebook_name" name="notebook_name" value="{{ old('notebook_name') }}"
                placeholder="(例)TOEIC用" />
        </div>

        <div class="mb-3">
            <label for="discription">内容の説明</label>
            <input type="text" id="discription" name="discription" value="{{ old('discription') }}"
                placeholder="(例)TOEIC頻出の単語帳です" />
        </div>

        <div class="mb-5">
            <button class="btn btn-secondary" type="submit">登録</button>
        </div>

        <div>
            <button onClick="history.back()">戻る</button>
        </div>

    </form>
</div>

</div>
@endsection
