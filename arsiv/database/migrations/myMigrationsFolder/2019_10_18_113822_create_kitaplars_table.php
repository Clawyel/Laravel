<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKitaplarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategorilers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('yazarID')->unsigned()->nullable();
            $table->foreign('yazarID')->references('id')->on('yazarlars')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('yayineviID')->unsigned()->nullable();
            $table->foreign('yayineviID')->references('id')->on('yayinevleris')->onDelete('cascade')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('kategoriID')->unsigned()->nullable();
            $table->foreign('kategoriID')->references('id')->on('kategorilers')->onDelete('cascade')->onDelete('cascade')->onUpdate('cascade');
            $table->string('baslik');
            $table->integer('sayfaSayisi');
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
        Schema::dropIfExists('kitaplars');
    }
}
