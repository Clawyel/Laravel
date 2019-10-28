<?php


namespace App\Repositories\Eloquents;
use App\Entities\yayinevleri;
use App\Repositories\Interfaces\yayinevleriInterfaces;

class yayineviObj implements yayinevleriInterfaces
{
    public function fetchAll()
    {
        $obj = new yayinevleri;
        return $obj::get();
    }
    public function getById($id)
    {
        $obj = new yayinevleri;
        $obj = $obj->find($id);
        return $obj;
    }

    public function create($baslik)
    {
        $obj = new yayinevleri;
        $obj->baslik=$baslik;
        return $obj->save();
    }
    public function delete($id)
    {
        $obj = new yayinevleri;
        return $obj::findOrFail($id)->delete();
    }
    public function update($id, $baslik)
    {
        $obj = yayinevleri::find($id);
        $obj->baslik = $baslik;
        return $obj->save();
    }
}
