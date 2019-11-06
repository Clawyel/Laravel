

@extends('Layouts.admin.App')
<?php $cont = 'content'; ?>
@section('title', 'Clawyel Art')



@section($cont)



    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Mevcut Sayfalar</h6>
            <a href="{{route('admin.sayfaEkleView')}}" style="float:right;" class="pull-right">Yeni Sayfa Ekle</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>

    <tr>
        <th>Görüntüleme Sırası</th>
        <th>Sayfa Adı</th>
        <th>Google Etiketleri</th>
        <th>Google Açıklaması</th>
        <th>İşlemler</th>
    </tr>
    </thead>
        <tfoot>
        <tr>
            <th>Görüntüleme Sırası</th>
            <th>Sayfa Adı</th>
            <th>Google Etiketleri</th>
            <th>Google Açıklaması</th>
            <th>İşlemler</th>
        </tr>
        </tfoot>
    <tbody>
    @if(isset($pages))
        @foreach($pages as $row)
    <tr>
        <td>{{ $row->sira }}</td>
        <td>{{ $row->baslik }}</td>
        <td>{{ $row->keywords }}</td>
        <td>{{ $row->description }}</td>
        <td>
            <a class="btn btn-danger btn-circle btn-sm" title="Sil" onclick="silOnayla({{$row->id}});" href=""><i class="fas fa-trash"></i></a>
            <a class="btn btn-success btn-circle btn-sm" title="Düzenle" href=" {{route('admin.sayfaDuzenleView',$row->id)}}"><i class="fas fa-check"></i></a>
            <a class="btn btn-warning btn-circle btn-sm" title="İçerik Sıralaması" href="sayfaIcerikSiralamaDegistirView/{{$row->id}}"><i class="fas fa-list"></i></a>
        </td>
    </tr>
        @endforeach
    @else
        <tr>
            <td>Sayfa Bulunamadı</td>
        </tr>

    @endif
    </tbody>
    </table>
            </div>
        </div>
    </div>


@endsection

