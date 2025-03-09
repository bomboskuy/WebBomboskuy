<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pembelian');
            $table->foreignId('tipe_penjualan')->references('id')->on('tipe_penjualan');
            $table->integer('jumlah_bomboloni');
            $table->decimal('hpp');
            $table->decimal('omzet');
            $table->decimal('discounted_price')->nullable();

            $table->unsignedBigInteger('diskon')->nullable();
            $table->foreign('diskon')->references('id')->on('diskon')
                ->onDelete('cascade');

            $table->enum('status', ['Belum Lunas', 'Lunas', 'Belum Dibayar', 'Reimburse'])->default('Belum Dibayar');
            $table->decimal('net_profit');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};
