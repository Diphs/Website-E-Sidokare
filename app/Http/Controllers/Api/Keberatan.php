<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormater;
use App\Http\Controllers\Controller;
use App\Models\KeberatanAsp;
use App\Models\Keberatan_PPID;
use App\Models\KeberatanKeluhan;
use App\Models\PengajuanAspirasi;
use App\Models\PengajuanKeluhan;
use App\Models\PengajuanPPIDModel;
use Illuminate\Http\Request;
use Exception;

class Keberatan extends Controller
{

    public function BuatKeberatanKeluhan(Request $request)
    {
        try {
            $request->validate([
                'id_akun' => "required",
                "alamat" => "required",
                "alasan" => "required",
                "catatan_tambahan" => "required",
                "id_keluhan" => "required"
            ]);
            $pengajuanBeratKeluhan = KeberatanKeluhan::create([
                "id_akun" => $request->id_akun,
                "alamat" => $request->alamat,
                "alasan" => $request->alasan,
                "catatan_tambahan" => $request->catatan_tambahan,
                "id_keluhan" => $request->id_keluhan,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $updateStatus = PengajuanKeluhan::where('id_pengajuan_keluhan', '=', $request->id_keluhan);
            $updateStatus->update(['status' => 'Revisi']);

            return ApiFormater::createApi('200', 'succes', [
                'kode' => '404', 'data' => $pengajuanBeratKeluhan
            ]);
        } catch (Exception $e) {
            return ApiFormater::createApi('201', 'gagal', [
                'kode' => '404', 'data' => $e->getMessage()
            ]);
        }
    }
    public function BuatKeberatanPPID(Request $request)
    {
        //rubah id_ppid => id
        try {
            $request->validate([
                'id_akun' => "required",
                "alamat" => "required",
                "alasan" => "required",
                "catatan_tambahan" => "required",
                "id" => "required"
            ]);
            $pengajuanKeberanPPID = Keberatan_PPID::create([
                "id_akun" => $request->id_akun,
                "alamat" => $request->alamat,
                "alasan" => $request->alasan,
                "catatan_tambahan" => $request->catatan_tambahan,
                "id" => $request->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $updateStatus = PengajuanPPIDModel::where('id', '=', $request->id);
            $updateStatus->update(['status' => 'Revisi']);

            return ApiFormater::createApi('200', 'succes', [
                'kode' => '404', 'data' => $pengajuanKeberanPPID
            ]);
        } catch (Exception $e) {
            return ApiFormater::createApi('201', 'gagal', [
                'kode' => '404', 'data' => $e->getMessage()
            ]);
        }
    }
    public function BuatKeberatanAspirasi(Request $request)
    {
        try {
            $request->validate([
                'id_akun' => "required",
                "alamat" => "required",
                "alasan" => "required",
                "catatan_tambahan" => "required",
                "id_aspirasi" => "required"
            ]);
            $pengajuanKeberatanAspirasi = KeberatanAsp::create([
                "id_akun" => $request->id_akun,
                "alamat" => $request->alamat,
                "alasan" => $request->alasan,
                "catatan_tambahan" => $request->catatan_tambahan,
                "id_aspirasi" => $request->id_aspirasi,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $updateStatus = PengajuanAspirasi::where('id_pengajuan_aspirasi', '=', $request->id_aspirasi);
            $updateStatus->update(['status' => 'Revisi']);

            return ApiFormater::createApi('200', 'succes', [
                'kode' => '404', 'data' => $pengajuanKeberatanAspirasi
            ]);
        } catch (Exception $e) {
            return ApiFormater::createApi('201', 'gagal', [
                'kode' => '404', 'data' => $e->getMessage()
            ]);
        }
    }
    public function CountKeberatanPPID(Request $request)
    {
        //rubah where
        $jumlahKeberatanPPID = Keberatan_PPID::where('id_akun', '=', $request->id_akun)->where('id', '=', $request->id)->count();
        if ($jumlahKeberatanPPID) {
            return ApiFormater::createApi(200, 'Data Berhasil ', $jumlahKeberatanPPID);
        } else {
            return ApiFormater::createApi(202, 'gagal', "Kosong");
        }
    }

    public function CountKeberatanAspirasi(Request $request)
    {

        $jumlahKeberatanAspirasi = KeberatanAsp::where('id_akun', '=', $request->id_akun)->where('id_aspirasi', '=', $request->id_aspirasi)->count();
        if ($jumlahKeberatanAspirasi) {
            return ApiFormater::createApi(200, 'Data Berhasil ', $jumlahKeberatanAspirasi);
        } else {
            return ApiFormater::createApi(202, 'gagal', "Kosong");
        }
    }

    public function CountKeberatanKeluhan(Request $request)
    {

        $jumlahKeberatanKeluhan = KeberatanKeluhan::where('id_akun', '=', $request->id_akun)->where('id_keluhan', '=', $request->id_keluhan)->count();
        if ($jumlahKeberatanKeluhan) {
            return ApiFormater::createApi(200, 'Data Berhasil ', $jumlahKeberatanKeluhan);
        } else {
            return ApiFormater::createApi(202, 'gagal', "Kosong");
        }
    }
}
