

@extends('Layouts.admin.App')
<?php $cont = 'content'; ?>
@section('title', 'Clawyel Art')



@section($cont)


@if(isset($success))
    {{$success}}
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Mevcut Kategoriler</h6>
            <a href="{{route('admin.kategoriEkle')}}" style="float:right;" class="pull-right">Yeni Kategori Ekle</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>

                    <tr>
                        <th>Görüntüleme Sırası</th>
                        <th>Kategori Adı</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Görüntüleme Sırası</th>
                        <th>Kategori Adı</th>
                        <th>İşlemler</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @if(isset($kategoriler))
                        @foreach($kategoriler as $row)
                            <tr>
                                <td>{{ $row->sira }}</td>
                                <td>{{ $row->baslik }}</td>
                                <td>
                                    <a class="btn btn-danger btn-circle btn-sm" title="Sil"  href="{{route('admin.kategoriSil',$row->id)}}"><i class="fas fa-trash"></i></a>
                                    <a class="btn btn-success btn-circle btn-sm" title="Düzenle" href="{{route('admin.kategoriDuzenleView',$row->id)}}"><i class="fas fa-check"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>Kategori Bulunamadı</td>
                        </tr>

                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection

