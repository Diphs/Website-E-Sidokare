<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;

class aspirasiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $aspirasi = DB::table('pengajuan_aspirasi')
            ->join('akun', 'pengajuan_aspirasi.id_akun', '=', 'akun.id_akun')
            ->where('akun.nama', 'LIKE', '%' . $search . '%')
            ->orWhere('pengajuan_aspirasi.judul_aspirasi', 'LIKE', '%' . $search . '%')
            ->get();

        $total_diajukan = DB::table('pengajuan_aspirasi')
            ->where('status', 'Diajukan')
            ->count();
        $total_diproses = DB::table('pengajuan_aspirasi')
            ->where('status', 'Diproses')
            ->count();
        $total_direview = DB::table('pengajuan_aspirasi')
            ->where('status', 'Direview')
            ->count();
        $total_selesai = DB::table('pengajuan_aspirasi')
            ->where('status', 'Selesai')
            ->count();
        $total_ditolak = DB::table('pengajuan_aspirasi')
            ->where('status', 'Ditolak')
            ->count();

        return view('aspirasi.index', compact('aspirasi', 'total_diajukan', 'total_diproses', 'total_direview', 'total_selesai', 'total_ditolak'));
    }

    public function edit($id)
    {
        $aspirasi = DB::table('pengajuan_aspirasi')
            ->join('akun', 'pengajuan_aspirasi.id_akun', '=', 'akun.id_akun')
            ->where('id_pengajuan_aspirasi', $id)
            ->first();

        return view('aspirasi.edit', compact('aspirasi'));
        // Logika untuk mengedit aspirasi dengan ID tertentu
    }

    public function update(Request $request, $id)
    {
        $status = $request->input('status_aspirasi');
        $docFile = $request->file('doc_file');

        if ($docFile) {
            $fileName = $id . $docFile->getClientOriginalName();
            $path = $docFile->storeAs('HasilAspirasi', $fileName, 'public');

            $existingFilePath = 'storage/HasilAspirasi/' . $fileName;
            if (Storage::exists($existingFilePath)) {
                Storage::delete($existingFilePath);
                // File berhasil dihapus
            }

            // Path file yang diunggah (dalam folder public)
            $filePath = 'storage/' . $path;
        } else {
            // $filePath = "";
            $fileName = "";
        }

        $data = [
            'status' => $status,
            'doc_hasil_ppid' => $fileName
        ];

        DB::table('pengajuan_aspirasi')->where('id_pengajuan_aspirasi', $id)->update($data);

        return redirect()->route('aspirasi.index')->with('success', 'Data aspirasi berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $aspirasi = DB::table('pengajuan_aspirasi')->where('id_pengajuan_aspirasi', $id)->delete();

        return redirect()->route('aspirasi.index')->with('success', 'Aspirasi berhasil dihapus.');
        // Logika untuk menghapus aspirasi dengan ID tertentu
    }

    public function keberatan($id)
    {
        $aspirasi = DB::table('keberatan_aspirasi')
            ->join('akun', 'keberatan_aspirasi.id_akun', '=', 'akun.id_akun')
            ->where('id_aspirasi', $id)
            ->first();
        $alasan = DB::table('keberatan_aspirasi')
            ->join('akun', 'keberatan_aspirasi.id_akun', '=', 'akun.id_akun')
            ->where('id_aspirasi', $id)
            ->get();

        return view('aspirasi.keberatan', compact('aspirasi', 'alasan'));
        // Logika untuk menampilkan keberatan dengan ID tertentu
    }
}
