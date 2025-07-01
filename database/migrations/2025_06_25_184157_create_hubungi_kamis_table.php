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
        Schema::create('hubungi_kamis', function (Blueprint $table) {
            $table->id('id_kontak');
            $table->string('nama', 100);
            $table->string('email', 100);
            $table->text('pesan');
            $table->timestamp('tanggal_kirim')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hubungi_kamis');
    }
};
