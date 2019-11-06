@extends('Layouts.admin.App')
<?php $cont = 'content'; ?>
@section('title', 'Clawyel Art')

@section($cont)
    @if(isset($obj))
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ürün Düzenleme Paneli</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{route('admin.urunKapakFotoDuzenle',$obj->id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <table class="table table-bordered">
                        <tr>
                            <th>Ürün Kapak Fotoğrafı</th>
                            <td width="50%"> <img style="max-width: 500px;" src="{{URL::asset('storage/uploads/urunler/'.$obj->resim)}}" /></td>
                            <td>Yeni Resim<hr> <input type="file" name="resim"><hr><input type="submit" name="degistir" value="Değiştir"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{route('admin.urunDuzenle',$obj->id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="yerlestir">
                        <select name="kategori[]" class="form-control" id="kategori" multiple>
                            @if(isset($kategoriler) && isset($mevcutKategoriler) && count($kategoriler) > 0 && count($mevcutKategoriler) > 0)
                                @foreach($kategoriler as $row)
                                    @foreach($mevcutKategoriler as $list)
                                        @if($list->id == $row->id)
                                            <option selected value="{{$row->id}}">
                                                {{$row->baslik}}
                                            </option>
                                        @endif
                                        @endforeach

                                @endforeach
                                    @foreach($kategoriler as $row)
                                        {{$sayac = 0}}
                                        @foreach($mevcutKategoriler as $list)
                                            @if($list->id != $row->id)
                                                {{$sayac++}}
                                            @endif
                                        @endforeach
                                        @if($sayac == count($mevcutKategoriler))
                                            <option value="{{$row->id}}">
                                                {{$row->baslik}}
                                            </option>
                                            {{$sayac=0}}
                                            @endif
                                    @endforeach
                            @endif

                        </select>
                    </div>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <tbody>
                        <tr>
                            <th>Ürün Adı</th>
                            <td width="75%"> <input type="text" value="{{old('baslik',$obj->baslik)}}" name="baslik"></td>
                        </tr>
                        <tr>
                            <th>Ürün Açıklaması</th>
                            <td width="75%"> <input type="text" value="{{old('aciklama',$obj->aciklama)}}" name="aciklama"></td>
                        </tr>
                        <tr>
                            <th>Ürün Fiyatı</th>
                            <td width="75%"> <input type="text" value="{{old('fiyat',$obj->fiyati)}}" name="fiyat"></td>
                        </tr>




                        <tr>
                            <th>Görüntüleneceği Sıra</th>
                            <td width="75%"> <input type="text" value="{{old('fiyat',$obj->sira)}}" name="sira"></td>
                        </tr>

                        </tbody>
                    </table>
                    <input class="btn btn-primary" type="submit" name="Ekle" value="Düzenlemeyi Bitir">
                </form>
            </div>
        </div>
    </div>

@endif



@endsection

@section('footer')
    <script src="https://rawgit.com/select2/select2/master/dist/js/select2.js"></script>
    <script>
        $(document).ready(function() {
            $('#kategori').select2({
                placeholder: "Kategori Seçin",
                allowClear: true
            });
        });
    </script>
@endsection
