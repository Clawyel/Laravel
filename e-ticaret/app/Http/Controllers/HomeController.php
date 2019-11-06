<?php

namespace App\Http\Controllers;

use App\Entities\kategori;
use App\Entities\kullaniciDetay;
use App\Entities\sepet;
use App\Entities\sepetUrun;
use App\Entities\siparisler;
use App\Entities\urun;
use App\Repositories\Eloquents\User\user;
use App\Repositories\Interfaces\sepetInterface;
use App\Repositories\Interfaces\sepetUrunInterface;
use App\Repositories\Interfaces\urunInterface;
use App\Repositories\Interfaces\userInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $userInterface;
    protected $urunInterface;
    protected $sepetInterface;
    protected $sepetUrunInterface;
    public function __construct(userInterface $userInterface,urunInterface $urunInterface,sepetInterface $sepetInterface,sepetUrunInterface $sepetUrunInterface)
    {
        $this->userInterface = $userInterface;
        $this->urunInterface = $urunInterface;
        $this->sepetInterface = $sepetInterface;
        $this->sepetUrunInterface = $sepetUrunInterface;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $urunler = kategori::with('urunler')->get();
        return view('template.index',compact('urunler'));
    }
    public function sepetView()
    {
        if(auth('kullanici')->check())
        {
            $user = auth('kullanici')->user()->detay;
            $kullaniciDetay = $user;
            //return $kullaniciDetay;
            return view('template.sepet',compact('kullaniciDetay'));
        }
        return view('template.sepet');
    }
    public function sepeteEkle(Request $request)
    {
        if($request->id > 0 && $request->adet > 0)
        {
            $aktifSepetID = session('aktifSepetID');
            $urun = urun::find($request->id);
            $sepet = Cart::add($urun->id,$urun->baslik,$request->adet,$urun->fiyati);
            if(auth('kullanici')->check())
            {
                if(!isset($aktifSepetID))
                {
                    $createdSepetID = $this->sepetInterface->create(auth('kullanici')->id());
                    session()->put('aktifSepetID',$createdSepetID);
                    $this->sepetUrunInterface->create($createdSepetID,$urun->id,$request->adet);
                    return back()->with('success','Sepete Ekleme İşlemi Başarılı');
                }
                else
                {
                    $this->sepetUrunInterface->create($aktifSepetID,$urun->id,$request->adet);

                    return back()->with('success','Sepete Ekleme İşlemi Başarısız! Session Hatası');
                }
            }
        }
        return back()->with('success','Sepete Ekleme İşlemi Başarısız');
    }
    public function sepettenKaldir($rowId)
    {

            $aktifSepetID = session('aktifSepetID');
            $cartItem = Cart::get($rowId);
            Cart::remove($rowId);
            if(isset($aktifSepetID))
            {

                $this->sepetUrunInterface->delete($aktifSepetID,$cartItem->id);

                return back()->with('success','Sepetten Ürün Silme İşlemi Başarılı');
            }
            return back()->with('success','Sepetten Ürün Silme İşlemi Başarılı');

    }
    public function sepetiBosalt()
    {
        Cart::destroy();
        if(isset($aktifSepetID))
        {
            sepetUrun::where('sepetID',$aktifSepetID)->delete();
        }
        return back()->with('success','Sepet Boşaltma İşlemi Başarılı');
    }
    public function sepetAdetGuncelle(Request $request,$rowId)
    {
        $aktifSepetID = session('aktifSepetID');
        $cartItem = Cart::get($rowId);
        Cart::update($rowId,$request->adet);
         if(isset($aktifSepetID))
         {
             $this->sepetUrunInterface->update($aktifSepetID,$cartItem->id,$request->adet);
              return response()->json(["success"=>true]);
         }
        return response()->json(["success"=>true]);


    }
    public function urunDetayView(Request $request,$slug)
    {
        $urun = $this->urunInterface->getBySlug($slug);
        $kategoriler = kategori::all();
        return view('template.urundetay',compact('urun','kategoriler'));
    }
    public function kayit()
    {
        $this->validate(request(),
            [
                "name" => "required|min:5|max:60",
                "email" => "required|email|unique:users",
                "password" => "required|confirmed|min:8|max:15"
            ]
        );
        $adSoyad = request('name');
        $email = request('email');
        $password = Hash::make(request('password'));
        $activationCode = Str::random(60);
        $this->userInterface->newUser($adSoyad,$email,$password,$activationCode);
        return redirect()->route('anasayfa');
    }
    public function giris()
    {
        if(request()->isMethod('POST'))
        {
            $this->validate(request(),
                [
                    "email" => "required|email",
                    "password" => "required|min:8|max:15"
                ]
            );
            $credentials = [
                "email" => request()->get('email'),
                "password" => request()->get('password'),
                "aktifmi" => 1,
            ];
            if(Auth::guard('kullanici')->attempt($credentials))
            {
                $aktifSepetID = sepet::firstOrCreate(['kullaniciID'=>auth('kullanici')->id()])->id;
                session()->put('aktifSepetID',$aktifSepetID);
                if(Cart::count()>0)
                {
                    foreach (Cart::content() as $cartItem)
                    {
                        sepetUrun::updateOrCreate([
                            "sepetID" => $aktifSepetID,
                            "urunID" => $cartItem->id,
                            "adet" => $cartItem->qty
                        ]);

                    }
                }
                Cart::destroy();
                $sepettekiUrunler = sepetUrun::where('sepetID',$aktifSepetID)->get();
                foreach ($sepettekiUrunler as $urunler)
                {
                    $urun = urun::find($urunler->urunID);
                    Cart::add($urun->id,$urun->baslik,$urunler->adet,$urun->fiyati);

                }
                return redirect()->route("anasayfa");
            }
            else
            {
               return back()->withInput()->withErrors(['email'=>"Giriş Hatalı!"]);
            }
        }
         return view('kullanici.loginView');
    }
    public function yeniKullaniciDetay()
    {
        if(request()->isMethod('POST')) {
            $this->validate(request(),
                [
                    "adresAdi" => "required|max:255",
                    "adres" => "required",
                    "adresTarifi" => "required|max:255",
                    "cep" => "required|max:60",
                    "cepYedek" => "max:60"
                ]
            );
            if(auth('kullanici')->check())
            {
                $yeniDetay = new kullaniciDetay();
                $yeniDetay->userID = auth('kullanici')->id();
                $yeniDetay->adresBaslik = request('adresAdi');
                $yeniDetay->adres = request('adres');
                $yeniDetay->adresTarif = request('adresTarifi');
                $yeniDetay->telefon = request('cep');
                $yeniDetay->telefonYedek = request('cepYedek');
                $yeniDetay->save();
                return back()->with('success','Ekleme İşlemi Başarılı');
            }
            return back();
        }
        return back();
    }
    public function cikis()
    {
        auth('kullanici')->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('anasayfa');
    }
    public function checkout()
    {


        if (request()->isMethod('POST'))
        {

            if (Cart::count() > 0) {

                $aktifSepetID = session('aktifSepetID');
                if (auth('kullanici')->check() && isset($aktifSepetID)) {

                    $this->validate(request(),
                        [
                            "adresSecimi" => "required",
                            "odemeTuru" => "required"
                        ]
                    );
                    if(request('odemeTuru') == 1)
                    {
                        $odemeTuru = 1;
                    }
                    else
                    {
                        $odemeTuru = 0;
                    }
                    $detay = kullaniciDetay::find(request('adresSecimi'));
                    $siparis = new siparisler();
                    $siparis->siparisTuru = 0; //üye
                    $siparis->sepetID = $aktifSepetID; //üye
                    $siparis->kullaniciDetayID = request('adresSecimi'); //üye
                    $siparis->odemeTuru = $odemeTuru;

                    $siparis->toplamTutar = Cart::total();
                    $siparis->adSoyad =$detay->kullanici->name;
                    $siparis->adres = $detay->adres;
                    $siparis->adresTarif = $detay->adresTarif;
                    $siparis->telefon = $detay->telefon;
                    $siparis->telefonYedek = $detay->telefonYedek;
                    $siparis->email = $detay->kullanici->email;
                    $siparis->save();
                    sepet::where('kullaniciID',auth('kullanici')->id())->update(["siparisDurum" => 1]);
                    Cart::destroy();
                    return view('template/index');
                }
                else
                {

                    //kayitsiz satın alma
                    //kid = 1 = guest

                    $this->validate(request(),
                        [
                            "adres" => "required",
                            "adresTarifi" => "required|min:20",
                            "cep" => "required",
                            "email" => "required|email",
                            "adSoyad" => "required",
                            "odemeTuru" => "required"
                        ]
                    );
                    if(request('odemeTuru') == 1)
                    {
                        $odemeTuru = 1;
                    }
                    else
                    {
                        $odemeTuru = 0;
                    }
                    $urunler = "";
                    foreach (Cart::content() as $item) {
                        $urunler = $urunler.$item->name." ------ ".$item->qty."x".$item->price." ";
                    }
                    $siparis = new siparisler();
                    $siparis->siparisTuru = 1; //misafir
                    $siparis->urunler = $urunler;
                    $siparis->odemeTuru = $odemeTuru;
                    $siparis->toplamTutar = Cart::total();
                    $siparis->adSoyad = request('adSoyad');
                    $siparis->adres = request('adres');
                    $siparis->adresTarif = request('adresTarifi');
                    $siparis->telefon = request('cep');
                    $siparis->telefonYedek = request('cepYedek');
                    $siparis->email = request('email');
                    $siparis->save();
                    Cart::destroy();
                    return back();
                }
            }
            return back();
        }
        return back();
    }
}
