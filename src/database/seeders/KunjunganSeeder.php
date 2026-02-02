<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Pasien;
use App\Models\JadwalPraktek;

class KunjunganSeeder extends Seeder
{
    public function run(): void
    {
        $pasien1 = Pasien::first();
        $pasien2 = Pasien::skip(1)->first();
        $pasien3 = Pasien::skip(2)->first();
        $pasien4 = Pasien::skip(3)->first();
        $pasien5 = Pasien::skip(4)->first();

        $jadwal1 = JadwalPraktek::first();
        $jadwal2 = JadwalPraktek::skip(1)->first();
        $jadwal3 = JadwalPraktek::skip(2)->first();
        $jadwal4 = JadwalPraktek::skip(3)->first();
        $jadwal5 = JadwalPraktek::skip(4)->first();

        DB::table('kunjungans')->insert([
            [
                'pasien_id' => $pasien1->id,
                'jadwal_praktek_id' => $jadwal1->id,
                'tanggal_kunjungan' => now()->toDateString(),
                'keluhan' => 'Demam dan batuk',
                'diagnosa' => null,
                'status_kunjungan' => 'menunggu',
                'nomor_antrian' => 1,
                'jam_datang' => null,
                'jam_selesai' => null,
                'catatan_tambahan' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pasien_id' => $pasien2->id,
                'jadwal_praktek_id' => $jadwal2->id,
                'tanggal_kunjungan' => now()->subDays(1)->toDateString(),
                'keluhan' => 'Sakit kepala dan mual',
                'diagnosa' => null,
                'status_kunjungan' => 'menunggu',
                'nomor_antrian' => 2,
                'jam_datang' => null,
                'jam_selesai' => null,
                'catatan_tambahan' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pasien_id' => $pasien3->id,
                'jadwal_praktek_id' => $jadwal3->id,
                'tanggal_kunjungan' => now()->subDays(2)->toDateString(),
                'keluhan' => 'Nyeri gigi berlubang',
                'diagnosa' => null,
                'status_kunjungan' => 'menunggu',
                'nomor_antrian' => 3,
                'jam_datang' => null,
                'jam_selesai' => null,
                'catatan_tambahan' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pasien_id' => $pasien4->id,
                'jadwal_praktek_id' => $jadwal4->id,
                'tanggal_kunjungan' => now()->subDays(3)->toDateString(),
                'keluhan' => 'Kontrol kehamilan',
                'diagnosa' => null,
                'status_kunjungan' => 'menunggu',
                'nomor_antrian' => 4,
                'jam_datang' => null,
                'jam_selesai' => null,
                'catatan_tambahan' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pasien_id' => $pasien5->id,
                'jadwal_praktek_id' => $jadwal5->id,
                'tanggal_kunjungan' => now()->subDays(4)->toDateString(),
                'keluhan' => 'Sesak napas ringan',
                'diagnosa' => null,
                'status_kunjungan' => 'menunggu',
                'nomor_antrian' => 5,
                'jam_datang' => null,
                'jam_selesai' => null,
                'catatan_tambahan' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}