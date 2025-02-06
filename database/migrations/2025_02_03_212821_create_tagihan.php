<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tagihan', function (Blueprint $table) {
            $table->increments('id_tagihan');
            $table->char('id_bulan',3);
            $table->integer('tahun');
            $table->string('id_pelanggan',50);
            $table->decimal('nominal',10,2);
            $table->date('waktu_awal');
            $table->date('waktu_akhir');
            $table->boolean('status_tagihan');
            $table->boolean('status_pembayaran');
            $table->timestamps();

            $table->foreign('id_bulan')->references('id_bulan')->on('bulan')->onDelete('restrict');
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihan');
    }
};
