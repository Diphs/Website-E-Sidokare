<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;

class pengajuanppidController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $ppid = DB::table('pengajuan_ppids')
            ->join('akun', 'pengajuan_ppids.id_akun', '=', 'akun.id_akun')
            ->where('akun.nama', 'LIKE', '%' . $search . '%')
            ->orWhere('pengajuan_ppids.judul_laporan', 'LIKE', '%' . $search . '%')
            ->get();

        $total_diajukan = DB::table('pengajuan_ppids')
            ->where('status', 'Diajukan')
            ->count();
        $total_diproses = DB::table('pengajuan_ppids')
            ->where('status', 'Diproses')
            ->count();
        $total_direview = DB::table('pengajuan_ppids')
            ->where('status', 'Direview')
            ->count();
        $total_selesai = DB::table('pengajuan_ppids')
            ->where('status', 'Selesai')
            ->count();
        $total_ditolak = DB::table('pengajuan_ppids')
            ->where('status', 'Ditolak')
            ->count();

        return view('ppid.index', compact('ppid', 'total_diajukan', 'total_diproses', 'total_direview', 'total_selesai', 'total_ditolak'));
    }

    public function edit($id)
    {
        $ppid = DB::table('pengajuan_ppids')
            ->join('akun', 'pengajuan_ppids.id_akun', '=', 'akun.id_akun')
            ->where('id', $id)
            ->first();

        return view('ppid.edit', compact('ppid'));
        // Logika untuk mengedit aspirasi dengan ID tertentu
    }

    public function update(Request $request, $id)
    {
        $statusppid = $request->input('statusppid');
        $docppid = $request->file('doc_fileppid');

        if ($docppid) {
            $fileppid = $id . '_' . $docppid->getClientOriginalName();
            $path = $docppid->storeAs('Hasilppids', $fileppid, 'public');

            $existingFilePath = 'storage/Hasilppids/' . $fileppid;
            if (Storage::exists($existingFilePath)) {
                Storage::delete($existingFilePath);
                // File berhasil dihapus
            }

            // Path file yang diunggah (dalam folder public)
            // $fileppid = 'storage/' . $path;
        } else {
            $fileppid = "";
        }

        $data = [
            'status' => $statusppid,
            'doc_hasil_ppid' => $fileppid
        ];

        DB::table('pengajuan_ppids')->where('id', $id)->update($data);

        return redirect()->route('ppid.index')->with('success', 'Data PPID berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $ppid = DB::table('pengajuan_ppids')->where('id', $id)->delete();

        return redirect()->route('ppid.index')->with('success', 'PPID berhasil dihapus.');
        // Logika untuk menghapus aspirasi dengan ID tertentu
    }

    public function keberatan($id)
    {
        $ppid = DB::table('keberatan_ppid')
            ->join('akun', 'keberatan_ppid.id_akun', '=', 'akun.id_akun')
            ->where('id', $id)
            ->first();
        $alasan = DB::table('keberatan_ppid')
            ->join('akun', 'keberatan_ppid.id_akun', '=', 'akun.id_akun')
            ->where('id', $id)
            ->get();

        return view('ppid.keberatan', compact('ppid', 'alasan'));
        // Logika untuk menampilkan keberatan dengan ID tertentu
    }
}
