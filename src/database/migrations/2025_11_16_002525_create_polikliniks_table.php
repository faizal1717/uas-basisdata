<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\RumahSakit;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('polikliniks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(RumahSakit::class)->constrained()->cascadeOnDelete();
            $table->string('nama_poli');
            $table->text('deskripsi')->nullable();
            $table->string('kode_poli', 20)->unique();
            $table->string('lokasi')->nullable();
            $table->time('jam_buka')->default('08:00:00');
            $table->time('jam_tutup')->default('16:00:00');
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();
            $table->string('upload_gambar')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polikliniks');
    }
};