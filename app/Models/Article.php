<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'isi',
        'kategori',
        'tanggal_upload',
        'cover',
    ];
    public $timestamps = false;
    // Jika diperlukan, Anda juga dapat menambahkan relasi dengan model lain di sini.
}
