<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{URL::asset('template/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('template/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('template/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{URL::asset('template/css/price-range.css')}}" rel="stylesheet">
    <link href="{{URL::asset('template/css/animate.css')}}" rel="stylesheet">
    <link href="{{URL::asset('template/css/main.css')}}" rel="stylesheet">
    <link href="{{URL::asset('template/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{URL::asset('template/js/html5shiv.js')}}"></script>
    <script src="{{URL::asset('template/js/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{URL::asset('template/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::asset('template/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::asset('template/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::asset('template/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{URL::asset('template/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +90 507 776 00 20</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> dmnumtdmn@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-md-4 clearfix">
                    <div class="logo pull-left">
                        <a href="{{route('anasayfa')}}"><img src="{{URL::asset('template/images/home/logo.png')}}" alt="" /></a>
                    </div>

                </div>
                <div class="col-md-8 clearfix">
                    <div class="shop-menu clearfix pull-right">
                        <ul class="nav navbar-nav">
                            @if(auth('kullanici')->check())
                            <li><a href=""><i class="fa fa-user"></i> Account</a></li>
                                <li><a href="{{route('sepet.sepetView')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                <form id="cikis-formu" method="post" action="{{route('kullaniciCikis')}}" style="display:none;">
                                    {{csrf_field()}}
                                </form>
                                <li><a href="#" onclick="event.preventDefault(); document.getElementById('cikis-formu').submit();"><i class="fa fa-lock"></i> Logout</a></li>
                           @else
                                <li><a href="{{route('kullanici.loginView')}}"><i class="fa fa-lock"></i> Login</a></li>
                                <li><a href="{{route('sepet.sepetView')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            @endif



                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

</header><!--/header-->



<section>
    @yield('content')
</section>

<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>e</span>-shopper</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                    </div>
                </div>
                <div class="col-sm-7">

                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="{{URL::asset('template/images/home/map.png')}}" alt="" />
                        <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved. And Powered By Ümit DUMAN</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->



<script src="{{URL::asset('template/js/jquery.js')}}"></script>
<script src="{{URL::asset('template/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('template/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{URL::asset('template/js/price-range.js')}}"></script>
<script src="{{URL::asset('template/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{URL::asset('template/js/main.js')}}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $('.adet_artir, .adet_azalt').on('click',function () {
        var id= $(this).attr('data-id');
        var adet = $(this).attr('data-adet');
        $.ajax({
            type:'PATCH',
            url:'sepet/guncelle/'+id,
            data: {adet:adet},
            success:function (result) {
                window.location.href='/sepet';
            }
        });
    });
</script>
</body>
</html>
