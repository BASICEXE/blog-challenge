@section('phpToJs')
  @isset($phpToJs)
    <script>
      const php = {!! $phpToJs !!}
    </script>
    @endisset
@endsection
