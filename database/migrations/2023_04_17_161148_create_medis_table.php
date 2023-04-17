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
        Schema::create('medis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasien_id')->unique();
            $table->foreign('pasien_id')->references('id')->on('pasiens');

            $table->unsignedBigInteger('no_rm')->unique();
            $table->foreign('no_rm')->references('no_rm')->on('pasiens');

            $table->date('tanggal_kunjungan');
            $table->string('nama_pasien');
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->char('tensi', 11);
            $table->string('keluhan');
            $table->string('diagnosa');
            $table->string('tindakan');

            $table->string('nama_dokter');

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