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
        Schema::table('pemakaian', function (Blueprint $table) {
            $table->timestamps(); // Menambahkan created_at dan updated_at
            $table->unsignedBigInteger('created_by')->nullable()->after('updated_at'); // Menyimpan ID user yang membuat
            $table->unsignedBigInteger('updated_by')->nullable()->after('created_by'); // Menyimpan ID user yang mengupdate

            // Jika ingin menambahkan foreign key ke tabel users (opsional)
            $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemakaian', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
            $table->dropColumn(['created_at', 'updated_at', 'created_by', 'updated_by']);
        });
    }
};
