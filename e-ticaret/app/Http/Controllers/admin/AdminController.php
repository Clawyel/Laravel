<?php

namespace App\Http\Controllers\admin;
use App\Entities\page;
use App\Entities\sayfalar;
use App\Repositories\Eloquents\Pages\pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Repositories\Interfaces\pagesInterface;
use Auth;
class AdminController extends Controller
{
    //
    protected $pageInterface;
    protected $sliderInterface;
    protected $categoriInterface;
    public function  __construct(pagesInterface $pageInterface)
    {
        $this->pageInterface = $pageInterface;
       // $this->middleware('auth');
    }
    public function fetchPage()
    {
        $pages = $this->pageInterface->fetchPage();

    }

    public function index()
    {
       // $pages = $this->pageInterface->fetchPage();
    }
    public function sayfaEkle(Request $request)
    {
        $name = $request->input('baslik');
        $keywords = $request->input('keywords');
        $description = $request->input('description');
        $num = $request->input('sira');
        //$baslik = $request->baslik;
        //$sira= $request->sira;
        $pages = $this->pageInterface->newPage($name,$keywords,$description,$num);

        return redirect()->route('admin.sayfaEkleView');
    }

    public function sayfaDuzenleView($id)
    {
        if($id > 0)
        {
            $sayfaBilgileri = new page();
            $sayfaBilgileri = page::find($id);
        }
        return view('admin/sayfaduzenle',compact('sayfaBilgileri'));
    }
    public function sayfaDuzenleAction()
    {

        if(request('id') > 0)
        {
            $this->validate(request(),
                [
                    "baslik" => "required"
                ]
            );
            $baslik = request('baslik');
            $keywords = request('keywords');
            $description = request('description');
            $sira = request('sira');
            $this->pageInterface->editPageById(request('id'),$baslik,$keywords,$description,$sira);
            $sayfaBilgileri = new page();
            $sayfaBilgileri = page::find(request('id'));
        }
        return view('admin/sayfaduzenle',compact('sayfaBilgileri'));
    }
    public function solMenuSayfalarLoad()
    {
        return view('admin/anasayfa');
    }
    public function sayfalarView()
    {
       // $pages = $this->pageInterface->newPage('asdf','xzgvxzdfg','asdf465','3');
        $pages = $this->pageInterface->fetchPage();
        return view('admin.sayfalar')->with('pages',$pages);
    }
    public function sayfaEkleView()
    {
        return view('admin.sayfaekle');
    }
    public function sayfaSil(Request $request)
    {
        $id = $request->id;
        $this->pageInterface->deletePageById($id);
        $pages = $this->pageInterface->fetchPage();
        return redirect()->route('sayfalarView',['pages'=>$pages]);
    }
    public function adminCikis()
    {
        Auth::guard('yonetim')->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('admin.loginView');
    }
}
