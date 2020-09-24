<!-- ナビゲーションバー -->

<!-- スタイル -->
<style>
    header {
        margin-bottom: 20px;
    }
    .navbar-toggler {
        background-color: white;
    }
</style>
<header>
    <nav class="navbar navbar-expand-md navbar-light bg-dark text-light">
        <h1 class="mb-0">ぶくメモ(仮)</h1>
        <!-- ナビゲーション折り畳み -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse text-light" id="navbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('memos.create') }}">投稿画面</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">検索画面</a>
                </li>
            </ul>
            
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">{ユーザー名}さん</a>
                </li>
            </ul>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">ログアウト</button>
            <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> -->
            
        </div>
    </nav>
</header>