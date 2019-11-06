@extends('Layouts.template.App')
@section('title','Sepet')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(Cart::content() as $item)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="images/cart/one.png" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$item->name}}</a></h4>
                        </td>
                        <td class="cart_price">
                            <p>{{$item->price}} tl</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up adet_artir" style="cursor:pointer;" data-adet="{{$item->qty+1}}" data-id="{{$item->rowId}}"> + </a>
                                <input class="cart_quantity_input" type="text" name="adet" value="{{$item->qty}}" autocomplete="off" size="2">
                                <a class="cart_quantity_down adet_azalt" style="cursor:pointer;" data-adet="{{$item->qty-1}}" data-id="{{$item->rowId}}"> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{$item->subtotal}}</p>
                        </td>
                        <td class="cart_delete">
                            <form action="{{route('sepet.kaldir',$item->rowId)}}" method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class=" btn cart_quantity_delete"><i class="fa fa-times"></i></button>
                            </form>
                        </td>
                    </tr>
@endforeach


                    </tbody>
                </table>
                @if(Cart::count()>0)
                <form action="{{route('sepet.bosalt')}}" method="post">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button type="submit" class="pull-right btn btn-default add-to-cart">Sepeti Boşalt</button>
                </form>
                    @endif
            </div>
        </div>
    </section> <!--/#cart_items-->
    @if(Cart::count()>0)
    <section id="do_action">
        <div class="container">
            <div class="heading">
                @if(!auth('kullanici')->check())
                    <h3>What would you like to do next?</h3>
                    <p><a href="{{route('kullanici.loginView')}}">Login Or SignUp</a> Or Checkout Without SignIn</p>
                    <form method="post" action="{{route('siparisCheckout')}}">
                        {{csrf_field()}}
                        ** Ad Ve Soyad<input type="text" class="form-control"  name="adSoyad" placeholder="Ad ve Soyad"><br>
                        ** Email<input type="email" class="form-control"  name="email" placeholder="Email"><br>

                        ** Adres<input type="text" class="form-control"  name="adres" placeholder="Address"><br>
                        ** Adres Tarifi<input type="text" class="form-control"  name="adresTarifi" placeholder="Address Tarif"><br>
                        ** Cep Telefonu<input type="text" class="form-control"  name="cep" placeholder="Mobile Phone"><br>
                        İsteğe Bağlı Diğer Numara<input type="text" class="form-control"  name="cepYedek" placeholder="Mobile Phone 2"><br>

                        <label>Ödeme Türü Seçimi Zorunludur</label>
                        <input type="radio" name="odemeTuru" value="1" checked>Kapıda Nakit
                        <input type="radio" name="odemeTuru" value="2">Kapıda Kredi Kartı
                        <input type="submit"  class="btn btn-default check_out" value="Check Out">
                    </form>
                @else
                    <div class="col-sm-6">

                    @if(isset($kullaniciDetay) && count($kullaniciDetay)>0)
                        <form method = "post" action="{{route('siparisCheckout')}}">
                            {{csrf_field()}}
                            @foreach($kullaniciDetay as $row)
                                <div class="form-group" style="height: auto; border:1px solid #E6E4DF; padding:10px;">
                                    <label for="adresSecimi">{{$row->adresBaslik}}</label>
                                    <input width="50px" value="{{$row->id}}"  type="radio" id="adresSecimi" name="adresSecimi"><hr>
                                    <p>{{$row->adres}}</p>
                                    <p>{{$row->adresTarif}}</p>
                                    <p>{{$row->telefon}}</p>
                                    <p>{{$row->TelefonYedek}}</p>
                                </div>

                                @endforeach
                            <label>Ödeme Türü Seçimi Zorunludur</label>
                                <input type="radio" name="odemeTuru" value="1" checked>Kapıda Nakit
                                <input type="radio" name="odemeTuru" value="2">Kapıda Kredi Kartı
                                <input type="submit"  class="btn btn-default check_out" value="Check Out">
                        </form>

                            <a onclick="jsAdresEkle();" style="cursor: pointer;" class="pull-right jsSubmitAdresEkle">Yeni Adres Ekle</a>
                            <div class="jsAdresEkle" style="display: none;">

                                <form method="post" action="{{route('kullaniciYeniDetay')}}">
                                    {{csrf_field()}}
                                    ** Adres Adı<input type="text" class="form-control" name="adresAdi" placeholder="Address Tittle"><br>
                                    ** Adres<input type="text" class="form-control"  name="adres" placeholder="Address"><br>
                                    ** Adres Tarifi<input type="text" class="form-control"  name="adresTarifi" placeholder="Address Tarif"><br>
                                    ** Cep Telefonu<input type="text" class="form-control"  name="cep" placeholder="Mobile Phone"><br>
                                    İsteğe Bağlı Diğer Numara<input type="text" class="form-control"  name="cepYedek" placeholder="Mobile Phone 2"><br>
                                    <input type="submit" value="Ekle" class="btn btn-danger">
                                    <a  onclick="iptal();" class="btn btn-danger">İptal</a>
                                </form>
                            </div>
                    </div>
                    @else

                        <div class="sm-6">

                        <form method="post" action="{{route('kullaniciYeniDetay')}}">
                            {{csrf_field()}}
                       ** Adres Adı<input type="text" class="form-control" name="adresAdi" placeholder="Address Tittle"><br>
                            ** Adres<input type="text" class="form-control"  name="adres" placeholder="Address"><br>
                            ** Adres Tarifi<input type="text" class="form-control"  name="adresTarifi" placeholder="Address Tarif"><br>
                            ** Cep Telefonu<input type="text" class="form-control"  name="cep" placeholder="Mobile Phone"><br>
                             İsteğe Bağlı Diğer Numara<input type="text" class="form-control"  name="cepYedek" placeholder="Mobile Phone 2"><br>
                            <input type="submit" value="Ekle" class="btn btn-danger">

                        </form>

                        </div>
                    @endif
                @endif
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
                            <li>Eco Tax <span>{{Cart::tax()}}</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>{{Cart::total()}}</span></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
        @else
        Cart is Empty
    @endif
@endsection
<script>
    function jsAdresEkle()
    {
        $('.jsAdresEkle').css('display','block');
        $('.jsSubmitAdresEkle').css('display','none');

    }
    function  iptal() {
        $('.jsAdresEkle').css('display','none');
        $('.jsSubmitAdresEkle').css('display','block');
    }
</script>

