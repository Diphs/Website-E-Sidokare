<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeberatanAsp extends Model
{
    use HasFactory;
    protected $table = 'keberatan_aspirasi';

    protected $fillable = ['id_akun', 'alamat', 'alasan', 'catatan_tambahan', 'id_aspirasi'];
}
