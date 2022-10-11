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
        {{-- ここに単語帳一覧が表示される --}}
        <div>
        {{-- <button onclick="location.href='{{ route('home.create')}}'">新しく英単語帳を作成する</button> --}}
        <button onclick="location.href='{{ url('home/create')}}'>新しく英単語帳を作成する</button>
        </div>
        <div>
            <table border="1">
                <thead>
                    <tr>
                        <th>単語帳</th>
                        <th>内容</th>
                        <th>単語帳を開く</th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach ($notebooks as $notebook)
                        <tr>
                            <td>{{$notebook->notebook_name}}</td>
                            <td>{{$notebook->discription}}</td>
                            <td>
                                {{-- <a href="{{ route('word.index', $id = $notebook->id) }}">Go!</a> --}}
                                <a href="{{ url('home/word/index', [$notebook->id])}}">単語帳を開く</a>
                            </td>

                            {{-- <td>
                                <form action="{{ route('word.destroy', $word->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('削除してもよろしいですか?');">
                                        削除
                                    </button>
                                </form>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
