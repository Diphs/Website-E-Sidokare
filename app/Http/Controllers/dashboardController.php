<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class dashboardController extends Controller
{
        public function index()
        {
            $total_keluhan = DB::table('pengajuan_keluhan')->count('id_pengajuan_keluhan');
            $total_ppid = DB::table('pengajuan_ppids')->count('id'); 
            $total_aspirasi = DB::table('pengajuan_aspirasi')->count('id_pengajuan_aspirasi');
            $total_akun = DB::table('akun')->count('id_akun');
            $data = DB::table('pengajuan_keluhan')
            ->select(DB::raw("MONTHNAME(`tanggal_kejadian`) AS bulan"), DB::raw('COUNT(`id_pengajuan_keluhan`) AS amount'))
            ->groupBy(DB::raw('MONTH(`tanggal_kejadian`)'))
            ->get();


            return view('dashboard.index', ['total_keluhan' => $total_keluhan, 'total_ppid' => $total_ppid, 
            'total_aspirasi' => $total_aspirasi, 'total_akun' => $total_akun, 'data' => $data]);
        }
        
        public function controll()
        {
            return view('profile.formpengajuan');
        }
        
    
}
