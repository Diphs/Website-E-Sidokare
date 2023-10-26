<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormater;
use App\Http\Controllers\Controller;
use App\Models\Akun;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function login(Request $request)
{
    $request->validate(['email' => 'required', 'password' => 'required']);
    $akun = Akun::where('email', $request->email)->where('status_verif', '1')->first();

    if ($akun && Hash::check($request->password, $akun->password)) {
        $status = [
            'status_login' => 1,
            'pesan' => 'Berhasil Login',
            'akun' => $akun
        ];
        return ApiFormater::createApi(200, 'Sukses', $status);
    } else {
        $status = [
            'status_login' => '0',
            'pesan' => 'Gagal',
            'akun' => [
                'nama' => null,
                'id_akun' => null,
                'nik' => null,
                'email' => null,
                'profile_img' => null,
                'nomor_telepon' => null
            ]
        ];
        return ApiFormater::createApi(400, 'Akun Tidak Ditemukan', $status);
    }
}
    public function DetailAkun(Request $request)
    {
        $request->validate(['id_akun' => 'required']);
        $DataUser = Akun::where('id_akun', '=', $request->id_akun)->get();
        return ApiFormater::createApi(200, 'Berhasil Mendapatkan Detail Akun', $DataUser);
    }

    public function checkEmail(
        Request $request
    ) {
        $request->validate(['email' => 'required']);
        $akun = Akun::where('email', '=', $request->email)->exists();
        if ($akun == 1) {
            return ApiFormater::createApi(200, "Berhasil", ['Kode' => "1", "Pesan" => "akun telah ada"]);
        } else {
            return ApiFormater::createApi(400, "Gagal", ['Kode' => "1", "Pesan" => "Tomlol"]);
        }
    }

    public function getOtp(Request $request)
    {
        try {
            $request->validate(['email' => 'required']);
            $dataAccount = Akun::where('email', '=', $request->email)->first();
            if ($dataAccount) {
                $status = [
                    'pesan' => 'Mengambil Kode Otp Berhasil',
                    'kode_otp' => $dataAccount['otp']
                ];
                return ApiFormater::createApi(200, 'Sukses', $status);
            } else {
                $status = [
                    'pesan' => 'Mengambil Kode Otp Gagal',
                ];
                return ApiFormater::createApi(400, 'Gagal', $status);
            }
        } catch (Exception $e) {
        }
    }
    public function verifikasiAccount(Request $request)
    {
        try {

            $request->validate(['email' => 'required',]);
            $dataAccount = Akun::where('email', '=', $request->email);
            $dataAccount->update(['status_verif' => '1']);
            if ($dataAccount) {
                $status = ['pesan' => 'Verifikasi Akun Berhasil', 'kode' => '1'];
                return ApiFormater::createApi(200, 'Sukses', $status);
            } else {
                $status = ['pesan' => 'Akun tidak ditemukan', 'kode' => '0'];
                return ApiFormater::createApi(404, 'Gagal', $status);
            }
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function updatePassword(Request $request)
    {
        try {
            $request->validate(['email' => 'required', 'password' => 'required']);
            $data = Akun::where('email', '=', $request->email);
            $checkAcc = Akun::where('email', '=', $request->email)->exists();

            if ($checkAcc == 1) {
                $hashedPassword = Hash::make($request->password); // Enkripsi password

                $data->update(['password' => $hashedPassword]);

                if ($data) {
                    $status = ['pesan' => 'Ubah Sandi Berhasil', 'kode' => '1'];
                    return ApiFormater::createApi(200, 'Sukses', $status);
                } else {
                    $status = ['pesan' => 'Ubah Sandi Gagal', 'kode' => '0'];
                    return ApiFormater::createApi(404, 'Not Found', $status);
                }
            } else {
                $status = ['pesan' => 'Ubah Sandi Gagal', 'kode' => '0'];
                return ApiFormater::createApi(404, 'Not Found', $status);
            }
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function register(Request $request)
{
    try {
        $request->validate([
            'email' => 'required',
            'username' => 'required',
            'nomor_telepon' => 'required',
            'password' => 'required',
            'role' => 'required',
            'otp' => 'required',
            'nama' => 'required',
            'nik' => 'required'
        ]);
        $checkDataExists = Akun::where('email', '=', $request->email)->exists();

        if (!$checkDataExists) {
            $hashedPassword = Hash::make($request->password); // Enkripsi password

            $akun = Akun::create([
                'email' => $request->email,
                'username' => $request->username,
                'nomor_telepon' => $request->nomor_telepon,
                'password' => $hashedPassword, // Simpan password yang dienkripsi
                'role' => $request->role,
                'otp' => $request->otp,
                'nama' => $request->nama,
                'nik' => $request->nik
            ]);

            $data = Akun::where('id_akun', $akun->id)->get();

            if ($data) {
                return ApiFormater::createApi(200, 'Success', $data);
            } else {
                return ApiFormater::createApi(400, 'Failed', $data);
            }
        } else {
            return ApiFormater::createApi(400, 'Akun Telah Ada', ['pesan', 'akun telah terdaftar']);
        }
    } catch (Exception $e) {
        return ApiFormater::createApi(400, 'Failed', $e);
    }
}

    //
}