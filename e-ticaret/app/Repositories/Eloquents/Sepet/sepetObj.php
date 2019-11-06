<?php


namespace App\Repositories\Eloquents\Sepet;


use App\Repositories\Interfaces\sepetInterface;
use App\Entities\sepet;
class sepetObj implements sepetInterface
{
    public function create($kullaniciID)
    {

        $obj = new sepet();
        $obj->kullaniciID=$kullaniciID;
        $obj->siparisDurum=0;
        $obj->save();
        return $obj->id;
    }
    public function delete($id)
    {
        return sepet::findOrFail($id)->delete();
    }
    public function fetchAllById($id)
    {
        $obj = new sepet();
        return $obj = $obj->where('kullaniciID',$id)->firstOrFail();
    }
}
