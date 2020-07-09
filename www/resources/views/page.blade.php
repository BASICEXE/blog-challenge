@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="card mb-4">
        <div class="card-header bg-info text-white">
          {{ $post->title }}
        </div>
        <div class="card-body">
          <div class="card-text">
            {!! $post->body !!}
          </div>
          <a class="ml-auto d-inline-block" href="{{ route('home') }}">一覧へ</a>
        </div>
      </div>
  </div>
@endsection
