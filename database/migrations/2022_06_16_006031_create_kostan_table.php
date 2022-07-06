<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKostanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kostan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pemilik_kost_id');
            $table->string('nama');
            $table->string('gender');
            $table->string('slug')->unique();
            $table->text('deskripsi');
            $table->timestamps();

            $table->foreign('pemilik_kost_id')->references('id')->on('pemilik_kost');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kostan');
    }
}
