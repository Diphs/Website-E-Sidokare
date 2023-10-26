<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    protected $fillable = [
        'id_berita', 
        'judul_berita', 'id_akun', 'tanggal_publikasi', 'id_kategori',
        'isi_berita', 'foto', 'unggah_file_lain','user_id'
    ];
    public static function search($query)
    {
        return self::where('judul_berita', 'like', '%' . $query . '%')
            ->orWhere('tanggal_publikasi', 'like', '%' . $query . '%')
            ->orWhere('id_kategori', 'like', '%' . $query . '%')
            ->orWhere('isi_berita', 'like', '%' . $query . '%')
            ->get();
    }
    
}
