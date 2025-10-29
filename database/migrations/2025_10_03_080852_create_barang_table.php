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
    Schema::create('barang', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('lokasi_barang_id');
        $table->unsignedBigInteger('perolehan_barang_id');
        $table->string('kode_barang')->unique();
        $table->string('nama');
        $table->year('tahun_perolehan');
        $table->tinyInteger('kondisi')->comment('1=Baik,2=Kurang Baik,3=Rusak Berat');
        $table->longText('catatan')->nullable();
        $table->timestamps();

        $table->foreign('lokasi_barang_id')->references('id')->on('lokasi_barang');
        $table->foreign('perolehan_barang_id')->references('id')->on('perolehan_barang');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
