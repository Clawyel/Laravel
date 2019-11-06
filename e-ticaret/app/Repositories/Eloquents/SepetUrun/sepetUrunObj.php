<?php


namespace App\Repositories\Eloquents\SepetUrun;


use App\Repositories\Interfaces\sepetUrunInterface;
use App\Entities\sepetUrun;
class sepetUrunObj implements sepetUrunInterface
{
    public function fetchAllById($sepetID)
    {
        $obj = new sepetUrun();
        return $obj = $obj->where('sepetID',$sepetID)->firstOrFail();
    }
    public function delete($sepetID, $urunID)
    {
        return sepetUrun::where('sepetID',$sepetID)->where('urunID',$urunID)->delete();
    }
    public function create($sepetID, $urunID, $adet)
    {
        $obj = new sepetUrun();
        $obj->sepetID=$sepetID;
        $obj->urunID=$urunID;
        $obj->adet=$adet;
        return $obj->save();
    }
    public function update($sepetID, $urunID, $adet)
    {
        $sepetUrun = sepetUrun::where('sepetID',$sepetID)->where('urunID',$urunID)->firstOrFail();
        $sepetUrun -> adet = $adet;
        return $sepetUrun->save();
    }
}
