<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeKamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_kamar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kostan_id');
            $table->string('nama');
            $table->string('ukuran_kamar');
            $table->text('peraturan');
            $table->integer('harga');
            $table->integer('jumlah_kamar');
            $table->timestamps();
            $table->foreign('kostan_id')->references('id')->on('kostan')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_kamar');
    }
}
