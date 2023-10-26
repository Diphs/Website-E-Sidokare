<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeberatanKeluhan extends Model
{
    use HasFactory;
    protected $table = 'keberatan_keluhan';

    protected $fillable = ['id_akun', 'alamat', 'alasan', 'catatan_tambahan', 'id_keluhan'];
}
