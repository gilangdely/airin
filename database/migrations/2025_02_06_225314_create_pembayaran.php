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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->increments('id_pembayaran');
            $table->integer('id_tagihan');
            $table->integer('id_meteran');
            $table->char('id_bulan',3);
            $table->integer('tahun');
            $table->decimal('total_nominal',10,2);
            $table->timestamp('waktu_pembayaran',0);
            $table->string('metode_pembayaran',50);
            $table->text('catatan');
            $table->string('petugas',50);
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
