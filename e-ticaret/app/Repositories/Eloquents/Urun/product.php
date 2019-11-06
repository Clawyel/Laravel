<?php


namespace App\Repositories\Eloquents\Urun;
use App\Entities\kategoriUrun;
use App\Repositories\Interfaces\urunInterface;
use App\Entities\urun;

class product implements urunInterface
{
    public function fetchAll()
    {
        $obj = new urun();
        return $obj::get();
    }
    public function getById($id)
    {
        $obj = new urun;
        $obj = $obj->find($id);
        return $obj;
    }
    public function getBySlug($slug)
    {
        $obj = new urun;
        $obj = $obj->where('slug',$slug)->firstOrFail();
        return $obj;
    }
    public function create($baslik,$kategori,$aciklama,$resim,$fiyat,$sira)
    {

        $obj = new urun;
        $obj->baslik=$baslik;
        $obj->aciklama=$aciklama;
        $obj->resim=$resim;
        $obj->fiyati=$fiyat;
        $obj->sira=$sira;
        $obj->save();
        $urunID = $obj->id;
        $kategoriUrun = new kategoriUrun();
        foreach ($kategori as $row)
        {
            $kategoriUrun->kategoriler_id = $row;
            $kategoriUrun->urunler_id = $urunID;
        }

        return $kategoriUrun->save();
    }
    public function delete($id)
    {
        $obj = new urun;
        return $obj::findOrFail($id)->delete();
    }
    public function update($id,$baslik,$kategori,$aciklama,$fiyat,$sira)
    {
        $obj = urun::find($id);
        $obj->baslik=$baslik;
        $obj->aciklama=$aciklama;
        $obj->fiyati=$fiyat;
        $obj->sira=$sira;
        kategoriUrun::where('urunler_id',$id)->delete();

        foreach ($kategori as $row)
        {
            $kategoriUrun = new kategoriUrun();
            $kategoriUrun->kategoriler_id = $row;
            $kategoriUrun->urunler_id = $id;
            $kategoriUrun->save();
        }

        return $obj->save();
    }
    public function resimUpt($id, $resim)
    {
        $obj = urun::find($id);
        $obj->resim=$resim;
        return $obj->save();
    }
}
