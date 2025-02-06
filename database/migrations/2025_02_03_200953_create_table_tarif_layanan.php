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
        Schema::create('tarif_layanan', function (Blueprint $table) {
            $table->bigIncrements('id_tarif_layanan'); // Ubah id menjadi id_tarif_layanan
            $table->integer('id_layanan');
            $table->string('tier',10);
            $table->integer('min_pemakaian');
            $table->integer('max_pemakaian')->nullable();
            $table->decimal('tarif', 10, 2);
            $table->timestamps();

            $table->foreign('id_layanan')->references('id_layanan')->on('layanan')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarif_layanan');
    }
};
