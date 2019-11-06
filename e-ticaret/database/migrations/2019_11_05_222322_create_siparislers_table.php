<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiparislersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siparislers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('adSoyad');
            $table->text('adres');
            $table->string('adresTarif');
            $table->string('telefon');
            $table->string('telefonYedek')->nullable();
            $table->string('odemeTuru');
            $table->boolean('onayDurum')->default(0);
            $table->boolean('teslimDurum')->default(0);
            $table->string('email');
            $table->boolean('siparisTuru');
            $table->string('urunler')->nullable();
            $table->decimal('toplamTutar',6,2);
            $table->bigInteger('kullaniciDetayID')->nullable();
            $table->bigInteger('sepetID')->unsigned()->nullable();
            $table->foreign('sepetID')->references('id')->on('sepets')->onDelete('cascade')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('siparislers');
    }
}
