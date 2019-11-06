<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\kategoriInterface;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    //
    protected $objInterface;
    public function __construct(kategoriInterface $kategori)
    {
        $this->objInterface = $kategori;
    }
    public function fetchAll()
    {
        $kategoriler = $this->objInterface->fetchAll();
        return view('admin.kategoriler',compact('kategoriler'));
    }
    public function getById()
    {
        $obj = $this->objInterface->getById(request('id'));
        return view('admin.kategoriDetayView',compact('obj'));
    }
    public function kategoriEkle()
    {
        $this->validate(request(),
            ["baslik" => "required",
                "sira" => "required"]);
        $newObj = $this->objInterface->create(request('baslik'),request('sira'));
        if($newObj)
        {

            $kategoriler = $this->objInterface->fetchAll();
            $success = 'Ekleme İşlemi Başarılı';
            return redirect()->route('admin.kategorilerView',compact('kategoriler'));
        }
        else
        {
            return back()->with('success','Ekleme İşlemi Sırasında Hata Oluştu');
        }
    }
    public function kategoriDuzenle(Request $request,$id)
    {

        $this->validate(request(),
            [
                "baslik" => "required",
                "sira" => "required"]);
        if(request('id') > 0)
        {
            $updateObj = $this->objInterface->update(request('id'),request('baslik'),request('sira'));
            if($updateObj)
            {
                return back()->with('success','Güncelleme İşlemi Başarılı');
            }
            else
            {
                return back()->with('success','Güncelleme İşlemi Sırasında Hata Oluştu');
            }
        }
        else
        {
            return back()->with('success','Hatalı Anahtar!');
        }

    }
    public function kategoriSil(Request $request,$id)
    {
        if(request('id') > 0)
        {
            $deleteObj = $this->objInterface->delete(request('id'));
            if($deleteObj)
            {
                $kategoriler = $this->objInterface->fetchAll();
                $success = 'Kategori Silme İşlemi Başarılı';
                return redirect()->route('admin.kategorilerView',compact('kategoriler'));
            }
            else
            {
                return back()->with('success','Silme İşlemi Sırasında Hata Oluştu');
            }
        }
        return back()->with('success','id değeri hatalı');

    }
    public function kategorilerView()
    {
        return $this->fetchAll();
    }
    public function kategoriDuzenleView(Request $request,$id)
    {

        if($request->id > 0)
        {
            $obj = $this->objInterface->getById($request->id);
            return view('admin.kategoriduzenle',compact('obj'));
        }
        return back()->with('success',"id değeri hatalı");
    }
}
