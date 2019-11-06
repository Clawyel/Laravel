<?php

use Illuminate\Database\Seeder;

class KategoriUJrunTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_uruns')->insert(["kategoriler_id"=>"1","urunler_id"=>"1"]);
        DB::table('kategori_uruns')->insert(["kategoriler_id"=>"1","urunler_id"=>"2"]);
        DB::table('kategori_uruns')->insert(["kategoriler_id"=>"1","urunler_id"=>"3"]);
        DB::table('kategori_uruns')->insert(["kategoriler_id"=>"1","urunler_id"=>"4"]);
        DB::table('kategori_uruns')->insert(["kategoriler_id"=>"2","urunler_id"=>"5"]);
        DB::table('kategori_uruns')->insert(["kategoriler_id"=>"2","urunler_id"=>"6"]);
        DB::table('kategori_uruns')->insert(["kategoriler_id"=>"2","urunler_id"=>"7"]);
        DB::table('kategori_uruns')->insert(["kategoriler_id"=>"2","urunler_id"=>"8"]);
        DB::table('kategori_uruns')->insert(["kategoriler_id"=>"2","urunler_id"=>"9"]);
        DB::table('kategori_uruns')->insert(["kategoriler_id"=>"3","urunler_id"=>"10"]);
        DB::table('kategori_uruns')->insert(["kategoriler_id"=>"3","urunler_id"=>"11"]);
        DB::table('kategori_uruns')->insert(["kategoriler_id"=>"3","urunler_id"=>"12"]);
        DB::table('kategori_uruns')->insert(["kategoriler_id"=>"3","urunler_id"=>"13"]);
        DB::table('kategori_uruns')->insert(["kategoriler_id"=>"4","urunler_id"=>"14"]);
        DB::table('kategori_uruns')->insert(["kategoriler_id"=>"4","urunler_id"=>"15"]);
        DB::table('kategori_uruns')->insert(["kategoriler_id"=>"4","urunler_id"=>"16"]);
        DB::table('kategori_uruns')->insert(["kategoriler_id"=>"4","urunler_id"=>"17"]);
        DB::table('kategori_uruns')->insert(["kategoriler_id"=>"5","urunler_id"=>"18"]);
        DB::table('kategori_uruns')->insert(["kategoriler_id"=>"5","urunler_id"=>"19"]);
        DB::table('kategori_uruns')->insert(["kategoriler_id"=>"5","urunler_id"=>"20"]);
        DB::table('kategori_uruns')->insert(["kategoriler_id"=>"5","urunler_id"=>"1"]);
        DB::table('kategori_uruns')->insert(["kategoriler_id"=>"2","urunler_id"=>"1"]);
        DB::table('kategori_uruns')->insert(["kategoriler_id"=>"3","urunler_id"=>"1"]);
    }
}
