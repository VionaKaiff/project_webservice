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
        Schema::create('referensi', function (Blueprint $table) {
            $table->id();
            $table->string("judul_referensi");
            $table->string("penulis");
            $table->string("tahun");
            $table->string("kategori");
            $table->string("gambar");
            $table->text("deskripsi");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referensi');
    }
};
