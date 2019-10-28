<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class YayineviTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('yayinevleris')->insert(['baslik' => 'Alsancak Yayın Evi']);
    }
}
