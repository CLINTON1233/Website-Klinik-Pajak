<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbKonsultan extends Model
{
    use HasFactory;

    protected $table = 'tb_konsultan';
    protected $primaryKey = 'id_konsultan';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'bio',
        'profil_pic',
        'alumnus',
        'bidang',
        'status',
        'pengalaman',
        'jenjang_karir',
    ];
    
    
    public $timestamps = false;
}
