@extends('common.layout')
@section('title', 'マイページ')
@section('content')

<style>
    /* 各投稿の見出し */
    h2.ttl {
        color: #ff5f17;
    }
    /* 各投稿の背景色 */
    div.bg {
        background-color: #CEF9DC;
    }
    /* ページネーションの中央寄せ */
    ul.pagination {
        justify-content: center;
    }
</style>
    <div class="text-center">
        <h1>{{ $user_name }}さんの投稿一覧</h1>
    </div>
    <br>
    <br>

    @if (is_null($memos))
        <h3 class="text-warning text-center">まだ投稿がありません</h3>
        <div class="container text-center mb-3">
            <div class="row">
                <div class="col-10 col-lg-5 mx-auto content">
                    <h2 class="mb-1">まずはメモを投稿しよう！</h2>
                    <a href="{{ route('memos.create') }}"><button class="btn btn-primary mb-1">投稿画面へ</button></a>
                </div>
            </div>
        </div>
    @else
        @foreach ($memos as $memo)
            <div class="container text-start mb-3">
                <div class="row">
                    <div class="col-10 col-md-5 mx-auto content bg">
                        <h2 class="mb-2 mt-2 ttl">{{ $memo->title }}</h2>
                        <p class="mb-1 text-muted small">
                            {{ $memo->book }}<br>
                            by {{ $memo->author }}
                        </p>
                        <p>{{ $memo->content }}</p>
                        <a href="{{ route('memos.edit', ['memo' => $memo->id]) }}"><button type="button" class="btn btn-primary mb-2">編集</button></a>
                    </div>
                </div>
            </div>
        @endforeach
        
        <!-- ページネーション -->
        {{ $memos->links() }}
    @endif
@endsection