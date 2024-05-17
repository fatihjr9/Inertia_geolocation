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
        Schema::create('ternaks', function (Blueprint $table) {
            $table->id();
            $table->string('kelurahan');
            $table->string('prod_susu');
            $table->string('prod_sapi');
            $table->string('pemilik');
            $table->string('lahan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ternaks');
    }
};
