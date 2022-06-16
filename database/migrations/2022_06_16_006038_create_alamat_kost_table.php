<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlamatKostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alamat_kost', function (Blueprint $table) {
            $table->id();
            $table->text('alamat_lengkap');
            $table->unsignedBigInteger('kostan_id');
            $table->unsignedBigInteger('kabupaten_id');
            $table->timestamps();

            $table->foreign('kostan_id')->references('id')->on('kostan')->onDelete('CASCADE');
            $table->foreign('kabupaten_id')->references('id')->on('kabupaten');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alamat_kost');
    }
}
