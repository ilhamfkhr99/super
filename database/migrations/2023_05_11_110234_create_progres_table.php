<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progres', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_surat')->nullable();
            $table->unsignedInteger('id_user')->nullable();
            $table->dateTime('waktu');
            $table->text('catatan')->nullable();

            $table->foreign('id_surat')->references('id')->on('surat');
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('progres');
    }
}
