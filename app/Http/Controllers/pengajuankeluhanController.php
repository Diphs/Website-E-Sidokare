<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;

class pengajuankeluhanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $keluhan = DB::table('pengajuan_keluhan')
            ->join('akun', 'pengajuan_keluhan.id_akun', '=', 'akun.id_akun')
            ->where('akun.nama', 'LIKE', '%' . $search . '%')
            ->orWhere('pengajuan_keluhan.judul_laporan', 'LIKE', '%' . $search . '%')
            ->get();

        $total_diajukan = DB::table('pengajuan_keluhan')
            ->where('status', 'Diajukan')
            ->count();
        $total_diproses = DB::table('pengajuan_keluhan')
            ->where('status', 'Diproses')
            ->count();
        $total_direview = DB::table('pengajuan_keluhan')
            ->where('status', 'Direview')
            ->count();
        $total_selesai = DB::table('pengajuan_keluhan')
            ->where('status', 'Selesai')
            ->count();
        $total_ditolak = DB::table('pengajuan_keluhan')
            ->where('status', 'Ditolak')
            ->count();

        return view('keluhan.index', compact('keluhan', 'total_diajukan', 'total_diproses', 'total_direview', 'total_selesai', 'total_ditolak'));
    }

    public function edit($id)
    {
        $keluhan = DB::table('pengajuan_keluhan')
            ->join('akun', 'pengajuan_keluhan.id_akun', '=', 'akun.id_akun')
            ->where('pengajuan_keluhan.id_pengajuan_keluhan', $id)
            ->first();

        return view('keluhan.edit', compact('keluhan'));
        // Logika untuk mengedit aspirasi dengan ID tertentu
    }

    public function update(Request $request, $id)
    {
        $status = $request->input('status_keluhan');
        $docFile = $request->file('doc_filekeluhan');

        if ($docFile) {
            $fileName = $id . $docFile->getClientOriginalName();
            $path = $docFile->storeAs('HasilKeluhan', $fileName, 'public');

            $existingFilePath = 'storage/HasilKeluhan/' . $fileName;
            if (Storage::exists($existingFilePath)) {
                Storage::delete($existingFilePath);
                // File berhasil dihapus
            }

            // Path file yang diunggah (dalam folder public)
            $filePath = 'storage/' . $path;
        } else {
            $filePath = "";
            $fileName = "";
        }

        $data = [
            'status' => $status,
            'doc_hasil_keluhan' => $fileName
        ];

        DB::table('pengajuan_keluhan')->where('id_pengajuan_keluhan', $id)->update($data);

        return redirect()->route('keluhan.index')->with('success', 'Data keluhan berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $aspirasi = DB::table('pengajuan_keluhan')->where('id_pengajuan_keluhan', $id)->delete();

        return redirect()->route('keluhan.index')->with('success', 'Keluhan berhasil dihapus.');
        // Logika untuk menghapus aspirasi dengan ID tertentu
    }

    public function keberatan($id)
    {
        $keluhan = DB::table('keberatan_keluhan')
            ->join('akun', 'keberatan_keluhan.id_akun', '=', 'akun.id_akun')
            ->where('id_keluhan', $id)
            ->first();
        $alasan = DB::table('keberatan_keluhan')
            ->join('akun', 'keberatan_keluhan.id_akun', '=', 'akun.id_akun')
            ->where('id_keluhan', $id)
            ->get();

        return view('keluhan.keberatan', compact('keluhan', 'alasan'));
        // Logika untuk menampilkan keberatan dengan ID tertentu
    }
}
