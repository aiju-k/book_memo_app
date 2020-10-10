@extends('common.layout')
@section('title', 'メモ編集')
@section('content')
    <!-- 見出し -->
    <h1 class="text-success text-center">メモ検索画面</h1>

    <div class="container">
        <div class="row">
            <div class="col col-lg-8 mx-auto">
                <nav class="card">
                    <div class="card-header text-center">メモを検索する</div>
                    <div class="card-body">
                        <form
                            action="{{ route('memos.search') }}"
                            method="POST"
                        >
                        @csrf
                        <div class="form-group">
                            <!-- 何も入力されずに検索された場合のエラー -->
                            @if(isset($message))
                                <div class="alert alert-danger">
                                        {{ $message }}
                                </div>
                            @endif
                            <label for="book">著書名</label>
                            <input type="text" class="form-control" name="book" id="book"
                                value="{{ old('book') }}" />
                            <label for="author">作者名</label>
                            <input type="text" class="form-control" name="author" id="author"
                                value="{{ old('author') }}" />
                            <br>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">検索</button>
                        </div>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>

<!-- 検索結果表示 -->
@if(isset($memos))
    <br>
    <br>
    <h1 class="text-info text-center">メモ検索結果</h1>
    <br>

    <!-- 検索結果が0件の場合 -->
    @if($count === 0)
        <h4 class="text-danger text-center">
                検索結果は{{ $count }}件です
        </h4>
    @else
        <h4 class="text-center">
                検索結果は{{ $count }}件です
        </h4>
        <br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col col-lg-8">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">投稿者</th>
                            <th scope="col">著書名</th>
                            <th scope="col">著者</th>
                            <th scope="col">メモのタイトル</th>
                            <th scope="col">最終編集日</th>
                            <th scope="col">詳細</th>
                        </thead>
                        </tr>

                        <tbody>
                        @foreach($memos as $memo)
                        <tr>
                            <td>{{ $memo->user->name }}</td>
                            <td>{{ $memo->book }}</td>
                            <td>{{ $memo->author }}</td>
                            <td>{{ $memo->title }}</td>
                            <td>{{ $memo->updated_at }}</td>
                            <td><a href="{{ route('memos.detail', ['memo' => $memo->id]) }}">詳細</a></td>

                        @endforeach
                        </tr>

                    </tbody>
                    </table>    

                    <!-- ページネーション -->
                    <style>
                        /* ページネーションの中央寄せ */
                    ul.pagination {
                        justify-content: center;
                    }
                    </style>
                    {{ $memos->links() }}
                </div>
            </div>
        </div>
    @endif
@endif

@endsection