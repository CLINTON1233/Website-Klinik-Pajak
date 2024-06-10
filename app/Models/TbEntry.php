<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbEntry extends Model
{
    use HasFactory;

    protected $table = 'tb_entry';
    protected $fillable = [
        // tambahkan field yang bisa diisi
    ];
}
