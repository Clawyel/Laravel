@extends('Layouts.admin.App')
<?php $cont = 'content'; ?>
@section('title', 'Clawyel Art')

@section($cont)
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ürün Ekleme Paneli</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{route('admin.urunEkle')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <div class="yerlestir">
                            <select name="kategori[]" class="form-control" id="kategori" multiple>
                                @if(isset($kategoriler) && count($kategoriler) > 0)
                                @foreach($kategoriler as $row)
                                    <option value="{{$row->id}}">
                                        {{$row->baslik}}
                                    </option>
                                    @endforeach
                                @endif

                            </select>
                        </div>
                        <tbody>
                        <tr>
                            <th>Ürün Adı</th>
                            <td width="75%"> <input type="text" name="baslik"></td>
                        </tr>
                        <tr>
                            <th>Ürün Açıklaması</th>
                            <td width="75%"> <input type="text" name="aciklama"></td>
                        </tr>
                        <tr>
                            <th>Ürün Fiyatı</th>
                            <td width="75%"> <input type="text" name="fiyat"></td>
                        </tr>
                        <tr>
                            <th>Ürün Kapak Fotoğrafı</th>
                            <td width="75%"> <input type="file" name="resim"></td>
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
