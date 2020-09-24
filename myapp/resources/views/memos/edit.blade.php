@extends('common.layout')
@section('title', 'メモ投稿一覧')
@section('content')
    <!-- 見出し -->
    <h1 class="text-success text-center">メモ投稿一覧</h1>

    <div class="container">
        <div class="row">
            <div class="col col-md-offset-3 col-md-6">
                <nav class="card">
                    <div class="card-header">タスクを編集する</div>
                    <div class="card-body">
                        <form
                            action="{{ route('memos.edit', ['folder' => $task->folder_id, 'task' => $task->id]) }}"
                            method="POST"
                        >
                        @csrf
                        <div class="form-group">
                            <label for="title">タイトル</label>
                            <input type="text" class="form-control" name="title" id="title"
                                value="{{ old('title') ?? $task->title }}" />
                            @if($errors->has('title'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="status">状態</label>
                            <select name="status" id="status" class="form-control">
                            @foreach(\App\Task::STATUS as $key => $val)
                                <option
                                    value="{{ $key }}"
                                    {{ $key == old('status', $task->status) ? 'selected' : '' }}
                                >
                                {{ $val['label'] }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="due_date">期限</label>
                            <input type="text" class="form-control" name="due_date" id="due_date"
                                value="{{ old('due_date') ?? $task->formatted_due_date }}" />
                            @if($errors->has('due_date'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('due_date') }}
                                </div>
                            @endif
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">送信</button>
                        </div>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endsection