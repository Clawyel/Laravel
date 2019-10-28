<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class YazarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('yazarlars')->insert(['baslik' => 'Ümit Duman']);
    }
}
