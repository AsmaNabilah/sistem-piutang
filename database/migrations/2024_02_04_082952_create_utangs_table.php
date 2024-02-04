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
        Schema::create('utang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_transaksi');
            $table->date('tanggal_transaksi');
            $table->integer('jml_pinjaman');
            $table->string('status');
            $table->date('jatuh_tempo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utang');
    }
};
