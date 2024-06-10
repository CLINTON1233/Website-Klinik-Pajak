<?php
namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Ramsey\Uuid\Uuid;

class TbAdmin extends Model implements Authenticatable
{
    use HasFactory, AuthenticableTrait;

    protected $table = 'tb_admin';
    protected $primaryKey = 'uid';
    public $timestamps = false;
    public $incrementing = false; 
    protected $keyType = 'string'; 
    
    protected $fillable = [
        'username',
        'password',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Uuid::uuid4();
        });
    }
}

