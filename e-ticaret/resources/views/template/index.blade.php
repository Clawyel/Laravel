@extends('Layouts.template.App')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-sm-12 padding-right">

                @if(isset($urunler))

                <div class="category-tab"><!--category-tab-->

                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            {{$active = "active"}}
                            @foreach($urunler as $row)
                            <li class="{{$active}}"><a href="#{{Str::slug($row->baslik)}}" data-toggle="tab">{{ $row->baslik }}</a></li>
                               {{$active=""}}
                                @endforeach
                        </ul>
                    </div>
                    <div class="tab-content">
                        @php
                            $activein= "active in"
                        @endphp

                        @foreach($urunler as $list)

                        <div class="tab-pane fade {{$activein}}" id="{{Str::slug($list->baslik)}}" >{{$activein=""}}
                            @foreach($list->urunler as $oku)
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{URL::asset('storage/uploads/urunler/urun.jpg')}}" alt="" />
                                                <h2>{{$oku->fiyati}}</h2>
                                                <p><a href="{{route('urundetay',$oku->slug)}}"> {{$oku->baslik}}</a></p>
                                                <form action="{{route('sepet.ekle')}}" method="post">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="id" value="{{$oku->id}}">
                                                    <input type="hidden" name="adet" value="1">

                                                    <button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                @endforeach
                        </div>
@endforeach







                    </div>
                </div><!--/category-tab-->
                @endif


            </div>
        </div>
    </div>
    @endsection
