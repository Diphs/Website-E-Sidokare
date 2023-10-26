<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanAspirasi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'pengajuan_aspirasi';
    protected $fillable = [
        'id_akun',
        'status',
        'judul_aspirasi',
        'isi_aspirasi',
        'upload_file_pendukung',
        'doc_hasil_ppid'
    ];
}
