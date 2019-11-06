<?php

namespace App\Http\Controllers\admin;

use App\Entities\urun;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\kategoriInterface;
use App\Repositories\Interfaces\urunInterface;
use Illuminate\Http\Request;

class UrunController extends Controller
{
    //
    protected $objInterface;
    protected $objKategori;
    public function __construct(urunInterface $urun,kategoriInterface $kategori)
    {
        $this->objInterface = $urun;
        $this->objKategori = $kategori;
    }
    public function kategorilerLoad()
    {
        return $this->objKategori->fetchAll();
    }
    public function kategorilerLoadByUrunId($id)
    {
        return urun::find($id)->kategoriler;
    }
    public function fetchAll()
    {
        $kategoriler = $this->kategorilerLoad();
        $urunler = $this->objInterface->fetchAll();
        return view('admin.urunler',compact('urunler','kategoriler'));
    }
    public function getById()
    {
        $obj = $this->objInterface->getById(request('id'));
        return view('admin.urunDetayView',compact('obj'));
    }
    public function urunEkle(Request $request)
    {
        $this->validate(request(),
            ["baslik" => "required",
                "aciklama" => "required",
                "fiyat" => "required",
                "resim" => "required|file",
                "sira" => "required",
                "kategori" => "required"]);
            $kategori = $request->kategori;

            $fileName = "urun".time().'.'.request('resim')->getClientOriginalExtension();

            request('resim')->storeAs('uploads/urunler',$fileName);
            $newObj = $this->objInterface->create(request('baslik'),$kategori,request('aciklama'),$fileName,request('fiyat'),request('sira'));
            if($newObj)
            {

                $urunler = $this->objInterface->fetchAll();
                $success = 'Ekleme İşlemi Başarılı';
                return redirect()->route('admin.urunlerView',compact('urunler'));
            }
            else
            {
                return back()->with('success','Ekleme İşlemi Sırasında Hata Oluştu');
            }

    }
    public function urunKapakFotoDuzenle(Request $request,$id)
    {
        $this->validate(request(),
            ["resim" => "required|file"]
        );
        if($id > 0)
        {
            $urun = urun::find($id);
            $resim = $urun->resim;

            $fileName = "urun".time().'.'.request('resim')->getClientOriginalExtension();
            request('resim')->storeAs('uploads/urunler',$fileName);
            $resimUpt = $this->objInterface->resimUpt($id,$fileName);
            if($resimUpt)
            {
                unlink('storage/uploads/urunler/'.$resim);
                return back()->with('success','Fotoğraf Güncelleme İşlemi Başarılı');
            }
            else
            {
                return back()->with('success','Fotoğraf Değiştirilemedi');
            }
        }
        else
        {
            return back()->with('success','Hatalı Anahtar!');
        }

    }
    public function urunDuzenle(Request $request,$id)
    {

        if($id > 0)
        {
            $request->validate([
                'baslik' => 'required',
                'aciklama' => 'required',
                'fiyat' => 'required',
                'sira' => 'required',
                'kategori' => 'required'
            ]);
            print_r($request->kategori);
            $updateObj = $this->objInterface->update($id,$request->baslik,$request->kategori,$request->aciklama,$request->fiyat,$request->sira);
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
    public function urunSil(Request $request,$id)
    {
        if(request('id') > 0)
        {
            $deleteObj = $this->objInterface->delete(request('id'));
            if($deleteObj)
            {
                $urunler = $this->objInterface->fetchAll();
                $success = 'Ürün Silme İşlemi Başarılı';
                return redirect()->route('admin.urunlerView',compact('urunler'));
            }
            else
            {
                return back()->with('success','Silme İşlemi Sırasında Hata Oluştu');
            }
        }
        return back()->with('success','id değeri hatalı');

    }
    public function urunlerView()
    {
        return $this->fetchAll();
    }
    public function urunDuzenleView(Request $request,$id)
    {

        if($request->id > 0)
        {
            $obj = $this->objInterface->getById($request->id);
            $mevcutKategoriler = $this->kategorilerLoadByUrunId($id);
            $kategoriler = $this->kategorilerLoad();
            return view('admin.urunduzenle',compact('obj','kategoriler','mevcutKategoriler'));
        }
        return back()->with('success',"id değeri hatalı");
    }
    public function urunEkleView()
    {
         $kategoriler = $this->kategorilerLoad();
        return view('admin.urunekle',compact('kategoriler'));
    }
}
