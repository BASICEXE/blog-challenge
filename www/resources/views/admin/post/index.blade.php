@extends('layouts.admin')

@section('content')
  <div class="card">
    <div class="card-header">
      <div class="d-flex bd-highlight">
        <div class="p-2 flex-grow-1">投稿一覧</div>
        <div class="p-2 bd-highlight">
          <a class="" href="{{ route('posts.create') }}">新規作成</a>
        </div>
      </div>
    </div>
    <div class="card-body">

      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">title</th>
            <th scope="col">カテゴリー</th>
            <th scope="col">タグ</th>
            <th scope="col">更新</th>
            <th scope="col">削除</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $item)
            <tr>
              <th scope="row">{{ $item->id }}</th>
              <td>{{ $item->title }}</td>
              <td>{{ optional($item->category)->name }}</td>
              <td>
                @foreach($item->tags as $tag)
                  {{ $tag->name }},
                @endforeach
              </td>
              <td>
                {{ Form::open(['method' => 'get', 'route' => ['posts.edit', $item['id'] ]]) }}
                {{ Form::submit('更新', ['class'=> 'btn text-primary']) }}
                {{ Form::close() }}
              </td>
              <td>
                {{ Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $item['id'] ]]) }}
                {{ Form::submit('削除', ['class'=> 'btn text-danger']) }}
                {{ Form::close() }}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="mx-auto">
        {{ $posts->links() }}
      </div>

    </div>
  </div>
@endsection
