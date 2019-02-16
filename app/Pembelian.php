<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    //
    protected $guarded = [];

    function barang()
    {
        return $this->belongsTo('\App\Barang');
    }
}
