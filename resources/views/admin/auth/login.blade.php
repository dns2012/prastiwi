<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noimageindex, nofollow, nosnippet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>Prastiwi - Admin</title>

    <link rel="apple-touch-icon" href="{{ asset('/images/icon/logo.svg') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/images/icon/logo.svg') }}">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('cameleon') }}/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('cameleon') }}/css/app-lite.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('cameleon') }}/css/custom.css">
</head>

<body>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6" style="margin-top: 5%">
                <!-- <div class="auth__login-logo">
                    <img src="{{ asset('cameleon/images/logo/logo-cordova-only.png') }}" alt="icon" srcset="">
                </div> -->
                <div class="card">
                    <div class="card-header text-center" style="padding: 80px 0 0 0">
                        <h2><strong> Login Admin !</strong></h2>
                        <div></div>
                    </div>
                    <div class="card-block" style="padding-bottom: 100px">
                        <div class="card-body no-padding-top">
                            @error('credential')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <form method="POST" action="{{ route('admin.login') }}">
                                @csrf
                                <fieldset class="form-group mt-2">
                                    <h5>Email</h5>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" placeholder="admin@example.com" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </fieldset>

                                <fieldset class="form-group mt-2">
                                    <h5>Kata Sandi</h5>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="............" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </fieldset>

                                <fieldset class="form-group mt-3">
                                    <button class="btn btn-primary btn-cordova btn-block">LOGIN</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('cameleon') }}/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="{{ asset('cameleon') }}/js/core/app-menu-lite.js" type="text/javascript"></script>
    <script src="{{ asset('cameleon') }}/js/core/app-lite.js" type="text/javascript"></script>

</body>

</html>
