@section('ogp')
  @isset($ogp)
    @foreach($ogp as $item)
      <meta property="{{ $item['property'] }}" content="{{ $item['contents'] }}" />
    @endforeach
  @endisset
@endsection
