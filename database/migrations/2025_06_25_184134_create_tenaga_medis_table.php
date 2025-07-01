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
        Schema::create('tenaga_medis', function (Blueprint $table) {
            $table->id('id_medis');
            $table->string('nama_medis', 100);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->enum('jenis_medis', ['Dokter', 'Bidan']);
            $table->string('spesialisasi')->nullable();
            $table->string('poto')->nullable();
            $table->string('no_telp', 20)->nullable();
            $table->string('username', 50)->unique();
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenaga_medis');
    }
};
