<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Kunjungan;

class ResepSeeder extends Seeder
{
    public function run(): void
    {
        $kunjungans = Kunjungan::pluck('id')->toArray();

        if (count($kunjungans) < 4) {
            $this->command->error('Minimal 4 data kunjungan diperlukan.');
            return;
        }

        $reseps = [
            [
                'kunjungan_id' => $kunjungans[0],
                'tanggal_resep' => now(),
                'catatan_dokter' => 'Pasien diberi obat penurun panas dan vitamin',
            ],
            [
                'kunjungan_id' => $kunjungans[1],
                'tanggal_resep' => now(),
                'catatan_dokter' => 'Pasien diberi antibiotik selama 5 hari',
            ],
            [
                'kunjungan_id' => $kunjungans[2],
                'tanggal_resep' => now(),
                'catatan_dokter' => 'Pasien dianjurkan istirahat dan minum obat teratur',
            ],
            [
                'kunjungan_id' => $kunjungans[3],
                'tanggal_resep' => now(),
                'catatan_dokter' => 'Pasien diberikan obat sesuai keluhan',
            ],
        ];

        foreach ($reseps as $resep) {
            DB::table('reseps')->insert([
                ...$resep,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
