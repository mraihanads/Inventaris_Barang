<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('barang', function (Blueprint $table) {
            $table->dropColumn([
                'merk',
                'bahan',
                'harga_total',
                'harga_per_unit',
            ]);
        });
    }

    public function down(): void
    {
        Schema::table('barang', function (Blueprint $table) {
            $table->string('merk')->nullable();
            $table->string('bahan')->nullable();
            $table->bigInteger('harga_total')->default(0);
            $table->bigInteger('harga_per_unit')->default(0);
        });
    }
};
