<?php


namespace App\Repositories\Eloquents;
use App\Entities\kategoriler;
use App\Repositories\Interfaces\kategorilerInterface;

class kategorilerObj implements kategorilerInterface
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

    public function create($baslik)
    {
        $obj = new kategoriler;
        $obj->baslik=$baslik;
        return $obj->save();
    }
    public function delete($id)
    {
        $obj = new kategoriler;
        return $obj::findOrFail($id)->delete();
    }
    public function update($id, $baslik)
    {
        $obj = kategoriler::find($id);
        $obj->baslik = $baslik;
        return $obj->save();
    }
}
