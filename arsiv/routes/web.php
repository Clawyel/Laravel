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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::post('/loginUser','HomeController@loginUser');
Route::post('/registerUser','HomeController@registerUser');
Route::group(['middleware' =>'auth:api','prefix'=>'authSys'],function (){
    Route::get('/getUser','HomeController@getUser');
    //Yazarlar
    Route::get('/fetchYazarlar','YazarController@fetchAll');
    Route::get('/getYazar/{id}','YazarController@getById');
    Route::post('/createYazar','YazarController@create');
    Route::put('/updateYazar','YazarController@update');
    Route::delete('/deleteYazar','YazarController@delete');
    //Kategoriler
    Route::get('/fetchKategoriler','KategoriController@fetchAll');
    Route::get('/getKategori/{id}','KategoriController@getById');
    Route::post('/createKategori','KategoriController@create');
    Route::put('/updateKategori','KategoriController@update');
    Route::delete('/deleteKategori','KategoriController@delete');
    //YayinEvleri
    Route::get('/fetchYayinEvleri','YayineviController@fetchAll');
    Route::get('/getYayinevi/{id}','YayineviController@getById');
    Route::post('/createYayinevi','YayineviController@create');
    Route::put('/updateYayinevi','YayineviController@update');
    Route::delete('/deleteYayinevi','YayineviController@delete');
    //Kitaplar
    Route::get('/fetchKitaplar','KitapController@fetchAll');
    Route::get('/getKitap/{id}','KitapController@getById');
    Route::get('/getKitapByKategori/{id}','KitapController@getByKategori');
    Route::get('/getKitapByYazar/{id}','KitapController@getByYazar');
    Route::get('/getKitapByYayinEvi/{id}','KitapController@getByYayinevi');
    Route::get('/getKitapByYayinEviYazar/{id}','KitapController@getByYayineviYazar');
    Route::get('/getKitapBySayfaSayisi/{id}','KitapController@getBySayfaSayisi');
    Route::post('/createKitap','KitapController@create');
    Route::put('/updateKitap','KitapController@update');
    Route::delete('/deleteKitap','KitapController@delete');

});

