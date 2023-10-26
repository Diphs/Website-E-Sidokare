<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Helpers\ApiFormater;
use App\Http\Controllers\Controller;
use App\Models\Akun;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function DeleteUpdateFile(Request $request)
    {
        //hapus File
        $request->validate(['profile_img' => 'required', 'nama' => 'required', 'nomor_telepon' => 'required', 'id_akun' => 'required']);
        $pathDeleteImage = $request->profile_img;
        Storage::delete('public/profile/' . $pathDeleteImage);

        //upload Foto
        if ($request->hasFile('file')) {
            $pathFileBaru = $request->file('file');
            $FileBaruNama = $pathFileBaru->getClientOriginalName();

            //update Akun
            $dataUpdate = Akun::where('id_akun', $request->id_akun)->update(['nama' => $request->nama, 'nomor_telepon' => $request->nomor_telepon, 'profile_img' => $FileBaruNama]);
            $pathAkhir = $pathFileBaru->storeAs('public/profile', $FileBaruNama);
            return ApiFormater::createApi(200, "Succes", ['foto_dihapus' => $pathDeleteImage, 'Upload_done' => $pathAkhir, 'dataUpdate' => $dataUpdate]);
        } else {
            return ApiFormater::createApi(400, "Gagal", "Gagal");
        }
    }

    public function UpdateDataSaja(Request $request)
    {
        $request->validate(['nama' => 'required', 'nomor_telepon' => 'required', 'id_akun' => 'required']);
        $dataUpdate = Akun::where('id_akun', $request->id_akun)->update(['nama' => $request->nama, 'nomor_telepon' => $request->nomor_telepon]);
        if ($dataUpdate) {
            $status = ['pesan' => 'Ubah Sandi Berhasil', 'kode' => '1'];
            return ApiFormater::createApi(200, 'Sukses', $status);
        } else {
            $status = ['pesan' => 'Gagal', 'kode' => '404'];
            return ApiFormater::createApi(404, 'Gagal', $status);
        }
    }
}
