<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    //
    protected $guarded = [];

    public function barang()
    {
        return $this->belongsTo('\App\Barang');
    }

    public function anggota()
    {
        return $this->belongsTo('\App\Anggota');
    }
}
