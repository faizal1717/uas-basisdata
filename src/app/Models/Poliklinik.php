<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Poliklinik extends Model
{
    use HasFactory;

    protected $table = 'polikliniks';

    protected $fillable = [
        'rumah_sakit_id',
        'nama_poli',
        'deskripsi',
        'kode_poli',
        'lokasi',
        'jam_buka',
        'jam_tutup',
        'status',
        'upload_gambar',
    ];

    // 🔗 RELASI
    public function rumahSakit()
    {
        return $this->belongsTo(RumahSakit::class);
    }
}
