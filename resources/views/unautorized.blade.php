@extends('template.html-template')
@section('body-content')
<body class="bg-gradient-light">
    <div class="text-center">
        <br><br><br>
        <img src="{{asset('template/img/jda_logo.png')}}" width="150" height="150">
        <div class="error mx-auto" data-text="401">401</div>
        <p class="lead text-gray-800 mb-5">Unauthorized</p>
        <p class="text-gray-500 mb-0">Sepertinya kamu belum login!</p>
        <a href="/login">&larr; Back to Login Page</a>
    </div>
</body>
@endsection
@push('script')
    <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Unautorized',
                text: 'Silahkan Login',
                icon: 'error',
                timer: 1500
            }).then(() => {
                window.location.href = "/login";
            });
        }, 2000);
    </script>
@endpush
