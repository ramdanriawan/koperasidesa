<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengeluaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('barang_id')->unsigned(); #required|numeric|exists:barangs,id
            $table->integer('anggota_id')->unsigned(); #required|numeric|exists:anggotas,id
            $table->integer('harga'); #required|numeric|digits_between:4,8
            $table->integer('jumlah'); #required|numeric|min:1|max:1000
            $table->integer('total'); #required|numeric|min:1000|max:1000000
            $table->enum('status', ['selesai', 'pending']); #required|in:selesai,belum
            $table->string('catatan', 255)->nullable(); #max:255
            $table->timestamps();

            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('cascade');
            $table->foreign('anggota_id')->references('id')->on('anggotas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengeluarans');
    }
}
