@extends('Layouts.template.App')
@section('content')
    @if(isset($urun) && isset($kategoriler))



    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Kategoriler</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        @foreach($kategoriler as $oku)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#">{{$oku->baslik}}</a></h4>
                                </div>
                            </div>
                            @endforeach


                    </div><!--/category-products-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{{URL::asset('storage/uploads/'.$urun->resim)}}" alt="" />
                        </div>


                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                            <h2>{{$urun->baslik}}</h2>
                            <img src="images/product-details/rating.png" alt="" />
                            <span>
									<span>{{$urun->fiyati}}</span>

                                                <form action="{{route('sepet.ekle')}}" method="post">
                                                    {{csrf_field()}}
                                                    									<label>Adet:</label>
									<input type="number" name="adet" value="1" min="1" max="10" />
                                                    <input type="hidden" name="id" value="{{$urun->id}}">
                                                    <button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</button>
                                                </form>
								</span>
                            <p><b>Stokta Var</b></p>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->
    @endif
    @endsection
