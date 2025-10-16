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
    Schema::create('pengguna_memiliki_hak_akses', function (Blueprint $table) {
        $table->unsignedBigInteger('hak_akses_id');
        $table->string('model_tipe');
        $table->unsignedBigInteger('model_id');

        $table->primary(['hak_akses_id','model_id','model_tipe']);
        $table->foreign('hak_akses_id')->references('id')->on('hak_akses')->onDelete('cascade');
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengguna_memiliki_hak_akses');
    }
};
