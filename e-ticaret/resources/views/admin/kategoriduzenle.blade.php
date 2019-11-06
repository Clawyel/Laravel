@extends('Layouts.admin.App')
<?php $cont = 'content'; ?>
@section('title', 'Clawyel Art')

@section($cont)
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kategori Düzenleme Paneli</h6>
        </div>
        @if(isset($obj))
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{route('admin.kategoriDuzenle',$obj->id)}}" method="post">
                    {{csrf_field()}}
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <tbody>
                        <tr>
                            <th>Kategori Adı</th>
                            <td width="75%"> <input type="text" value="{{old('baslik',$obj->baslik)}}" name="baslik"></td>
                        </tr>

                        <tr>
                            <th>Görüntüleneceği Sıra</th>
                            <td width="75%"> <input type="text" value="{{old('sira',$obj->sira)}}" name="sira"></td>
                        </tr>

                        </tbody>
                    </table>
                    <input class="btn btn-primary" type="submit" name="guncelle" value="Güncelle">
                </form>
            </div>
        </div>
            @endif
    </div>





@endsection

