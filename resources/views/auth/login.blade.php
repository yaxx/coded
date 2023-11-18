<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>LOGIN</title>
    <link rel="icon" href="img/main/favicon[1814].png" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="css/custom.css" /> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.4/css/bootstrap.min.css">


    <!-- Custom styles for this template-->
    <link href="css/app.css" rel="stylesheet" />
    <link href="css/login.css" rel="stylesheet" />
</head>

<body>

    
    <main class="container-fluid d-flex">
        <div class=" row justify-content-between">
            <div class=" col-lg-6 ">'
                <nav class="logo">
                    <a class="" href="">
            
                        <div class="-text mx-3 pt-2">
                            <img  src="img/main/benue_logo.png" alt="logo" class="img-fluid  "  />
                        </div>
                    </a>
                </nav>'
                <div class="login-content">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
    
                    @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                        {!! Session::get('success') !!}
                    </div>
                    @elseif (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                        {!! Session::get('error') !!}
                    </div>
                    @endif
    
                    <div class="box align-items-left pt-3 pb-4">
                        <form method="POST" action="{{ url('login') }}" class="login-form">
                            @csrf
    
                            <h1 class="mb-2">Log in</h1>
                            <p>Welcome back! Please enter your details.</p>
    
                            <div class="form-group">
                                <label for="username">Email</label>
                                <input type="text" class="form-control" placeholder="Enter your Email or username"
                                    name="username" value="{{ old('username') ?: '' }}" required />
                                @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif
                            </div>
    
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" placeholder="*******" name="password" required>
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
    
                            <div class="form-group d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                                <label class="checkbox-label mb-2 mb-md-0">
                                    <input type="checkbox">
                                    Remember for 30 days
                                </label>
                                <a href="#" class="forget-password-link">Forget password?</a>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-block btn-danger text-white btn-custom" type="submit">Sign in</button>
                            </div> 
                              <div class="form-group">
                             <a class="" href=" {{route('auth.signup')}}" style="text-decoration: none" > <div class="btn btn-block  text-dark btn-white">
                               For Client-Services, Please Sign Up
                            </div>
                        </a>  
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-none-md d-none-sm">
                <img src="img/main/Section.svg" alt="Background Image" class="background-image">
                <img src="img/main/image1.svg" alt="Overlay Image" class="overlay-image">

            </div>
        </div>
    </main>
    
</body>

</html>


<!-- Scroll to Top Button-->


<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/app.js"></script>
</body>


@section('footer')
    <!-- BEGIN CORE PLUGINS -->
    <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/js.cookie.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.blockui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('js/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery-validation/js/additional-methods.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('js/backstretch/jquery.backstretch.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('js/app.min.js') }}" type="text/javascript"></script>

    <script>
        var Login = function() {
            var r = function() {
                $(".login-form").validate({
                    errorElement: "span",
                    errorClass: "help-block",
                    focusInvalid: !1,
                    rules: {
                        username: {
                            required: !0
                        },
                        password: {
                            required: !0
                        },
                        remember: {
                            required: !1
                        }
                    },
                    messages: {
                        username: {
                            required: "Username is required."
                        },
                        password: {
                            required: "Password is required."
                        }
                    },
                    invalidHandler: function(r, e) {
                        $(".alert-danger", $(".login-form")).show()
                    },
                    highlight: function(r) {
                        $(r).closest(".form-group").addClass("has-error")
                    },
                    success: function(r) {
                        r.closest(".form-group").removeClass("has-error"), r.remove()
                    },
                    errorPlacement: function(r, e) {
                        r.insertAfter(e.closest(".input-icon"))
                    },
                    submitHandler: function(r) {
                        r.submit()
                    }
                }), $(".login-form input").keypress(function(r) {
                    if (13 == r.which) return $(".login-form").validate().form() && $(".login-form")
                        .submit(), !1
                }), $(".forget-form input").keypress(function(r) {
                    if (13 == r.which) return $(".forget-form").validate().form() && $(".forget-form")
                        .submit(), !1
                }), $("#forget-password").click(function() {
                    $(".login-form").hide(), $(".forget-form").show()
                }), $("#back-btn").click(function() {
                    $(".login-form").show(), $(".forget-form").hide()
                })
            };
            return {
                init: function() {
                    r(), $(".login-bg").backstretch(["{{ asset('img/pages/img/login/pexels-photo_50_2_50.jpg') }}",
                        "{{ asset('img/pages/img/login/bg2.jpg') }}",
                        "{{ asset('img/pages/img/login/bg3.jpg') }}"
                    ], {
                        fade: 1e3,
                        duration: 8e3
                    }), $(".forget-form").hide()
                }
            }
        }();
        jQuery(document).ready(function() {
            Login.init()
        });

        function myFunction() {
            var x = document.getElementById('show_service_code');
            if (x.style.display === 'none') {
                x.style.display = 'block';
            } else {
                x.style.display = 'none';
            }
        }

        function myFunction1() {
            var x = document.getElementById('show_reset_sc');
            if (x.style.display === 'none') {
                x.style.display = 'block';
            } else {
                x.style.display = 'none';
            }
        }
    </script>
@endsection
