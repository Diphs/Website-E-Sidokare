<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanPPIDModel extends Model
{
    use HasFactory;
    public $timestamps = false;


    protected $table = 'pengajuan_ppids';
    protected $fillable = [
        'id_akun',
        'nama_pelapor',
        'no_telfon',
        'email',
        'judul_laporan',
        'isi_laporan',
        'tujuan',
        'Alamat',
        'kategori_ppid',
        'upload_file_pendukung',
        'status',
        'RT',
        'RW'
    ];
}
