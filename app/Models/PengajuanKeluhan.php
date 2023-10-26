<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanKeluhan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'pengajuan_keluhan';
    protected $fillable = [
        'id_akun',
        'judul_laporan',
        'isi_laporan',
        'asal_pelapor',
        'lokasi_kejadian',
        'kategori_laporan',
        'tanggal_kejadian',
        'upload_file_pendukung',
        'status',
        'RT',
        'RW'
    ];
}
