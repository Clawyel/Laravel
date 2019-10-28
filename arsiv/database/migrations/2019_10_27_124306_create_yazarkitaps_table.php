<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYazarkitapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yazarkitaps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('kitaplar_id')->unsigned();
            $table->foreign('kitaplar_id')->references('id')->on('kitaplars')->onDelete('cascade')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('yazarlar_id')->unsigned();
            $table->foreign('yazarlar_id')->references('id')->on('yazarlars')->onDelete('cascade')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('yazarkitaps');
    }
}
