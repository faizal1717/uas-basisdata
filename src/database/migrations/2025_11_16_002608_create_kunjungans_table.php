<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Pasien;
use App\Models\JadwalPraktek;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kunjungans', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Pasien::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(JadwalPraktek::class)->constrained()->cascadeOnDelete();
            $table->date('tanggal_kunjungan');
            $table->text('keluhan')->nullable();
            $table->text('diagnosa')->nullable();
            $table->enum('status_kunjungan', [
                'menunggu',
                'diperiksa',
                'selesai',
                'dibatalkan'
            ])->default('menunggu');
            $table->integer('nomor_antrian')->nullable();
            $table->time('jam_datang')->nullable();
            $table->time('jam_selesai')->nullable();
            $table->text('catatan_tambahan')->nullable();
            $table->timestamps();

            $table->index('tanggal_kunjungan');
            $table->index('status_kunjungan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kunjungans');
    }
};