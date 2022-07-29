<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTransaksi2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->string('nama_bank_pengirim')->after('jumlah_pembayaran')->nullable();
            $table->string('no_rekening_pengirim')->after('nama_bank_pengirim')->nullable();
            $table->string('atas_nama_pengirim')->after('no_rekening_pengirim')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
