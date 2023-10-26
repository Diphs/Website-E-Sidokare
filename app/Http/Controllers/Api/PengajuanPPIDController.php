<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormater;
use App\Http\Controllers\Controller;
use App\Models\PengajuanKeluhan;
use App\Models\PengajuanPPIDModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PengajuanPPIDController extends Controller
{
    //menambahkan tujuan 
    public function create_pengajuan(Request $request)
    {
        $request->validate(
            [
                'id_akun' => 'required',
                'nama_pelapor' => 'required',
                'no_telfon' => 'required',
                'email' => 'required',
                'judul_laporan' => 'required',
                'isi_laporan' => 'required',
                'Alamat' => 'required',
                'tujuan' => 'required',
                'kategori_ppid' => 'required',
                'upload_file_pendukung' => 'required',
                'RT' => 'required',
                'RW' => 'required'
            ]
        );
        $PengajuanPPID = PengajuanPPIDModel::create(
            [
                'id_akun' => $request->id_akun,
                'judul_laporan' => $request->judul_laporan,
                'nama_pelapor' => $request->nama_pelapor,
                'no_telfon' => $request->no_telfon,
                'email' => $request->email,
                'isi_laporan' => $request->isi_laporan,
                'Alamat' => $request->Alamat,
                'tujuan' => $request->tujuan,
                'kategori_ppid' => $request->kategori_ppid,
                'upload_file_pendukung' => $request->upload_file_pendukung,
                'status' => 'Diajukan',
                'RT' => $request->RT,
                'RW' => $request->RW
            ]
        );
        return ApiFormater::createApi(200, 'Succes', ['kode' => '1', 'data' => $PengajuanPPID]);
    }

    public function AccPPID(Request $request)
    {
        $request->validate(['id' => 'required']);
        $updateStatus = PengajuanPPIDModel::where('id', '=', $request->id);
        $updateStatus->update(['status' => 'Diterima']);

        return ApiFormater::createApi(200, 'succes', 'Berhasil Update');
    }

    public function upload_file_ppid(Request $request)
    {
        if ($request->hasFile('file')) {
            $path = $request->file('file');
            $newName = $path->getClientOriginalName();
            $pathAkhir = $path->storeAs('public/ppid', $newName);
            return ApiFormater::createApi(200, 'Succes', ['kode' => '1', 'data' => $pathAkhir]);
        } else {
            return ApiFormater::createApi(400, 'Succes', ['kode' => '69', 'data' => 'eror']);
        }
    }


    public function get_pengajuan()
    {
        $list_ppid = PengajuanPPIDModel::all();
        return ApiFormater::createApi(200, 'Berhasil', $list_ppid);
    }
    public function get_pengajuan_by_id(Request $request)
    {
        $request->validate(['id_akun' => 'required']);
        $PPIDdata = PengajuanPPIDModel::all()->where('id_akun', '=', $request->id_akun)->sortByDesc('id')->values();
        return ApiFormater::createApi(200, 'Berhasil', $PPIDdata);
    }

    public function DeletePPID(Request $request)
    {
        $request->validate(['id_pengajuan_ppid' => 'required', 'upload_file_pendukung' => 'required']);
        if ($request->upload_file_pendukung == null || $request->upload_file_pendukung == "") {
            //hapus data
            DB::table('pengajuan_ppid')->where('id_pengajuan_ppid', '=', $request->id_pengajuan_ppid)->delete();
        } else {
            //hapus file
            $pathDeleteGambar = $request->upload_file_pendukung;
            Storage::delete('public/ppid/' . $pathDeleteGambar);
            //hapus Data
            DB::table('pengajuan_ppid')->where('id_pengajuan_ppid', '=', $request->id_pengajuan_ppid)->delete();
        }
    }
}
