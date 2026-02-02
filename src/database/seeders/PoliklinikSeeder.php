<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Poliklinik;

class PoliklinikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataPoli = [
            [
                'kode_poli' => 'POLI001',
                'nama_poli' => 'Poli Umum',
                'deskripsi' => 'Pelayanan penyakit umum',
                'lokasi' => 'Lantai 1',
            ],
            [
                'kode_poli' => 'POLI002',
                'nama_poli' => 'Poli Anak',
                'deskripsi' => 'Pelayanan kesehatan anak',
                'lokasi' => 'Lantai 2',
            ],
            [
                'kode_poli' => 'POLI003',
                'nama_poli' => 'Poli Gigi',
                'deskripsi' => 'Perawatan gigi dan mulut',
                'lokasi' => 'Lantai 1',
            ],
            [
                'kode_poli' => 'POLI004',
                'nama_poli' => 'Poli Kandungan',
                'deskripsi' => 'Kesehatan ibu dan kandungan',
                'lokasi' => 'Lantai 3',
            ],
            [
                'kode_poli' => 'POLI005',
                'nama_poli' => 'Poli Penyakit Dalam',
                'deskripsi' => 'Penanganan penyakit organ dalam',
                'lokasi' => 'Lantai 2',
            ],
            [
                'kode_poli' => 'POLI006',
                'nama_poli' => 'Poli Saraf',
                'deskripsi' => 'Gangguan sistem saraf',
                'lokasi' => 'Lantai 3',
            ],
            [
                'kode_poli' => 'POLI007',
                'nama_poli' => 'Poli THT',
                'deskripsi' => 'Telinga, Hidung, dan Tenggorokan',
                'lokasi' => 'Lantai 2',
            ],
        ];

        foreach ($dataPoli as $poli) {
            Poliklinik::firstOrCreate(
                ['kode_poli' => $poli['kode_poli']],
                [
                    'rumah_sakit_id' => 1,
                    'nama_poli' => $poli['nama_poli'],
                    'deskripsi' => $poli['deskripsi'],
                    'lokasi' => $poli['lokasi'],
                    'jam_buka' => '08:00:00',
                    'jam_tutup' => '16:00:00',
                    'status' => 'aktif',
                ]
            );
        }
    }
}