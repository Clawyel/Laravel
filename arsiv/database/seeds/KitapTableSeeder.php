<?php

use Illuminate\Database\Seeder;

class KitapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('kitaplars')->insert(['baslik' => 'Polisiye','sayfaSayisi' => 275,'yayineviID' => 1]);
    }
}
