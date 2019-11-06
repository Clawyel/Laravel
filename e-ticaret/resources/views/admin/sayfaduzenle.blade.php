@extends('Layouts.admin.App')
<?php $cont = 'content'; ?>
@section('title', 'Clawyel Art')

@section($cont)
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sayfa Düzenleme Paneli</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{route('admin.sayfaDuzenleAction',$sayfaBilgileri->id)}}" method="post">
                    {{csrf_field()}}
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <tbody>
                        <tr>
                            <th>Sayfa Adı</th>
                            <td width="75%"> <input type="text" value="{{old('baslik',$sayfaBilgileri->baslik)}}" name="baslik"></td>
                        </tr>
                        <tr>
                            <th>Google Etiketleri</th>
                            <td width="75%"> <textarea name="keywords" >
                                    {{$sayfaBilgileri->keywords}}
                                </textarea></td>
                        </tr>
                        <tr>
                            <th>Google Açıklaması</th>
                            <td width="75%"> <textarea name="description" >
                                    {{$sayfaBilgileri->description}}
                                </textarea></td>
                        </tr>
                        <tr>
                            <th>Görüntüleneceği Sıra</th>
                            <td width="75%"> <input type="text" value="{{old('sira',$sayfaBilgileri->sira)}}" name="sira"></td>
                        </tr>

                        </tbody>
                    </table>
                    <input class="btn btn-primary" type="submit" name="guncelle" value="Güncelle">
                </form>
            </div>
        </div>
    </div>





@endsection

