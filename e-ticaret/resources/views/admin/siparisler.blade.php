

@extends('Layouts.admin.App')
<?php $cont = 'content'; ?>
@section('title', 'Clawyel Art')



@section($cont)


    @if(isset($success))
        {{$success}}
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sipariş Görüntüleme Ve Yönetim Paneli</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>

                    <tr>
                        <th>Email</th>
                        <th>Ad Soyad</th>
                        <th>Adres</th>
                        <th>Adres Tarifi</th>
                        <th>Telofon</th>
                        <th>Ürünler</th>
                        <th>Toplam Tutar</th>
                        <th>Ödeme Türü</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Email</th>
                        <th>Ad Soyad</th>
                        <th>Adres</th>
                        <th>Adres Tarifi</th>
                        <th>Telofon</th>
                        <th>Ürünler</th>
                        <th>Toplam Tutar</th>
                        <th>Ödeme Türü</th>
                        <th>İşlemler</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @if(isset($arr))
                        @foreach($arr as $row)
                            <tr>
                                <td>{{ $row['email'] }}</td>
                                <td>{{ $row['adSoyad'] }}</td>
                                <td>{{ $row['adres'] }}</td>
                                <td>{{ $row['adresTarif'] }}</td>
                                <td>{{ $row['telefon'] }}<br>{{ $row['telefon'] }}</td>
                                <td>{{ $row['urunler']}}</td>
                                <td>{{ $row['toplamTutar'] }}</td>
                                <td>{{ $row['odemeTuru'] }}</td>
                                <td>
                                    <a class="btn btn-danger btn-circle btn-sm" title="Sil"  href=""><i class="fas fa-trash"></i></a>
                                    <a class="btn btn-success btn-circle btn-sm" title="Düzenle" href=""><i class="fas fa-check"></i></a>
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

