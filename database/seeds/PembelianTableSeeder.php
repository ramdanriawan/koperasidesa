<?php

use Illuminate\Database\Seeder;
use App\Pembelian;

class PembelianTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pembelian::create([
            'barang_id' => 1,
            'harga' => 10000,
            'jumlah' => 2,
            'total' => 20000,
        ]);

        Pembelian::create([
            'barang_id' => 2,
            'harga' => 10000,
            'jumlah' => 2,
            'total' => 20000,
        ]);
    }
}
