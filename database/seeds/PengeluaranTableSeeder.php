<?php

use Illuminate\Database\Seeder;
use App\Pengeluaran;

class PengeluaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengeluaran::create([
            'barang_id' => 1,
            'anggota_id' => 1,
            'harga' => 10000,
            'jumlah' => 1,
            'total' => 10000,
            'status' => 'pending',
        ]);

        Pengeluaran::create([
            'barang_id' => 2,
            'anggota_id' => 2,
            'harga' => 10000,
            'jumlah' => 1,
            'total' => 10000,
            'status' => 'pending',
        ]);
    }
}
