<?php

use Illuminate\Database\Seeder;

class UrunTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('uruns')->truncate();
        DB::table('uruns')->insert(["slug" => "elektronik-urun-1","baslik"=>"Elektronik Ürün-1","resim"=>"urun.png",'fiyati'=>9.90,"aciklama"=>"ürün açıklaması","sira"=>1]);
        DB::table('uruns')->insert(["slug" => "elektronik-urun-2","baslik"=>"Elektronik Ürün-2","resim"=>"urun.png",'fiyati'=>9.90,"aciklama"=>"ürün açıklaması","sira"=>2]);
        DB::table('uruns')->insert(["slug" => "elektronik-urun-3","baslik"=>"Elektronik Ürün-3","resim"=>"urun.png",'fiyati'=>9.90,"aciklama"=>"ürün açıklaması","sira"=>3]);
        DB::table('uruns')->insert(["slug" => "elektronik-urun-4","baslik"=>"Elektronik Ürün-4","resim"=>"urun.png",'fiyati'=>9.90,"aciklama"=>"ürün açıklaması","sira"=>4]);
        DB::table('uruns')->insert(["slug" => "ev-urun-1","baslik"=>"Ev Ürün-1","resim"=>"urun.png",'fiyati'=>19.90,"aciklama"=>"ürün açıklaması","sira"=>1]);
        DB::table('uruns')->insert(["slug" => "ev-urun-2","baslik"=>"Ev Ürün-2","resim"=>"urun.png",'fiyati'=>19.90,"aciklama"=>"ürün açıklaması","sira"=>2]);
        DB::table('uruns')->insert(["slug" => "ev-urun-3","baslik"=>"Ev Ürün-3","resim"=>"urun.png",'fiyati'=>19.90,"aciklama"=>"ürün açıklaması","sira"=>3]);
        DB::table('uruns')->insert(["slug" => "ev-urun-4","baslik"=>"Ev Ürün-4","resim"=>"urun.png",'fiyati'=>19.90,"aciklama"=>"ürün açıklaması","sira"=>4]);
        DB::table('uruns')->insert(["slug" => "giyim-urun-1","baslik"=>"Giyim Ürün-1","resim"=>"urun.png",'fiyati'=>39.90,"aciklama"=>"ürün açıklaması","sira"=>1]);
        DB::table('uruns')->insert(["slug" => "giyim-urun-2","baslik"=>"Giyim Ürün-2","resim"=>"urun.png",'fiyati'=>39.90,"aciklama"=>"ürün açıklaması","sira"=>2]);
        DB::table('uruns')->insert(["slug" => "giyim-urun-3","baslik"=>"Giyim Ürün-3","resim"=>"urun.png",'fiyati'=>39.90,"aciklama"=>"ürün açıklaması","sira"=>3]);
        DB::table('uruns')->insert(["slug" => "giyim-urun-4","baslik"=>"Giyim Ürün-4","resim"=>"urun.png",'fiyati'=>39.90,"aciklama"=>"ürün açıklaması","sira"=>4]);
        DB::table('uruns')->insert(["slug" => "kozmetik-urun-1","baslik"=>"Kozmetik Ürün-1","resim"=>"urun.png",'fiyati'=>49.90,"aciklama"=>"ürün açıklaması","sira"=>1]);
        DB::table('uruns')->insert(["slug" => "kozmetik-urun-2","baslik"=>"Kozmetik Ürün-2","resim"=>"urun.png",'fiyati'=>49.90,"aciklama"=>"ürün açıklaması","sira"=>2]);
        DB::table('uruns')->insert(["slug" => "kozmetik-urun-3","baslik"=>"Kozmetik Ürün-3","resim"=>"urun.png",'fiyati'=>49.90,"aciklama"=>"ürün açıklaması","sira"=>3]);
        DB::table('uruns')->insert(["slug" => "kozmetik-urun-4","baslik"=>"Kozmetik Ürün-4","resim"=>"urun.png",'fiyati'=>49.90,"aciklama"=>"ürün açıklaması","sira"=>4]);
        DB::table('uruns')->insert(["slug" => "kitap-urun-1","baslik"=>"Kitap Ürün-1","resim"=>"urun.png",'fiyati'=>9.90,"aciklama"=>"ürün açıklaması","sira"=>1]);
        DB::table('uruns')->insert(["slug" => "kitap-urun-2","baslik"=>"Kitap Ürün-2","resim"=>"urun.png",'fiyati'=>9.90,"aciklama"=>"ürün açıklaması","sira"=>2]);
        DB::table('uruns')->insert(["slug" => "kitap-urun-3","baslik"=>"Kitap Ürün-3","resim"=>"urun.png",'fiyati'=>9.90,"aciklama"=>"ürün açıklaması","sira"=>3]);
        DB::table('uruns')->insert(["slug" => "kitap-urun-4","baslik"=>"Kitap Ürün-4","resim"=>"urun.png",'fiyati'=>9.90,"aciklama"=>"ürün açıklaması","sira"=>4]);
    }
}
