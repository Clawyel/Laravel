@extends('Layouts.admin.App')
<?php $cont = 'content'; ?>
@section('title', 'Clawyel Art')



@section($cont)

    <div class="jumbotron">

        @if(isset($page))
            <form action="/sayfaDuzenlemesi/{{ $page->id }}" method="post">
                @csrf
                @method('PATCH')
                <input type="text" name="baslik" value="{{$page->baslik}}"/>
                <input type="submit" value="Güncelle">
            </form>
        @endif

    </div>


@endsection
