@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-header">
        ここにサイトタイトル
      </div>
      <div class="card-body">
        あああ
        @foreach($posts as $post)
          {{ $post->id }}
        @endforeach
        {{ $posts->links() }}
      </div>
    </div>
  </div>
@endsection
