<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultan extends Model
{
    use HasFactory;

    protected $table = 'tb_konsultan';
    protected $fillable = ['nama', 'bidang', 'pengalaman', 'profil_pic'];
}
