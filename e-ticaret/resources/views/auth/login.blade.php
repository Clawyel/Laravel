@extends('Layouts.template.App')

@section('content')


    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Giriş Yapın</h2>
                        <form action="{{route('login')}}" method="post">
                            {{@csrf_field()}}

                            <input name="email" type="email" placeholder="Email Adres" />
                            <input name="password" type="password" placeholder="Şifre" />
                            <button type="submit" class="btn btn-default">Giriş Yap</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">Ya Da</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>Yeni Kayıt Oluşturun!</h2>
                        <form action="{{ route('register') }}" method="post">
                            {{@csrf_field()}}
                            <input name="name" type="text" placeholder="Ad ve Soyad"/>
                            <input name="email" type="email" placeholder="Email Adres"/>
                            <input name="password" type="password" placeholder="Şifre"/>
                            <input name="password_confirmation" type="password" placeholder="Şifre Tekrar"/>
                            <button type="submit" class="btn btn-default">Kayıt Ol</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
@endsection
