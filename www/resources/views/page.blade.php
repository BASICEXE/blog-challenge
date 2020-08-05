@extends('layouts.app')

@include('common.ogp')

@section('content')
  <div class="container">
      <div class="card mb-4">
        <div class="card-header bg-info text-white">
          {{ $post->title }}
        </div>
        <div class="card-body">
          <div class="tag-wap border-bottom mb-4">
            <p class="d-inline-block mr-2">タグ一覧</p>
            @foreach($post->tags as $tag)
            <div class="badge badge-info text-wrap text-white p-2 d-inline-block">
              {{ $tag->name }}
            </div>
            @endforeach
          </div>
          <div class="card-text">
            {!! $post->body !!}
          </div>
          <a class="ml-auto d-inline-block" href="{{ route('home') }}">一覧へ</a>
        </div>
      </div>
  </div>
@endsection
