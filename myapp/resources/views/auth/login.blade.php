@extends('common.layout')
@section('title', 'ログイン画面')
@section('content')

<style>
    body {
        background-image: url('images/book.jpg');
        background-size: cover;
    }
</style>
<br>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3 class="mb-0">ログイン</h3></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $message)
                                    <p>{{ $message }}</p>
                                @endforeach
                            </div>
                        @endif
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    ログイン
                                </button>
                            </div>
                        </div>
                    </form>

                    <br>

                    <div class="form-group row">
                            <p class="col-md-4 text-md-right">テストメール</p>

                            <div class="col-md-6">
                                <p>testuser@email.com</p>
                            </div>
                            <p class="col-md-4 text-md-right">テストパスワード</p>

                            <div class="col-md-6">
                                <p>testpasswd10</p>
                            </div>
                        </div>

                    <div class="text-right">
                        <a class="btn btn-link" href="{{ route('login.twitter') }}">
                            Twitterログイン
                        </a>
                    </div>
                    <div class="text-right">
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            パスワードをお忘れですか？
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
