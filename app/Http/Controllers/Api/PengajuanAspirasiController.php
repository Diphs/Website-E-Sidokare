<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormater;
use App\Http\Controllers\Controller;
use App\Models\PengajuanAspirasi;
use Illuminate\Http\Request;
use Exception;

class PengajuanAspirasiController extends Controller
{
    public function buat_aspirasi(Request $request)
    {
        try {
            $request->validate([
                "id_akun" => "required",
                "judul_aspirasi" => "required",
                "isi_aspirasi" => "required"

            ]);
            $pengajuanApirasi = PengajuanAspirasi::create([
                'id_akun' => $request->id_akun,
                'judul_aspirasi' => $request->judul_aspirasi,
                'isi_aspirasi' => $request->isi_aspirasi,
                'upload_file_pendukung' => $request->upload_file_pendukung,
                'status' => 'Diajukan'
            ]);
            return ApiFormater::createApi(200, 'Succeas', [
                'kode' => '1',
                'data' => $pengajuanApirasi
            ]);
        } catch (Exception $e) {
            return ApiFormater::createApi(200, 'Succeas', [
                'kode' => '1',
                'data' => $e->getMessage()
            ]);
        }
    }
    public function upload_file_aspirasi(Request $request)
    {
        if ($request->hasFile('file')) {
            $path = $request->file('file');
            $newName = $path->getClientOriginalName();
            $pathAkhir = $path->storeAs('public/aspirasi', $newName);
            return ApiFormater::createApi(200, 'Succes', ['kode' => '1', 'data' => $pathAkhir]);
        } else {
            return ApiFormater::createApi(400, 'Succes', ['kode' => '69', 'data' => 'eror']);
        }
    }
    public function accAspirasi(Request $request)
    {
        $request->validate(['id_pengajuan_aspirasi' => 'required']);
        $updateStatus = PengajuanAspirasi::where('id_pengajuan_aspirasi', '=', $request->id_pengajuan_aspirasi);
        $updateStatus->update(['status' => 'Diterima']);

        return ApiFormater::createApi(200, 'succes', 'Berhasil Update');
    }
    public function get_aspirasi()
    {
        $list_ppid = PengajuanAspirasi::all();
        return ApiFormater::createApi(200, 'Berhasil', $list_ppid);
    }
    public function get_aspirasi_by_id(Request $request)
    {
        $request->validate(['id_akun' => 'required']);

        $list_ppid_by_id = PengajuanAspirasi::all()->where('id_akun', '=', $request->id_akun)->sortByDesc('id')->values();
        return ApiFormater::createApi(200, 'Berhasil', $list_ppid_by_id);
    }
}
