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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kode_bayar')->unique();

            $table->unsignedBigInteger('pasien_id');
            $table->foreign('pasien_id')->references('id')->on('pasiens');

            $table->unsignedBigInteger('medis_id');
            $table->foreign('medis_id')->references('id')->on('medis');

            $table->string('alat_medis');
            $table->float('administrasi');
            $table->float('total_bayar');
            $table->enum('metode_pembayaran', ['Cash', 'Debit', 'Kredit']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};