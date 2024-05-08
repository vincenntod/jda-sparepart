@extends('template.html-template')
@section('body-content')
<body class="bg-gradient-light">
    <div class="text-center">
        <br><br><br>
        <img src="{{asset('template/img/jda_logo.png')}}" width="150" height="150">
        <div class="error mx-auto" data-text="404">404</div>
        <p class="lead text-gray-800 mb-5">Page Not Found</p>
        <p class="text-gray-500 mb-0">Sepertinya kamu kehilangan arah</p>
    </div>
</body>
@endsection
@push('script')
    <script>
    </script>
@endpush
