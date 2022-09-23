<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LOGBOOK | Log in</title>
    {{-- <!-- Tell the browser to be responsive to screen width --> --}}
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{-- <!-- Bootstrap 3.3.6 --> --}}
    <link rel="stylesheet" href="{{ asset('/adminLTE/bootstrap/css/bootstrap.min.css') }}">
    {{-- <!-- Font Awesome --> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    {{-- <!-- Ionicons --> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    {{-- <!-- Theme style --> --}}
    <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/AdminLTE.min.css') }}">
    {{-- <!-- iCheck --> --}}
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/iCheck/square/blue.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
        </div>
        {{-- <!-- /.login-logo --> --}}
        <div class="login-box-body">
            <center> <img src="{{asset('images/logo.png')}}" class="img-thumbnail" alt="Responsive image"> </center>
            <br/><br/>
            <p  class="login-box-msg"><b>SISTEM INFORMASI PENCATATAN KEGIATAN PEGAWAI (LOGBOOK)</b></p>
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="{{ route('login') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="NIP" name="email"
                        value="{{ old('email') }}" required autofocus>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
                    </div>

                    {{-- <!-- /.col --> --}}
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    {{-- <!-- /.col --> --}}
                </div>
            </form>

            {{-- SOSICAL LOGIN --}}
            <!-- <div class="social-auth-links text-center"> -->
            <!-- <p>- OR -</p> -->
            <!-- <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in usingFacebook</a> -->
            <!-- <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in usingGoogle+</a> -->
            <!-- </div> -->
            {{-- <!-- /.social-auth-links --> --}}
            {{-- <a href="#">I forgot my password</a><br>
                <a href="register.html" class="text-center">Register a new membership</a> --}}
        </div>
        {{-- <!-- /.login-box-body --> --}}
    </div>

    {{-- <!-- /.login-box --> --}}
    {{-- <!-- jQuery 3.1.1 --> --}}
    <script src="{{ asset('adminLTE/plugins/jQuery/jquery-3.1.1.min.js') }}"></script>
    {{-- <!-- Bootstrap 3.3.6 --> --}}
    <script src="{{ asset('adminLTE/bootstrap/js/bootstrap.min.js') }}"></script>
    {{-- <!-- iCheck --> --}}
    <script src="{{ asset('adminLTE/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

</html>
