<?php

namespace Database\Seeders;

use App\Models\RumahSakit;
use Illuminate\Database\Seeder;

class RumahSakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kode_rs' => 'RS001A',
                'nama_rs' => 'Rumah Sakit Sehat Sentosa',
                'alamat' => 'Jl. Merdeka No. 10',
                'kota' => 'Jakarta',
                'provinsi' => 'DKI Jakarta',
                'telepon' => '021-12345678',
                'email' => 'sehatsentosa@gmail.com',
                'status' => 'aktif',
                'tipe_rs' => 'A',
            ],
            [
                'kode_rs' => 'RS002B',
                'nama_rs' => 'Rumah Sakit Sentosa Medika',
                'alamat' => 'Jl. Sudirman No. 25',
                'kota' => 'Bandung',
                'provinsi' => 'Jawa Barat',
                'telepon' => '022-87654321',
                'email' => 'sentosamedika@gmail.com',
                'status' => 'aktif',
                'tipe_rs' => 'B',
            ],
            [
                'kode_rs' => 'RS003C',
                'nama_rs' => 'Rumah Sakit Bhakti Husada',
                'alamat' => 'Jl. Diponegoro No. 5',
                'kota' => 'Surabaya',
                'provinsi' => 'Jawa Timur',
                'telepon' => '031-99887766',
                'email' => 'bhaktihusada@gmail.com',
                'status' => 'aktif',
                'tipe_rs' => 'C',
            ],
            [
                'kode_rs' => 'RS004D',
                'nama_rs' => 'Rumah Sakit Kasih Ibu',
                'alamat' => 'Jl. Malioboro No. 12',
                'kota' => 'Yogyakarta',
                'provinsi' => 'DI Yogyakarta',
                'telepon' => '0274-445566',
                'email' => 'kasihibu@gmail.com',
                'status' => 'aktif',
                'tipe_rs' => 'D', 
            ],
            [
                'kode_rs' => 'RS005C',
                'nama_rs' => 'Rumah Sakit Medika Utama',
                'alamat' => 'Jl. Gatot Subroto No. 8',
                'kota' => 'Medan',
                'provinsi' => 'Sumatera Utara',
                'telepon' => '061-55443322',
                'email' => 'medikautama@gmail.com',
                'status' => 'aktif',
                'tipe_rs' => 'C',
            ],
        ];

        foreach ($data as $item) {
            RumahSakit::firstOrCreate(
                ['kode_rs' => $item['kode_rs']], // cek unik
                $item
            );
        }
    }
}