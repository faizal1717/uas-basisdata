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
        Schema::create('obats', function (Blueprint $table) {
            $table->id();

            $table->string('nama_obat')->unique(); 
            $table->string('kategori');             
            $table->integer('stok')->default(0);
            $table->decimal('harga', 12, 2);
            $table->date('tanggal_kadaluarsa');

            $table->timestamps();

            $table->index('nama_obat');
            $table->index('kategori');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obats');
    }
};