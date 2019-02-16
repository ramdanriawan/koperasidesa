<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 50); #required|min:3|max:50
            $table->string('alamat', 255); #required|min:10|max:255
            $table->string('no_hp', 20)->unique(); #required|numeric|digits_between:5,10|unique:anggotas,no_hp
            $table->string('no_ktp', 20)->unique(); #required|numeric|digits_between:16,20|unique:anggotas,no_ktp
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
        Schema::dropIfExists('anggotas');
    }
}
