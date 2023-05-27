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
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasien_id')->unique();
            $table->foreign('pasien_id')->references('id')->on('pasiens')->cascadeOnDelete();

            $table->unsignedBigInteger('dokter_id');
            $table->foreign('dokter_id')->references('id')->on('dokters')->cascadeOnDelete();

            $table->date('tanggal_kunjungan');
            $table->char('tensi', 11);
            $table->string('keluhan');
            $table->string('diagnosa');
            $table->string('tindakan');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medis');
    }
};
