

@extends('Layouts.admin.App')
<?php $cont = 'content'; ?>
@section('title', 'Clawyel Art')



@section($cont)


    @if(isset($success))
        {{$success}}
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Mevcut Ürünler</h6>
            <a href="{{route('admin.urunEkleView')}}" style="float:right;" class="pull-right">Yeni Ürün Ekle</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>

                    <tr>
                        <th>Sırası</th>
                        <th>Ürün Kapak Fotoğrafı</th>
                        <th>Ürün Adı</th>
                        <th>Fiyatı</th>
                        <th>Bulunduğu Kategori</th>
                        <th>Açıklaması</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Sırası</th>
                        <th>Ürün Kapak Fotoğrafı</th>
                        <th>Ürün Adı</th>
                        <th>Fiyatı</th>
                        <th>Bulunduğu Kategori</th>
                        <th>Açıklaması</th>
                        <th>İşlemler</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @if(isset($urunler))
                        @foreach($urunler as $row)
                            <tr>
                                <td>{{ $row->sira }}</td>
                                <td>{{ $row->resim }}</td>
                                <td>{{ $row->baslik }}</td>
                                <td>{{ $row->fiyati }}</td>
                                <td>{{ $row->kategori }}</td>
                                <td>{{ $row->aciklama }}</td>
                                <td>
                                    <a class="btn btn-danger btn-circle btn-sm" title="Sil"  href="{{route('admin.kategoriSil',$row->id)}}"><i class="fas fa-trash"></i></a>
                                    <a class="btn btn-success btn-circle btn-sm" title="Düzenle" href="{{route('admin.urunDuzenleView',$row->id)}}"><i class="fas fa-check"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>Ürün Bulunamadı,Yeni Ürün Ekleyin</td>
                        </tr>

                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection

