<?php

use Illuminate\Database\Seeder;
use App\Barang;

class BarangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barang::create([
            'nama' => 'sianida 1',
            'jenis' => 'racun',
            'jumlah' => 2,
            'harga' => 10000,
            'total' => 20000,
            'gambar' => 'gambarProduk/produk1.jpg',
            'deskripsi' => 'ini adalah racun paling berbahaya',
        ]);

        Barang::create([
            'nama' => 'pupuk 1',
            'jenis' => 'pupuk',
            'jumlah' => 2,
            'harga' => 10000,
            'total' => 20000,
            'gambar' => 'gambarProduk/pupuk1.jpg',
            'deskripsi' => 'ini adalah pupuk paling subur',
        ]);
    }
}
