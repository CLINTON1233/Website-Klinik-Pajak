<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizPajak extends Model
{
    use HasFactory;

    protected $table = 'quiz_pajak';
    protected $fillable = ['no_kuis', 'judul_kuis', 'waktu', 'jumlah_soal'];
    public $timestamps = false;
}
