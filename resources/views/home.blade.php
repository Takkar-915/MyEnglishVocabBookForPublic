@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>

    <div>
        <a href='{{ url('home/create')}}'>新しく英単語帳を作成する</a>
    </div>

    <div>
        <div>
            <table border="1">
                <thead>
                    <tr>
                        <th>単語帳</th>
                        <th>内容</th>
                        <th>単語帳を開く</th>
                        <th>編集</th>
                        <th>削除</th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach ($notebooks as $notebook)
                        <tr>
                            <td>{{$notebook->notebook_name}}</td>
                            <td>{{$notebook->discription}}</td>
                            <td>
                                <a href="{{ url('word', [$notebook->id])}}">単語帳を開く</a>
                            </td>
                            <td>
                                <button onclick="location.href='{{ route('home.edit', $notebook->id) }}'">編集</button>
                            </td>

                            <td>
                                <form action="{{ route('home.destroy', $notebook->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('この英単語帳内のすべての英単語も削除されます。本当によろしいですか?');">
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
</div>

@endsection
