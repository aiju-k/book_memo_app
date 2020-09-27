@extends('common.layout')
@section('title', 'メモ詳細')
@section('content')

<style>
    p {
        margin: 5px 0;
    }
</style>
    <!-- タイトル -->
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center">メモ詳細画面</h1>
            </div>
        </div>
    </div>

    <br>
    <br>

    <div class="container">
        <div class="row mx-auto justify-content-center">

            <!-- 書籍情報 -->
            <div class="col col-5 col-xl-4 mr-3 bg-light">
                <h2>書籍情報</h2>
                <p>著書名：{{ $memo->book }}</p>
                <p>著者：{{ $memo->author }}</p>
            </div>

            <!-- メモ -->
            <div class="col col-5 col-xl-4 ml-3">
                <h2>メモ</h2>
                <p>投稿者：{{ $memo->user->name }}</p>
                <p>タイトル：{{ $memo->title }}</p>
                <p>内容：</p>
                <p>{{ $memo->content }}</p>
            </div>
        </div>
    </div>

    <br>
    <br>

    <!-- 一覧へ戻るボタン -->
    <div class="container">
        <div class="row mx-auto">
            <div class="col text-center">

                <a href="{{ route('memos.index') }}"><button class="mr-3 btn btn-secondary">メモ一覧画面へ</button></a>

                <!-- 投稿者本人なら編集ボタンを表示 -->
                @if (Auth::check() && Auth::user()->id === $memo->user_id)
                    <a href="{{ route('memos.edit', ['memo' => $memo->id]) }}"><button type="button" class="ml-3 btn btn-primary">編集</button></a>
                @endif
            </div>
        </div>
    </div>

@endsection