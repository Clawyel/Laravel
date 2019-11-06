<?php

namespace App\Http\Controllers\admin;

use App\Entities\sepetUrun;
use App\Entities\siparisler;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use PhpParser\Node\Expr\Array_;

class SiparisController extends Controller
{
    public function siparislerView()
    {
        $siparisler = siparisler::where('teslimDurum',0)->get();
        $arr =array();
        $urunler ="";
        foreach ($siparisler as $item)
        {
            if($item->siparisTuru == 0 && $item->kullaniciDetayID !=null && $item->sepetID !=null)
            {
                $sepetUrun = sepetUrun::find($item->sepetID)->urun;
                foreach ($sepetUrun as $row) {
                    $urunler = $urunler.$row->baslik." ".$item->adet."x".$row->fiyati." ";
                }
            }
            elseif($item->siparisTuru == 1)
            {
                $urunler = $item->urunler;
            }
            if($item->odemeTuru == 0)
            {
                $tur="Krapıda Kredi Kartı";
            }
            else
            {
                $tur = "Nakit";
            }
            $items = ['id' => $item->id, 'adSoyad' => $item->adSoyad,'email'=>$item->email,'adres'=>$item->adres,'adresTarif'=>$item->adresTarif,'telefon'=>$item->telefon,'telefonYedek'=>$item->telefonYedek,'odemeTuru'=>$tur,'toplamTutar'=>$item->toplamTutar,'urunler'=>$urunler];
            array_push($arr,$items);
        }
        return view('admin/siparisler')->with('arr',$arr);
    }
    public function siparisOnayla()
    {
        return back()->with('success','Sipariş Onaylandı');
    }
    public function siparisReddet()
    {
        return back()->with('success','Sipariş Reddedildi');
    }
    public function siparisTeslimEdildi()
    {
        return back()->with('success','Sipariş Teslim Edildi');
    }

}
