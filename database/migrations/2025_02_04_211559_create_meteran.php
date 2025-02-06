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
        Schema::create('meteran', function (Blueprint $table) {
            $table->increments('id_meteran');
            $table->string('id_pelanggan',50);
            $table->integer('nomor_meteran');
            $table->integer('id_layanan');
            $table->text('lokasi_pemasangan');
            $table->date('tanggal_pemasangan');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan')->onDelete('restrict');
            $table->foreign('id_layanan')->references('id_layanan')->on('layanan')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meteran');
    }
};
