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
        Schema::create('danusan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pembelian'); 
            $table->integer('pesanan_bomboloni')->nullable(); 
            $table->decimal('hpp_total')->nullable(); 
            $table->decimal('omzet')->nullable();
            $table->decimal('jumlah_terjual')->nullable(); 
            $table->decimal('jumlah_tersisa')->nullable(); 
            $table->decimal('net_profit')->nullable();
            $table->enum('keterangan', ['belum lunas', 'lunas', 'belum dibayar'])->default('belum dibayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danusan');
    }
};
