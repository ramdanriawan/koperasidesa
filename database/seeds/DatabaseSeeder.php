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
        $this->call(UsersTableSeeder::class);
        $this->call(BarangTableSeeder::class);
        $this->call(AnggotaTableSeeder::class);
        $this->call(PembelianTableSeeder::class);
        $this->call(PengeluaranTableSeeder::class);
    }
}
