@extends('layouts.admin')

@section('content')
  <div class="card">
    <div class="card-header">新規カテゴリー</div>
    <div class="card-body">
      {{ Form::open(['method'=> 'put', 'route' => ['category.update', $category->id]]) }}

      <div class="form-group">
        <label for="category_slug">スラッグ</label>
        {{ Form::text('slug', old('slug', $category->slug), ['id' => 'category_slug','class'=> 'form-control'])  }}
        <small id="category_slug" class="form-text text-muted">ここにスラッグを入れてください</small>
      </div>
      <div class="form-group">
        <label for="category_name">表示名</label>
        {{ Form::text('name', old('name', $category->name), ['id' => 'category_name','class'=> 'form-control'])  }}
      </div>
      <div class="form-group">
        <label for="category_discription">要約</label>
        {{ Form::text('description', old('description', $category->description), ['id' => 'category_discription','class'=> 'form-control'])  }}
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
