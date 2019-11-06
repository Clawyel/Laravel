<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/index', function () {
    return view('template/index');
});
Route::get('/', 'HomeController@index')->name('anasayfa');

Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.loginView');
Route::get('/admin/register', function () {
    return view('admin.register');
});
Route::get('/giris-kayit', function () {
    return view('template.auth');
})->name('kullanici.loginView');

Route::post('/kullaniciKayit','HomeController@kayit')->name('kayitOl');
Route::post('/kullaniciGiris','HomeController@giris')->name('girisYap');
Route::post('/kullaniciCikis','HomeController@cikis')->name('kullaniciCikis');
Route::post('/kullaniciYeniDetay','HomeController@yeniKullaniciDetay')->name('kullaniciYeniDetay');
Route::post('/kullaniciSiparisTamamla','HomeController@checkout')->name('siparisCheckout');
Route::get('/urun-detay/{slug}', 'HomeController@urunDetayView')->name('urundetay');

Route::group(['prefix'=>'sepet'],function (){
    Route::get('/', 'HomeController@sepetView')->name('sepet.sepetView');
    Route::post('/ekle','HomeController@sepeteEkle')->name('sepet.ekle');
    Route::delete('/kaldir/{rowId}','HomeController@sepettenKaldir')->name('sepet.kaldir');
    Route::delete('/bosalt','HomeController@sepetiBosalt')->name('sepet.bosalt');
    Route::patch('/guncelle/{rowId}','HomeController@sepetAdetGuncelle')->name('sepet.adetGuncelle');
});

Route::group(['namespace'=>'admin'],function (){
    Route::post('/kayit','GirisKayitController@kayit')->name('admin.kayit');
    Route::post('/giris','GirisKayitController@giris')->name('admin.giris');

});

Route::group(["middleware"=>"yonetim",'namespace'=>'admin','prefix'=>'admin'],function (){

    //kategoriler
    Route::get('/kategoriler', 'KategoriController@kategorilerView')->name('admin.kategorilerView');
    Route::get('/kategori-ekle', function (){
        return view('admin.kategoriekle');
    })->name('admin.kategoriEkle');
    Route::get('/kategori-sil/{id}', 'KategoriController@kategoriSil')->name('admin.kategoriSil');
    Route::post('/kategori-ekle', 'KategoriController@kategoriEkle');
    Route::get('/kategoriduzenle/{id}', 'KategoriController@kategoriDuzenleView')->name('admin.kategoriDuzenleView');
    Route::post('/kategori-duzenle/{id}', 'KategoriController@kategoriDuzenle')->name('admin.kategoriDuzenle');
    //Ürünler
    Route::get('/urunler', 'UrunController@urunlerView')->name('admin.urunlerView');
    Route::get('/urun-ekle', 'UrunController@urunEkleView')->name('admin.urunEkleView');
    Route::post('/urun-ekle', 'UrunController@urunEkle')->name('admin.urunEkle');
    Route::get('/urun-sil/{id}', 'UrunController@urunSil')->name('admin.urunSil');
    Route::get('/urunduzenle/{id}', 'UrunController@urunDuzenleView')->name('admin.urunDuzenleView');
    Route::post('/urun-duzenle/{id}', 'UrunController@urunDuzenle')->name('admin.urunDuzenle');
    Route::post('/urun-kapak-foto-degistir/{id}', 'UrunController@urunKapakFotoDuzenle')->name('admin.urunKapakFotoDuzenle');


    //Siparişler
    Route::get('/siparisler', 'SiparisController@siparislerView')->name('admin.siparislerView');
    Route::post('/siparis-onayla/{id}', 'SiparisController@siparisOnayla')->name('admin.siparisOnayla');
    Route::post('/siparis-teslim-onayi/{id}', 'SiparisController@siparisTeslimEdildi')->name('admin.siparisTeslimEdildi');
    Route::post('/siparis-reddet/{id}', 'SiparisController@siparisReddet')->name('admin.siparisReddet');

    
    Route::post('/oturumukapat', 'AdminController@adminCikis')->name('admin.oturumukapat');
    Route::get('/', 'AdminController@solMenuSayfalarLoad')->name('panelView');





/* Sayfa Düzenlemeleri eklendi ama kullanılmadı ilerleyen zamanlarda içerik yönetimi için kullanılacaktır */
    Route::get('/sayfalar', 'AdminController@sayfalarView')->name('admin.sayfalarView');
    Route::get('/sayfaEkle', 'AdminController@sayfaEkleView')->name('admin.sayfaEkleView');
    Route::get('/sayfaSilAction/{id}', 'AdminController@sayfaSil');
    Route::post('/sayfaEkleAction', 'AdminController@sayfaEkle')->name('admin.sayfaEkleAction');
    Route::get('/sayfaduzenle/{id}', 'AdminController@sayfaDuzenleView')->name('admin.sayfaDuzenleView');
    Route::post('/sayfaDuzenleAction/{id}', 'AdminController@sayfaDuzenleAction')->name('admin.sayfaDuzenleAction');

});


