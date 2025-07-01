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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id('id_pasien');
            $table->string('nama_lengkap', 100);
            $table->text('alamat');
            $table->integer('usia');
            $table->string('no_telp', 20)->nullable();
            $table->text('jenis_penyakit')->nullable();
            $table->unsignedBigInteger('id_kamar')->nullable();
            $table->unsignedBigInteger('id_medis')->nullable();
            $table->date('tanggal_masuk');
            $table->timestamps();

            $table->foreign('id_kamar')->references('id_kamar')->on('kamars')->nullOnDelete();
            $table->foreign('id_medis')->references('id_medis')->on('tenaga_medis')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
