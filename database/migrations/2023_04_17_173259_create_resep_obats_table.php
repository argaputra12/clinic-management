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
        Schema::create('resep_obats', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('resep_id');
            $table->foreign('resep_id')->references('id')->on('reseps');

            $table->unsignedBigInteger('obat_id');
            $table->foreign('obat_id')->references('id')->on('obats');

            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resep_obats');
    }
};
