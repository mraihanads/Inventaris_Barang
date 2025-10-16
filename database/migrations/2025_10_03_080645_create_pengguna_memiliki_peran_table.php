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
    Schema::create('pengguna_memiliki_peran', function (Blueprint $table) {
        $table->unsignedBigInteger('peran_id');
        $table->string('model_tipe');
        $table->unsignedBigInteger('model_id');

        $table->primary(['peran_id','model_id','model_tipe']);
        $table->foreign('peran_id')->references('id')->on('peran')->onDelete('cascade');
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengguna_memiliki_peran');
    }
};
