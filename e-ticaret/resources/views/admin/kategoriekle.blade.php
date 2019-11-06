@extends('Layouts.admin.App')
<?php $cont = 'content'; ?>
@section('title', 'Clawyel Art')

@section($cont)
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kategori Ekleme Paneli</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{route('admin.kategoriEkle')}}" method="post">
                    {{csrf_field()}}
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <tbody>
                        <tr>
                            <th>Sayfa Adı</th>
                            <td width="75%"> <input type="text" name="baslik"></td>
                        </tr>

                        <tr>
                            <th>Görüntüleneceği Sıra</th>
                            <td width="75%"> <input type="text" name="sira"></td>
                        </tr>

                        </tbody>
                    </table>
                    <input class="btn btn-primary" type="submit" name="Ekle" value="Ekle">
                </form>
            </div>
        </div>
    </div>





@endsection

