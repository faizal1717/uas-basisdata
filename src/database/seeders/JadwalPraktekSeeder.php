<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Dokter;
use App\Models\Poliklinik;

class JadwalPraktekSeeder extends Seeder
{
    public function run(): void
    {
        $dokter1 = Dokter::where('nama', 'dr. Andi Saputra')->first();
        $dokter2 = Dokter::where('nama', 'dr. Sinta Maharani')->first();
        $dokter3 = Dokter::where('nama', 'dr. Budi Hartono')->first();
        $dokter4 = Dokter::where('nama', 'dr. Rina Lestari')->first();
        $dokter5 = Dokter::where('nama', 'dr. Fahmi Pratama')->first();

        $poliUmum   = Poliklinik::first();
        $poliAnak   = Poliklinik::skip(1)->first();
        $poliGigi   = Poliklinik::skip(2)->first();
        $poliKandung= Poliklinik::skip(3)->first();
        $poliPenyakitDalam = Poliklinik::skip(4)->first();

        DB::table('jadwal_prakteks')->insert([
            [
                'dokter_id' => $dokter1->id,
                'poliklinik_id' => $poliUmum->id,
                'hari' => 'Senin',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '12:00:00',
                'ruangan_praktek' => 'Ruang 101',
                'kuota_pasien' => 20,
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dokter_id' => $dokter2->id,
                'poliklinik_id' => $poliAnak->id,
                'hari' => 'Selasa',
                'jam_mulai' => '09:00:00',
                'jam_selesai' => '13:00:00',
                'ruangan_praktek' => 'Ruang 102',
                'kuota_pasien' => 25,
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dokter_id' => $dokter3->id,
                'poliklinik_id' => $poliGigi->id,
                'hari' => 'Rabu',
                'jam_mulai' => '14:00:00',
                'jam_selesai' => '18:00:00',
                'ruangan_praktek' => 'Ruang 103',
                'kuota_pasien' => 15,
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dokter_id' => $dokter4->id,
                'poliklinik_id' => $poliKandung->id,
                'hari' => 'Kamis',
                'jam_mulai' => '10:00:00',
                'jam_selesai' => '15:00:00',
                'ruangan_praktek' => 'Ruang 104',
                'kuota_pasien' => 18,
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dokter_id' => $dokter5->id,
                'poliklinik_id' => $poliPenyakitDalam->id,
                'hari' => 'Jumat',
                'jam_mulai' => '08:30:00',
                'jam_selesai' => '12:30:00',
                'ruangan_praktek' => 'Ruang 105',
                'kuota_pasien' => 22,
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}