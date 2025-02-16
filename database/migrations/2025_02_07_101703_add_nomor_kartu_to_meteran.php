<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('meteran', function (Blueprint $table) {
            $table->string('chip_kartu')->after('status')->nullable();
        });
    }

    public function down()
    {
        Schema::table('meteran', function (Blueprint $table) {
            $table->dropColumn('chip_kartu');
        });
    }
};
