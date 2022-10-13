@extends('layouts.app')

@section('content')

<div class="text-center">

    <h2 class="mb-5">英単語帳の編集</h2>

    <div>
        <form action="{{route('home.update',$notebook->id)}}" method="post">
            @method('PUT')
            @csrf

                <div class="mb-3">
                    <label for="notebook_name">英単語帳名</label>
                    <input type="text" id="notebook_name" name="notebook_name"
                    value="{{ old('notebook_name', $notebook->notebook_name) }}" placeholder="英単語" />
                </div>

                <div class="mb-5">
                    <label for="discription">内容の説明</label>
                    <input type="text" id="discription" name="discription"
                    value="{{ old('discription', $notebook->discription) }}" placeholder="意味" />
                </div>

                <div class="mb-5">
                    <button class="btn btn-secondary" type="submit">編集</button>
                </div>

                <div>
                    <button onClick="history.back()">戻る</button>
                </div>
            </form>
    </div>
</div>
@endsection
