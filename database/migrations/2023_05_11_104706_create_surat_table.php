<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_organisasi')->nullable();
            $table->unsignedInteger('id_macam')->nullable();
            $table->unsignedInteger('id_user')->nullable();
            $table->unsignedInteger('id_kondisi')->nullable();
            $table->string('nomer', 10);
            $table->string('jenis_pemeliharaan', 100);
            $table->string('kerusakan', 100);
            $table->string('tindakan', 255)->nullable();
            $table->dateTime('waktu')->nullable();
            $table->string('status', 10)->nullable();
            $table->string('lokasi', 20);

            $table->foreign('id_organisasi')->references('id')->on('organisasi');
            $table->foreign('id_macam')->references('id')->on('macam');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_kondisi')->references('id')->on('kondisi_barang');
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
        Schema::dropIfExists('surat');
    }
}
