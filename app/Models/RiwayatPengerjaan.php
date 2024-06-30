<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPengerjaan extends Model
{
    protected $table = 'riwayat_pengerjaan';

    protected $fillable = [
        'nama',
        'email',
        'skor_akhir',
        'tanggal',
    ];
    public $timestamps = false;
}
