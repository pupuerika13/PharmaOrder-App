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
        Schema::create('transactions', function (Blueprint $table) {
            $table->string('id')->primary(); // we use 'ORD-XXXXX-A'
            $table->string('obat_id');
            $table->string('nama_obat');
            $table->integer('harga_satuan');
            $table->integer('qty');
            $table->integer('total');
            $table->string('nama_klien');
            $table->string('alamat');
            $table->string('pembayaran');
            $table->string('status'); // 'Menunggu Proses', 'Selesai'
            $table->timestamp('waktu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
