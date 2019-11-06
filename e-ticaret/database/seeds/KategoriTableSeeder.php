<?php

use Illuminate\Database\Seeder;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //DB::table('kategoris')->truncate();
        DB::table('kategoris')->insert(["baslik"=>"Elektronik","sira"=>1]);
        DB::table('kategoris')->insert(["baslik"=>"Ev & Yaşam","sira"=>2]);
        DB::table('kategoris')->insert(["baslik"=>"Giyim & Ayakkabı","sira"=>3]);
        DB::table('kategoris')->insert(["baslik"=>"Kozmetik & Kişisel Bakım","sira"=>4]);
        DB::table('kategoris')->insert(["baslik"=>"Kitap","sira"=>5]);
    }
}
