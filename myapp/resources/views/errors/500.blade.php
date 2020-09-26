<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0  shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>エラー</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <div class="text-center">
          <p>お探しのページを表示できません。</p>
          <a href="{{ route('memos.index') }}" class="btn">
          一覧へ戻る
          </a>
        </div>
      </div>
    </div>
  </div>
  
    <script src="/js/app.js"></script>

</body>
</html>