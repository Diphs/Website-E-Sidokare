<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;

class AkunsController extends Controller
{

    public function index(Request $request)
    {
        $query = $request->input('query');
        $akun = Akun::search($query);

        // Mengatur jumlah item yang ditampilkan per halaman
        $perPage = 1000;

        // Mendapatkan nomor halaman dari query string jika ada, atau default ke 1
        $currentPage = Paginator::resolveCurrentPage('page');

        // Membuat instance Paginator untuk koleksi berita
        $pagination = new Paginator($akun->slice(($currentPage - 1) * $perPage, $perPage), $akun->count());
        $pagination->withPath(route('akun.index'));

        return view('akun.index', [
            'akun' => $pagination,
            'query' => $query,
        ]);
    }

    public function create()
    {
        return view('akun.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
            'nama' => 'required',
            'nik' => 'required',
            'nomor_telepon' => 'required'
        ]);
        $hashedPassword = Hash::make($request->password);
        $akun = new Akun();
        $akun->email = $request->email;
        $akun->password = $hashedPassword;
        $akun->role = $request->role;
        $akun->nama = $request->nama;
        $akun->nik = $request->nik;
        $akun->nomor_telepon = $request->nomor_telepon;
        $akun->status_verif = 1; // Set status_verif to 1
        $akun->otp = rand(10000, 99999);

        $akun->save();

        return redirect()->route('akun.index');
    }

    public function edit(string $id_akun)
    {
        $akun = Akun::findOrFail($id_akun);
        return view('akun.edit', compact('akun'));
    }

    public function update(Request $request, $id_akun)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
            'nama' => 'required',
            'nomor_telepon' => 'required'
        ]);
        $akun = Akun::findOrFail($id_akun);

        // Update status_verif to 1
        $request->merge(['status_verif' => 1]);
        $request->merge(['password' => Hash::make($request->password)]);
        $akun->update($request->all());

        return redirect()->route('akun.index');
    }

    public function destroy(string $id_akun)
    {
        $akun = Akun::findOrFail($id_akun);
        $akun->delete();

        return redirect()->route('akun.index');
    }
}
