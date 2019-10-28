<?php

namespace App\Http\Controllers;

use App\Entities\kategoriler;
use App\Entities\kitapKategori;
use App\Entities\kitaplar;
use App\Entities\yazarkitap;
use App\Repositories\Interfaces\kitaplarInterface;
use Illuminate\Http\Request;

class KitapController extends Controller
{
    protected $objInterface;
    public function __construct(kitaplarInterface $kitaplar)
    {
        $this->objInterface = $kitaplar;
    }
    public function fetchAll()
    {
        $obj = $this->objInterface->fetchAll();
        return $obj;
    }
    public function getById()
    {
        $obj = $this->objInterface->getById(request('id'));
        return $obj;
    }
    public function create()
    {
        $this->validate(request(),
            [
                "baslik" => "required",
                "yayineviID" => "required",
                "yazarID" => "required",
                "kategoriID" => "required",
                "sayfaSayisi" => "required"]);
        $newObj = $this->objInterface->create(request('yayineviID'),request('kategoriID'),request('yazarID'),request('baslik'),request('sayfaSayisi'));
        if($newObj)
        {
            return response()->json([
                'status' => 200,
                'message' => 'Success.'
            ]);
        }
        else
        {
            return response()->json([
                'message' => 'Failed.'
            ]);
        }
    }
    public function update()
    {
        $this->validate(request(),
            ["id" => "required"]);
        if(request('id') > 0)
        {
            $id = request('id');
            $oldObj = kitaplar::find($id);
            if(request()->has('baslik'))
            {
                $baslik = request('baslik');
            }else
            {
                $baslik = $oldObj->baslik;
            }
            if(request()->has('yayineviID'))
            {
                $yayineviID = request('yayineviID');
            }else
            {
                $yayineviID = $oldObj->yayineviID;
            }
            if(request()->has('kategoriKitapTableID'))
            {
                if(request()->has('kategoriID'))
                {
                    $kategoriID = request('kategoriID');
                    $kitapKategoriUpt =kitapKategori::find(request('kategoriKitapTableID'));
                    $kitapKategoriUpt->kategoriler_id= $kategoriID;
                    $kitapKategoriUpt->save();
                }
            }

            if(request()->has('yazarKitapTableID'))
            {
                if(request()->has('yazarID'))
                {
                    $yazarID = request('yazarID');
                    $yazarKitapUpt = yazarkitap::find(request('yazarKitapTableID'));
                    $yazarKitapUpt->yazarlar_id= $yazarID;
                    $yazarKitapUpt->save();
                }
            }

            if(request()->has('sayfaSayisi'))
            {
                $sayfaSayisi = request('sayfaSayisi');
            }else
            {
                $sayfaSayisi = $oldObj->sayfaSayisi;
            }
            $updateObj = $this->objInterface->update($id,$yayineviID,$baslik,$sayfaSayisi);
            if($updateObj)
            {
                return response()->json([
                    'status' => 200,
                    'message' => 'Success.'
                ]);
            }
            else
            {
                return response()->json([
                    'message' => 'Failed.'
                ]);
            }
        }
        else
        {
            return response()->json([
                'message' => 'Failed.'
            ]);
        }

    }
    public function delete()
    {
        $this->validate(request(),
            ["id" => "required"]);
        if(request('id') > 0)
        {
            $deleteObj = $this->objInterface->delete(request('id'));
            if($deleteObj)
            {
                return response()->json([
                    'status' => 200,
                    'message' => 'Success.'
                ]);
            }
            else
            {
                return response()->json([
                    'message' => 'Failed.'
                ]);
            }
        }
        else
        {
            return response()->json([
                'message' => 'Failed.'
            ]);
        }
    }
    public function getByKategori()
    {

        if(request('id') > 0)
        {
            $kitap = $this->objInterface->getByKategori(request('id'));
            return $kitap;
        }
        else
        {
            return response()->json([
                'message' => 'Failed.'
            ]);
        }

    }
    public function getByYazar()
    {

        if(request('id') > 0)
        {
            $kitap = $this->objInterface->getByYazar(request('id'));
            return $kitap;
        }
        else
        {
            return response()->json([
                'message' => 'Failed.'
            ]);
        }

    }
    public function getBySayfaSayisi()
    {
        if(request('id') > 0)
        {
            $kitap = $this->objInterface->getBySayfaSayisi(request('id'));
            return $kitap;
        }
        else
        {
            return response()->json([
                'message' => 'Failed.'
            ]);
        }
    }
    public function getByYayinevi()
    {
        if(request('id') > 0)
        {
            $kitap = $this->objInterface->getByYayinevi(request('id'));
            return $kitap;
        }
        else
        {
            return response()->json([
                'message' => 'Failed.'
            ]);
        }
    }
    public function getByYayineviYazar()
    {
        if(request('id') > 0)
        {
            $kitap = $this->objInterface->getByYayineviYazar(request('id'));
            return $kitap;
        }
        else
        {
            return response()->json([
                'message' => 'Failed.'
            ]);
        }
    }
}
