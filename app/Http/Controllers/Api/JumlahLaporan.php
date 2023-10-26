<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Helpers\ApiFormater;
use Exception;
use App\Http\Controllers\Controller;
use App\Models\PengajuanAspirasi;
use App\Models\PengajuanKeluhan;
use App\Models\PengajuanPPIDModel;

class JumlahLaporan extends Controller
{
    public function CountTable()
    {
        $JumlahAspirasi = PengajuanAspirasi::count();
        $jumlahKeluhan = PengajuanKeluhan::count();
        $jumlahPPID = PengajuanPPIDModel::count();
        $totalSemuaLaporan = $JumlahAspirasi + $jumlahKeluhan + $jumlahPPID;

        $data = [
            'JumlahAspirasi' => $JumlahAspirasi,
            'JumlahKeluhan' => $jumlahKeluhan,
            'JumlahPPID' => $jumlahPPID,
            'TotalLaporan' => $totalSemuaLaporan
        ];
        return ApiFormater::createApi(200, 'Data Berhasil Di get', $data);
    }
}
