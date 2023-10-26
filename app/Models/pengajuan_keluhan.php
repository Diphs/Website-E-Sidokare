<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajuan_keluhan extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_keluhan'; 
    protected $fillable = [
        // Daftar kolom yang diizinkan untuk mass assignment
        'status',
        'doc_hasil_keluhan',
        '_token',
    ];
}
