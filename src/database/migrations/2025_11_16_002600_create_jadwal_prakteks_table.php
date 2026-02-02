<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Dokter;
use App\Models\Poliklinik;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwal_prakteks', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Dokter::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Poliklinik::class)->constrained()->cascadeOnDelete();

            $table->enum('hari', [
                'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'
            ]);

            $table->time('jam_mulai');
            $table->time('jam_selesai');

            $table->string('ruangan_praktek')->nullable();
            $table->unsignedInteger('kuota_pasien')->default(20);
            $table->enum('status', ['aktif','libur'])->default('aktif');

            $table->timestamps();
            $table->index(['dokter_id', 'hari']);
            $table->index(['poliklinik_id']);

            $table->unique(
                ['dokter_id', 'hari', 'jam_mulai', 'jam_selesai'],
                'unique_jadwal_dokter_per_hari'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_prakteks');
    }
};