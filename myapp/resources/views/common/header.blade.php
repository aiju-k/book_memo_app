<!-- スタイル -->
<style>
    header {
        margin-bottom: 20px;
    }
    .navbar-toggler {
        background-color: white;
    }
     .nav-link {
        padding-bottom: 0;
    }
</style>

<header>
    
    <!-- ログイン後のヘッダー -->
    @if(Auth::check())
        <nav class="navbar navbar-expand-md navbar-light bg-info text-light">
            <a class="nav-link text-light p-0" href="{{ route('home') }}"><h1 class="mb-0 mr-4 logo">ぶくメモ</h1></a>
            <!-- ナビゲーション折り畳み -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse text-light align-items-end" id="navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="{{ route('memos.index') }}">記事一覧画面</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="{{ route('memos.create') }}">投稿画面</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="{{ route('memos.search') }}">検索画面へ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('mypage') }}">{{ Auth::user()->name }}さん</a>
                    </li>
                </ul>

                <form action="{{ route('logout') }}" method="post">
                    @csrf    
                    <button class="btn btn-success my-2 my-sm-0" type="submit">ログアウト</button>
                </form>
            </div>
        </nav>

        <!-- ログイン前のヘッダー -->
        @else
            <nav class="navbar navbar-expand-md text-light bg-light">

                <h1 class="text-success mb-0 logo">ぶくメモ</h1>
                <div class="mr-auto">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item ">
                            <a class="nav-link text-info" href="{{ route('memos.index') }}">一覧画面へ</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-info" href="{{ route('memos.search') }}">検索画面へ</a>
                        </li>
                    </ul>
                </div>
                <div class="ml-auto">
                    <a href="{{ route('login') }}"><button class="btn btn-outline-success" type="submit">ログイン</button></a>
                    <a href="{{ route('register') }}"><button class="btn btn-outline-success" type="submit">会員登録</button></a>
                </div>
            </nav>
        @endif
</header>