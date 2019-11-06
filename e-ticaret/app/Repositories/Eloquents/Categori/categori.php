<?php


namespace App\Repositories\Eloquents\Categori;
use App\Repositories\Interfaces\kategoriInterface;
use App\Entities\kategori as kategoriler;
class categori implements kategoriInterface
{
    public function fetchAll()
    {
        $obj = new kategoriler;
        return $obj::get();
    }
    public function getById($id)
    {
        $obj = new kategoriler;
        $obj = $obj->find($id);
        return $obj;
    }

    public function create($baslik,$sira)
    {
        $obj = new kategoriler;
        $obj->baslik=$baslik;
        $obj->sira=$sira;
        return $obj->save();
    }
    public function delete($id)
    {
        $obj = new kategoriler;
        return $obj::findOrFail($id)->delete();
    }
    public function update($id,$baslik,$sira)
    {
        $obj = kategoriler::find($id);
        $obj->baslik = $baslik;
        $obj->sira=$sira;
        return $obj->save();
    }
}
