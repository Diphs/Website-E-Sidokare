<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormater;
use App\Http\Controllers\Controller;
use App\Models\berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{
    public function getBeritaTerkini()
    {
        $berita = berita::all();
        return ApiFormater::createApi(200, 'Berhasil', $berita);
    }
    public function getBeritaSpesific(Request $request)
    {
        //Merubah ganti Table User
        $request->validate((['id_kategori' => 'required']));
        $berita = DB::table('berita')
            ->join('users', 'berita.user_id', '=', 'users.id')
            ->join('kategori_berita', 'kategori_berita.id_kategori', '=', 'berita.id_kategori')
            ->select('berita.id_berita', 'kategori_berita.nama_kategori', 'users.id', 'users.name', 'berita.tanggal_publikasi', 'berita.id_kategori', 'berita.judul_berita', 'berita.isi_berita', 'berita.foto', 'berita.unggah_file_lain')->where('berita.id_kategori', '=', $request->id_kategori)->get()->values();
        return ApiFormater::createApi(200, 'Berhasil', $berita);
    }
    //Merubah ganti Table User 2
    public function getBeritaModif2()
    {
        $start_date = date('Y-m-d', strtotime('-7 days')); // tanggal 3 hari sebelumnya dari hari ini
        $end_date = date('Y-m-d'); // hari ini
        $results = DB::table('berita')
            ->join('users', 'berita.user_id', '=', 'users.id')->join('kategori_berita', 'kategori_berita.id_kategori', '=', 'berita.id_kategori')
            ->select('berita.id_berita', 'kategori_berita.nama_kategori', 'users.id', 'users.name',  'berita.tanggal_publikasi', 'berita.id_kategori', 'berita.judul_berita', 'berita.isi_berita', 'berita.foto', 'berita.unggah_file_lain')
            ->whereDate('berita.tanggal_publikasi', '=', $end_date)->orWhereBetween('berita.tanggal_publikasi', [$start_date, $end_date])->get();
        return ApiFormater::createApi(200, 'Berhasil', $results);
    }
    //Merubah ganti Table User 2
    public function getBeritaModif3()
    {

        $results = DB::table('berita')
            ->join('users', 'berita.user_id', '=', 'users.id')->join('kategori_berita', 'kategori_berita.id_kategori', '=', 'berita.id_kategori')
            ->select('berita.id_berita', 'kategori_berita.nama_kategori', 'users.id', 'users.name', 'berita.tanggal_publikasi', 'berita.id_kategori', 'berita.judul_berita', 'berita.isi_berita', 'berita.foto', 'berita.unggah_file_lain')->get();
        return ApiFormater::createApi(200, 'Berhasil', $results);
    }
}
