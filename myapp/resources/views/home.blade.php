<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0  shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ホーム画面</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>

    <style>
        main {
            background-image: src;
        }
        h2 {
            padding-top: 8px;
        }
        div.content {
            background-color: #eee;
            border-radius: 10px;
        }
    </style>
        
    <header>
        <nav class="navbar navbar-light bg-info text-light mb-3">
            <h1 class="mb-0 text-center">ぶくメモ</h1>
            <div class="text-light" id="navbar">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="btn btn-success my-2 my-sm-0" type="submit">ログアウト</button>
                </form>
            </div>
        </nav>
    </header>


    <div class="container text-center mb-5">
        <div class="row">
            <div class="col col-lg-7 mx-auto">
                <h2>{{ Auth::user()->name }}さん</h2>
                <h1 class="border-bottom">ぶくメモへようこそ！</h1>
            </div>
        </div>
    </div>

    <div class="container text-center mb-3">
        <div class="row">
            <div class="col-10 col-lg-5 mx-auto content">
                <h2 class="mb-1">まずはメモを投稿しよう！</h2>
                <a href="{{ route('memos.create') }}"><button class="btn btn-primary mb-1">投稿画面へ</button></a>
            </div>
        </div>
    </div>
    
    <div class="container text-center">
        <div class="row">
            <div class="col-10 col-lg-5 mx-auto content">
                <h2 class="mb-1">みんなのメモを見る！</h2>
                <a href="{{ route('memos.index') }}"><button class="btn btn-primary mb-1">メモ一覧画面へ</button></a>
            </div>
        </div>
    </div>

    <script src="/js/app.js"></script>

</body>
</html>
