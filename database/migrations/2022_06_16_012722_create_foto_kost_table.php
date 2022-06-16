<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoKostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_kost', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->unsignedBigInteger('kostan_id');
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
        Schema::dropIfExists('foto_kost');
    }
}
