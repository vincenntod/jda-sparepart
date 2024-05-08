@extends('template.html-template')
@section('body-content')
<body class="bg-gradient-success">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-image m-auto">
                                <img src="{{ asset('template/img/jda_logo.png') }}" class="m-auto p-5" width="450" height="450">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Jabar Sparepart</h1>
                                    </div>
                                        <div class="form-group">
                                            <input type="name" class="form-control form-control-user"
                                                id="name" name="name" aria-describedby="emailHelp"
                                                placeholder="Enter Full Name..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="email" name="email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Password" required>
                                        </div>
                                        <button type="submit" id="submit" class="btn btn-primary btn-user btn-block">
                                            Register
                                        </button>
                                        <hr>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/login">Already have an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
@push('script')
    <script>
        $(document).ready(function(){
            $('#submit').on('click', function() {
                if($('#email').val() == "" || $('#password').val() == "" || $('#name').val() == "" ){
                    return Swal.fire({
                        text : 'Username, Email , Password tidak boleh kosong',
                        title: 'Failed Login',
                        icon: 'error',
                        timer: 1500
                    });
                }
                $.ajax({
                    type: "POST",
                    url: "/register",
                    data: {
                        "_method": "POST",
                        "_token": "{{ csrf_token() }}",
                        "name" : $('#name').val(),
                        "email" : $('#email').val(),
                        "password" : $('#password').val()
                    },
                    success: function(result) {
                        Swal.fire({
                            text: 'Success Registered',
                            icon: 'success',
                            timer: 1500
                        }).then(() => {
                            window.location.href = "/login";
                        });
                    },
                    error: function() {
                        Swal.fire({
                            text : 'Failed to Register',
                            title: 'Failed',
                            icon: 'error',
                            timer: 1500
                        });
                    }
                })
            })
        })
    </script>
@endpush
