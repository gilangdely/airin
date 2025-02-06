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
        // Schema::create('detail_tagihan', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedInteger('id_tagihan');
        //     $table->string('id_pakai');
        //     $table->integer('pakai');
        //     $table->decimal('tarif',10,2);
        //     $table->decimal('subtotal',10,2);
        //     $table->timestamps();

        //     $table->foreign('id_tagihan')->references('id_tagihan')->on('tagihan')->onDelete('restrict');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('detail_tagihan');
    }
};
