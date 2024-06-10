<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin'; // sesuaikan dengan nama tabel di database

    protected $fillable = [
        'LOGIN',
        'NAME',
        'PASSWORD',
        'ENABLE',
    ];
}
