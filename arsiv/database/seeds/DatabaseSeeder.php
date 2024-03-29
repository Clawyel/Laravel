<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(KategoriTableSeeder::class);
        $this->call(YazarTableSeeder::class);
        $this->call(YayineviTableSeeder::class);
        $this->call(KitapTableSeeder::class);
        $this->call(YazarKitapTableSeeder::class);
        $this->call(KategoriKitapTableSeeder::class);
    }
}
