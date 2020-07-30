@extends('layouts.admin')

@section('content')
  <div class="card">
    <div class="card-header">
      <div class="d-flex bd-highlight">
        <div class="p-2 flex-grow-1">カテゴリー一覧</div>
        <div class="p-2 bd-highlight">
          <a class="" href="{{ route('category.create') }}">新規作成</a>
        </div>
      </div>
    </div>
    <div class="card-body">

      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">slug</th>
            <th scope="col">名前</th>
            <th scope="col">要約</th>
            <th scope="col">更新</th>
            <th scope="col">削除</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categorys as $item)
            <tr>
              <th scope="row">{{ $item['id'] }}</th>
              <td>{{ $item['slug'] }}</td>
              <td>{{ $item['name'] }}</td>
              <td>{{ $item['description'] }}</td>
              <td>
                {{ Form::open(['method' => 'get', 'route' => ['category.edit', $item ]]) }}
                {{ Form::submit('更新', ['class'=> 'btn text-primary']) }}
                {{ Form::close() }}
              </td>
              <td>
                {{ Form::open(['method' => 'DELETE', 'route' => ['category.destroy', $item ]]) }}
                {{ Form::submit('削除', ['class'=> 'btn text-danger']) }}
                {{ Form::close() }}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="mx-auto">
        {{ $categorys->links() }}
      </div>

    </div>
  </div>
@endsection
