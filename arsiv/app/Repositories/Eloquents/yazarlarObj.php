<?php


namespace App\Repositories\Eloquents;
use App\Entities\yazarlar;
use App\Repositories\Interfaces\yazarlarInterface;
class yazarlarObj implements yazarlarInterface
{
    public function fetchAll()
    {
        $obj = new yazarlar;
        return $obj::get();
    }
    public function getById($id)
    {
        $obj = new yazarlar;
        $obj = $yazar->find($id);
        return $obj;
    }

    public function create($baslik)
    {
        $obj = new yazarlar;
        $obj->baslik=$baslik;
        return $obj->save();
    }
    public function delete($id)
    {
        $obj = new yazarlar;
        return $obj::findOrFail($id)->delete();
    }
    public function update($id, $baslik)
    {
        $obj = yazarlar::find($id);
        $obj->baslik = $baslik;
        return $obj->save();
    }
}
