<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dokter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DokterSeeder extends Seeder
{
    public function run(): void
    {
        $dokters = [
            [
                'nama' => 'dr. Andi Saputra',
                'spesialis' => 'Dokter Umum',
                'no_telp' => '081234567890',
                'alamat' => 'Jl. Merdeka No. 10, Jakarta',
                'foto_file' => 'andi_saputra.jpg',
            ],
            [
                'nama' => 'dr. Sinta Maharani',
                'spesialis' => 'Dokter Anak',
                'no_telp' => '081298765432',
                'alamat' => 'Jl. Melati No. 5, Bandung',
                'foto_file' => 'sinta_maharani.jpg',
            ],
            [
                'nama' => 'dr. Budi Hartono',
                'spesialis' => 'Dokter Gigi',
                'no_telp' => '082112223333',
                'alamat' => 'Jl. Sudirman No. 21, Surabaya',
                'foto_file' => 'budi_hartono.jpg',
            ],
            [
                'nama' => 'dr. Rina Lestari',
                'spesialis' => 'Dokter Kandungan',
                'no_telp' => '083344556677',
                'alamat' => 'Jl. Diponegoro No. 8, Yogyakarta',
                'foto_file' => 'rina_lestari.jpg',
            ],
            [
                'nama' => 'dr. Fahmi Pratama',
                'spesialis' => 'Dokter Penyakit Dalam',
                'no_telp' => '085566778899',
                'alamat' => 'Jl. Gatot Subroto No. 15, Medan',
                'foto_file' => 'fahmi_pratama.jpg',
            ],
        ];

        foreach ($dokters as $dokter) {
            $fotoPath = null;

            if (!empty($dokter['foto_file'])) {
                $sourcePath = database_path('seeders/fotos/dokter/' . $dokter['foto_file']);

                if (file_exists($sourcePath)) {
                    $filename = Str::random(10) . '_' . $dokter['foto_file'];

                    Storage::disk('public')->putFileAs('dokter', $sourcePath, $filename);

                    $fotoPath = 'dokter/' . $filename;
                }
            }

            Dokter::updateOrCreate(
                ['nama' => $dokter['nama']],
                [
                    'spesialis' => $dokter['spesialis'],
                    'no_telp' => $dokter['no_telp'],
                    'alamat' => $dokter['alamat'],
                    'foto' => $fotoPath,
                ]
            );
        }
    }
}