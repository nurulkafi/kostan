<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailFasilitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_fasilitas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fasilitas_id');
            $table->unsignedBigInteger('type_kamar_id');

            $table->timestamps();
            $table->foreign('fasilitas_id')->references('id')->on('fasilitas')->onDelete('CASCADE');
            $table->foreign('type_kamar_id')->references('id')->on('type_kamar')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_fasilitas');
    }
}
