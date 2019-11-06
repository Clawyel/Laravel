<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSepetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sepets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('kullaniciID')->unsigned();
            $table->foreign('kullaniciID')->references('id')->on('users')->onDelete('cascade')->onDelete('cascade')->onUpdate('cascade');

            $table->boolean('siparisDurum')->default(0);
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
        Schema::dropIfExists('sepets');
    }
}
