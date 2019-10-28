<?php

use Illuminate\Database\Seeder;

class KategoriKitapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('kitap_kategoris')->insert(['kitaplar_id' => 1,'kategoriler_id' => 1]);
    }
}
