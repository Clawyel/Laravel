<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSepetUrunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sepet_uruns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sepetID')->unsigned();
            $table->foreign('sepetID')->references('id')->on('sepets')->onDelete('cascade')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('urunID')->unsigned();
            $table->foreign('urunID')->references('id')->on('uruns')->onDelete('cascade')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('adet');
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
        Schema::dropIfExists('sepet_uruns');
    }
}
