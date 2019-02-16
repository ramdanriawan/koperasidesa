<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama'); #required|min:3|max:50
            $table->enum('jenis', ['pupuk', 'racun']); #required|in:pupuk,racun
            $table->string('jumlah'); #required|numeric|min:1|max:1000
            $table->integer('harga'); #required|numeric|min:1000|max:10000000
            $table->integer('total'); #required|numeric|min:1000|max:10000000
            $table->string('gambar', 255); #required|image|max:3000
            $table->text('deskripsi')->nullable(); #min:5|max:500
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
}
