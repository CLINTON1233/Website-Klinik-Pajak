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
        Schema::table('tb_konsultan', function (Blueprint $table) {
            $table->string('unique_id')->unique()->default('your_default_value_here');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_konsultan', function (Blueprint $table) {
            $table->dropColumn('unique_id');
        });
    }
};