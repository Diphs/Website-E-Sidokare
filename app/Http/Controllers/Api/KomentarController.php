<?php

namespace App\Http\Controllers\api;

use App\Helpers\ApiFormater;
use App\Http\Controllers\Controller;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KomentarController extends Controller
{

    public function getListKomentarById(Request $request)
    {
        // $data = $request->validate(['id_berita' => 'required']);
        //rubah id_berita => id
        $request->validate(['id' => 'required']);
        // $dataKomentar = Komentar::all()->where('id_berita', '=', $data['id_berita'])->values();
        $berita = DB::table('komentar_berita')->join('akun', 'komentar_berita.id_akun', '=', 'akun.id_akun')->select('komentar_berita.*', 'akun.nama', 'akun.profile_img')->where('komentar_berita.id', '=', $request->id)->get()->values();
        return ApiFormater::createApi(200, "sukses", $berita);
    }
    public function buatKomentarById(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'id_akun' => 'required',
            'isi_komentar' => 'required',
            'waktu_berkomentar' => 'required'
        ]);
        $komentar = Komentar::create([
            'id_akun' => $request->id_akun,
            'id' => $request->id,
            'isi_komentar' => $request->isi_komentar,
            'waktu_berkomentar' => $request->waktu_berkomentar
        ]);
        return ApiFormater::createApi(200, "Succes", $komentar);
    }
    public function hapusKomentarById(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'id_akun' => 'required',
            'waktu_berkomentar' => 'required',
            'id_komentar' => 'required',
        ]);

        $idBerita = $request->input('id');
        $idAkun = $request->input('id_akun');
        $waktuBerkomentar = $request->input('waktu_berkomentar');
        $idKomentar = $request->input('id_komentar');

        $komentar = Komentar::where('id', $idBerita)
            ->where('id_akun', $idAkun)
            ->where('waktu_berkomentar', $waktuBerkomentar)
            ->where('id_komentar', $idKomentar)
            ->delete();
        // Jika komentar berhasil dihapus
        if ($komentar) {
            return response()->json([
                'status' => 'success',
                'message' => 'Komentar berhasil dihapus.'
            ]);
        }

        // Jika komentar tidak ditemukan atau gagal dihapus
        return response()->json([
            'status' => 'error',
            'message' => 'Gagal menghapus komentar.'
        ]);
    }

    public function updateIsiKomentar(Request $request)
    {
        $request->validate([
            'id_komentar' => 'required',
            'isi_komentar' => 'required'
        ]);

        $data = Komentar::where('id_komentar', '=', $request->id_komentar);
        $checkAcc = Komentar::where('id_komentar', '=', $request->id_komentar)->exists();

        // echo $checkAcc . ":" . $request->email;
        if ($checkAcc == 1) {
            $data->update(['isi_komentar' => $request->isi_komentar]);
            if ($data) {
                $status = ['pesan' => 'Ubah Komentar Berhasil', 'kode' => '1'];
                return ApiFormater::createApi(200, 'Sukses', $status);
            } else {
                $status = ['pesan' => 'Ubah Komentar Gagal', 'kode' => '0'];
                return ApiFormater::createApi(404, 'Not Found', $status);
            }
        } else {
            $status = ['pesan' => 'Ubah Komentar Gagal', 'kode' => '0'];
            return ApiFormater::createApi(404, 'Not Found', $status);
        }
    }
}
