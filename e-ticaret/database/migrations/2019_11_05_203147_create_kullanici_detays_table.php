<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKullaniciDetaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kullanici_detays', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('userID')->unsigned();
            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade')->onDelete('cascade')->onUpdate('cascade');

            $table->string('adresBaslik',255);
            $table->text('adres');
            $table->string('adresTarif',255);
            $table->string('telefon',60);
            $table->string('telefonYedek',60)->nullable();
            $table->timestamp('olusturma_tarihi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('guncelleme_tarihi')->default(DB::raw('CURRENT_TIMESTAMP on UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kullanici_detays');
    }
}
