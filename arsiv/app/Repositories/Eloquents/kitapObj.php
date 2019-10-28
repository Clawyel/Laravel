<?php
namespace App\Repositories\Eloquents;
use App\Entities\kategoriler;
use App\Entities\kitapKategori;
use App\Entities\kitaplar;
use App\Entities\yazarkitap;
use App\Entities\yazarlar;
use App\Repositories\Interfaces\kitaplarInterface;

class kitapObj implements kitaplarInterface
{
    public function fetchAll()
    {
        $obj = new kitaplar;
        return $obj::get();
    }
    public function getById($id)
    {
        $obj = new kitaplar;
        $obj = $obj->find($id);
        return $obj;
    }

    public function create($yayineviID,$kategoriID,$yazarID,$baslik,$sayfaSayisi)
    {
        $obj = new kitaplar;
        $obj->baslik=$baslik;
        $obj->sayfaSayisi=$sayfaSayisi;
        $obj->yayineviID=$yayineviID;
        $obj->save();
        $kitapID = $obj->id;
        $kitapKategori = new kitapKategori();
        $kitapKategori->kitaplar_id = $kitapID;
        $kitapKategori->kategoriler_id = $kategoriID;
        $kitapKategori->save();

        $yazarKitap = new yazarkitap();
        $yazarKitap->kitaplar_id = $kitapID;
        $yazarKitap->yazarlar_id = $yazarID;
        $yazarKitap->save();
        return $obj;
    }
    public function delete($id)
    {
        $obj = new kitaplar;
        return $obj::findOrFail($id)->delete();
    }
    public function update($id,$yayineviID,$baslik,$sayfaSayisi)
    {
        $obj = kitaplar::find($id);
        $obj->baslik = $baslik;
        $obj->sayfaSayisi=$sayfaSayisi;
        $obj->yayineviID=$yayineviID;
        return $obj->save();
    }
    public function getByKategori($kategoriID)
    {
        $kitapKategori = kategoriler::find($kategoriID);
        $kitap = $kitapKategori->kitaplar;
        return $kitap;
    }
    public function getBySayfaSayisi($sayfaSayisi)
    {
        $kitap = kitaplar::where('sayfaSayisi','>',$sayfaSayisi)->get();
        return $kitap;
    }
    public function getByYayinevi($yayineviID)
    {
        $kitap = kitaplar::where('yayineviID',$yayineviID)->get();
        return $kitap;
    }
    public function getByYazar($yazarID)
    {
        $kitapYazar = yazarlar::find($yazarID);
        $kitap = $kitapYazar->kitaplar;
        return $kitap;
    }
    public function getByYayineviYazar($yayineviID)
    {
        $kitapYazar = kitaplar::where('yayineviID',$yayineviID)->firstOrFail();
            $kitap = $kitapYazar->yazarlar;
            return $kitap;
    }
}
