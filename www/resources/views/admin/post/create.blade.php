@extends('layouts.admin')

@section('content')
  <div class="card">
    <div class="card-header">新規投稿</div>
    <div class="card-body">
      {{ Form::model($post, ['route' => ['posts.store', $post->id]]) }}

      <div class="form-group">
        <label for="post_title">タイトル</label>
        {{ Form::text('title', old('title'), ['id' => 'post_title','class'=> 'form-control'])  }}
        <small id="post_title" class="form-text text-muted">ここにタイトルを入れてください</small>
      </div>
      <div class="form-group">
        <label for="post_body">記事内容</label>
        {{ Form::textarea('body', old('body'), ['id' => 'post_body','class'=> 'form-control'])  }}
      </div>
      {{ Form::submit('保存', ['class'=> 'btn btn-primary']) }}
      {{ Form::close() }}
    </div>
  </div>
@endsection
