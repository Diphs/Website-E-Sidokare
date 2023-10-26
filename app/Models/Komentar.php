<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "komentar_berita";
    //rubah id_berita to id
    protected $fillable = [
        'id_komentar',
        'id_akun',
        'id',
        'isi_komentar',
        'waktu_berkomentar'
    ];
}
