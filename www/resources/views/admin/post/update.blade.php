@extends('layouts.admin')

@section('content')
  <div class="card">
    <div class="card-header">新規投稿</div>
    <div class="card-body">
      {{ Form::open(['method'=> 'put','route' => ['posts.update', $post->id]]) }}

      <div class="form-group">
        <label for="post_title">タイトル</label>
        {{ Form::text('title', old('title', $post->title), ['id' => 'post_title','class'=> 'form-control'])  }}
        <small id="post_title" class="form-text text-muted">ここにタイトルを入れてください</small>
      </div>
      <div class="form-group">
        <label for="post_category">カテゴリー</label>
        {{Form::select('category_id', $categorys, old('category_id', $post->category_id), ['id' => 'post_category','class'=> 'form-control'] )}}
      </div>
      <div class="form-group">
        <label for="post_body">記事内容</label>
        {{ Form::textarea('body', old('body', $post->body), ['id' => 'post_body','class'=> 'form-control admin-editer'])  }}
      </div>
      {{ Form::submit('保存', ['class'=> 'btn btn-primary']) }}
      {{ Form::close() }}
    </div>
  </div>
@endsection
