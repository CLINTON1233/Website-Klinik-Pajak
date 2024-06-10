<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbUser extends Model
{
    use HasFactory;

    protected $table = 'tb_users';
    protected $primaryKey = 'id_users'; // Menetapkan primary key ke 'id_users'
    protected $fillable = [
        // tambahkan field yang bisa diisi
    ];
}
