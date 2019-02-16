<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelians', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('barang_id')->unsigned(); #required|numeric|exists:barangs,id
            $table->integer('harga'); #required|numeric|digits_between:4,8|min:1000|max:10000000
            $table->integer('jumlah'); #required|numeric|min:1|max:10000
            $table->integer('total'); #required|numeric|digits_between:4,8|min:1000|max:10000000
            $table->string('catatan', 255)->nullable(); #max:255
            $table->timestamps(); 

            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembelians');
    }
}
