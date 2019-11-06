<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clawyel Art</title>

    <!-- Custom fonts for this template-->
    <link href="{{ URL::asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ URL::asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-xs-12 col-sm-12">
                    <div class="p-5">
                        <h1 class="h4 text-gray-900 mb-4">Yönetim Paneli</h1>
                        <a href="/"><i class="fas fa-arrow-left"></i> &nbsp; Siteye Dön</a>
                        <div class="text-center">
                            <h2 class="h4 text-gray-900 mb-4">Hesap Oluştur</h2>
                        </div>
                        <form class="user" method="post" action="{{ route('admin.kayit')  }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control form-control-user" id="exampleInputEmail" placeholder="Ad Soyad">
                                </div>

                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail" placeholder="Email Adresi">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Şifre">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" name="password_confirmation" id="exampleRepeatPassword" placeholder="Şifre Tekrar">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary btn-user btn-block" value="Hesap Oluştur">
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Şifrenizi Mi Unuttunuz?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="login">Zaten Bir Hesabım Var? Giriş Yap!</a>

                        </div>
                        <div class="text-center">
                            <a href="ümit duman">Ümit Duman Tarafından Geliştirilmiştir</a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="{{URL::asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{URL::asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all Pages-->
<script src="{{URL::asset('js/sb-admin-2.min.js')}}"></script>

</body>

</html>
