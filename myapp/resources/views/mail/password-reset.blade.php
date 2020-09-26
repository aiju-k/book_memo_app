<h1>ぶくメモです</h1>

<p>下記のリンクから再設定手続きを行ってください。</p>
<a href="{{ route('password.reset', ['token' => $token ?? '']) }}">
  パスワード再設定リンク
</a>