@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ログイン済') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('ようこそ！ここではあなたの作成した英単語帳の一覧が見れます！') }}
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-secondary" onclick="location.href='{{ url('home/create')}}'">新しく英単語帳を作成する</button>
        </div>
    </div>

    <div class="mt-5">
        <div>
            <table class="table table-bordered border-primary">
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

                                <button
                                    onclick="location.href='{{ url('word', [$notebook->id])}}'">
                                    単語帳を開く
                                </button>
                            </td>
                            <td>
                                <button
                                 onclick="location.href='{{ route('home.edit', $notebook->id) }}'">
                                 編集
                                </button>
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
