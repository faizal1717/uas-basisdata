<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RumahSakit extends Model
{
    protected $table = 'rumah_sakits';

    protected $fillable = [
        'upload_gambar',
        'kode_rs',
        'nama_rs',
        'alamat',
        'kota',
        'provinsi',
        'telepon',
        'email',
        'status',
        'tipe_rs',
    ];
}
