<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbChat extends Model
{
    use HasFactory;

    protected $table = 'tb_chat';
    protected $fillable = [
        // tambahkan field yang bisa diisi
    ];
}
