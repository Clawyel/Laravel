<?php

use Illuminate\Database\Seeder;

class YazarKitapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('yazarkitaps')->insert(['kitaplar_id' => 1,'yazarlar_id' => 1]);
    }
}
