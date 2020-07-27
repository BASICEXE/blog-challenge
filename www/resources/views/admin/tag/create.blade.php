@extends('layouts.admin')

@section('content')
  <div class="card">
    <div class="card-header">新規カテゴリー</div>
    <div class="card-body">
      {{ Form::model($tag, ['route' => ['tag.store', $tag->id]]) }}

      <div class="form-group">
        <label for="tag_slug">スラッグ</label>
        {{ Form::text('slug', old('slug', $tag->slug), ['id' => 'tag_slug','class'=> 'form-control'])  }}
        <small id="tag_slug" class="form-text text-muted">ここにスラッグを入れてください</small>
      </div>
      <div class="form-group">
        <label for="tag_name">表示名</label>
        {{ Form::text('name', old('name', $tag->name), ['id' => 'tag_name','class'=> 'form-control'])  }}
      </div>
      <div class="form-group">
        <label for="tag_discription">要約</label>
        {{ Form::text('description', old('description', $tag->description), ['id' => 'tag_discription','class'=> 'form-control'])  }}
      </div>
      {{ Form::submit('保存', ['class'=> 'btn btn-primary']) }}
      {{ Form::close() }}
      @if ($errors->any())
        <ul class="list-group mt-4">
          @foreach ($errors->all() as $error)
            <li class="list-group-item list-group-item-danger">{{ $error }}</li>
          @endforeach
        </ul>
      @endif
    </div>
  </div>
@endsection
