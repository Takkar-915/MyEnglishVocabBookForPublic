@extends('layouts.app')

@section('content')
    <h2>英単語帳の編集</h2>
    <div>
        <form action="{{route('home.update',$notebook->id)}}" method="post">
            @method('PUT')
            @csrf
                <label for="notebook_name">英単語帳名</label>
                <input type="text" class="form-control" id="notebook_name" name="notebook_name"
                    value="{{ old('notebook_name', $notebook->notebook_name) }}" placeholder="英単語" />

                <label for="discription">内容の説明</label>
                <input type="text" class="form-control" id="discription" name="discription"
                    value="{{ old('discription', $notebook->discription) }}" placeholder="意味" />
                <div>
                    <a href="{{ route('home.index') }}" role="button">戻る</a>
                    <button type="submit">編集</button>
                </div>
        </form>
    </div>
    @endsection
