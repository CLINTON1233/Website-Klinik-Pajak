<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbAppoinment extends Model
{
    use HasFactory;

    protected $table = 'tb_appoinment';
    protected $fillable = [
        // tambahkan field yang bisa diisi
    ];
}
