@extends('common.layout')
@section('title', 'メモ投稿一覧')
@section('content')
    <!-- 見出し -->
    <h1 class="text-success text-center">メモ投稿一覧</h1>

    <!-- 表形式の一覧 -->
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">投稿者</th>
            <th scope="col">著書名</th>
            <th scope="col">著者</th>
            <th scope="col">メモのタイトル</th>
            <th scope="col">最終編集日</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </thead>
        </tr>

        <tbody>
          @foreach($memos as $memo)
          <tr>
            <td>{{ $memo->user_id }}</td>
            <td>{{ $memo->book }}</td>
            <td>{{ $memo->author }}</td>
            <td><a href="{{ route('memos.detail', ['id' => $memo->id]) }}">{{ $memo->title }}</a></td>
            <td>{{ $memo->updated_at }}</td>
            <td><a href="{{ route('memos.edit', ['id' => $memo->id]) }}"><button type="button" class="btn btn-primary">編集</button></a></td>
            <!-- 削除ボタンとモーダルウィンドウ -->
            <td>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">削除</button>              
              <!-- モーダルの設定 -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">確認</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>削除してよろしいですか？</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">いいえ</button>
                      <form action="{{ route('memos.delete', ['id' => $memo->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">はい</button>
                      </form>
                    </div><!-- /.modal-footer -->
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
            </td>
            @endforeach
          </tr>
        </tbody>

    </table>
@endsection