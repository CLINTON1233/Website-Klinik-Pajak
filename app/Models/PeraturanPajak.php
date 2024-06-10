<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeraturanPajak extends Model
{
    use HasFactory;

    protected $table = 'peraturan_pajak';
    protected $fillable = [
        // tambahkan field yang bisa diisi
    ];
    public $timestamps = false;
}
