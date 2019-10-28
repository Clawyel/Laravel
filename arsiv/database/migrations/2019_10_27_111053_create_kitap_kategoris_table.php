<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKitapKategorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kitap_kategoris', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('kitaplar_id')->unsigned();
            $table->foreign('kitaplar_id')->references('id')->on('kitaplars')->onDelete('cascade')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('kategoriler_id')->unsigned();
            $table->foreign('kategoriler_id')->references('id')->on('kategorilers')->onDelete('cascade')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('kitap_kategoris');
    }
}
