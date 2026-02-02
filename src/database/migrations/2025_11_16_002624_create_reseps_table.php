<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Kunjungan;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reseps', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Kunjungan::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->date('tanggal_resep')->nullable();
            $table->text('catatan_dokter')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reseps');
    }
};
