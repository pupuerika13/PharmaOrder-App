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
        Schema::create('medicines', function (Blueprint $table) {
            $table->string('id')->primary(); // we use string id like 'amoxicillin'
            $table->string('kategori');
            $table->string('nama');
            $table->integer('harga');
            $table->string('gambar')->nullable();
            $table->boolean('wajib_resep')->default(false);
            $table->string('stok'); // 'Tersedia', 'Stok Menipis', 'Habis'
            $table->integer('stok_angka');
            $table->string('pabrikan')->nullable();
            $table->string('bentuk')->nullable();
            $table->string('kemasan')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
