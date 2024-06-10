<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoalPajak extends Model
{
    use HasFactory;

    protected $table = 'soal_pajak';

    protected $fillable = [
        'id_kuis',
        'soal',
        'skor',
        'tipe_soal',
        'pilihan_a',
        'pilihan_b',
        'pilihan_c',
        'pilihan_d',
        'pilihan_e',
        'jawaban'
    ];

    public function kuis()
    {
        return $this->belongsTo(QuizPajak::class, 'id_kuis');
    }
    public $timestamps = false;
}
