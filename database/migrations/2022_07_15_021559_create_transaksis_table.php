<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi');
            $table->unsignedBigInteger('tipe_kamar_id');
            $table->unsignedBigInteger('penyewa_id');
            $table->integer('lama_sewa');
            $table->date('tanggal_sewa')->nullable();
            $table->date('tanggal_berakhir')->nullable();
            $table->integer('jumlah_pembayaran');
            $table->string('bukti_pembayaran')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('tipe_kamar_id')->references('id')->on('type_kamar');
            $table->foreign('penyewa_id')->references('id')->on('penyewa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
