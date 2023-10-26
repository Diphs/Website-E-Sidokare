<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Pagination\Paginator;

class AkunController extends Controller
{
  
    public function index(Request $request)
    {
        $query = $request->input('query');
        $users = Users::search($query);
    
        // Mengatur jumlah item yang ditampilkan per halaman
        $perPage = 1000;
    
        // Mendapatkan nomor halaman dari query string jika ada, atau default ke 1
        $currentPage = Paginator::resolveCurrentPage('page');
    
        // Membuat instance Paginator untuk koleksi berita
        $pagination = new Paginator($users->slice(($currentPage - 1) * $perPage, $perPage), $users->count());
        $pagination->withPath(route('users.index'));
    
        return view('users.index', [
            'users' => $pagination,
            'query' => $query,
        ]);
    }
    
    public function create()
    {
        return view('users.create');
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required',
            'role' => 'required|in:Admin,Pegawai',
        ]);
    
        $existingUser = Users::where('email', $validatedData['email'])->first();
    
        if ($existingUser) {
            // Email sudah ada dalam database, berikan respons atau lakukan tindakan lainnya
            // ...
        } else {
            // Mengenkripsi password
            $encryptedPassword = bcrypt($validatedData['password']);
    
            // Menyimpan data ke database
            $user = new Users;
            $user->email = $validatedData['email'];
            $user->password = $encryptedPassword;
            $user->name = $validatedData['name'];
            $user->role = $validatedData['role'];
            $user->save();
    
            // Lanjutkan dengan tindakan lainnya atau respon yang sesuai
            // ...
        }
    
    
        return redirect()->route('users.index');
    }
    
    public function edit(string $id)
    {
        $users = Users::findOrFail($id);
        return view('users.edit', compact('users'));
    }
    
    public function update(Request $request, $id)
    {
        // Validasi data yang dikirim dari tampilan
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|min:8',
            'name' => 'required',
            'role' => 'required|in:Admin,Pegawai',
        ]);
    
        // Mencari pengguna yang akan diperbarui berdasarkan ID
        $user= Users::findOrFail($id);
    
        // Memperbarui nilai atribut pengguna
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->name = $validatedData['name'];
        $user->role = $validatedData['role'];
        $user->save();
    
        // Lanjutkan dengan tindakan lainnya, misalnya mengirimkan respons atau melakukan redirect
        
        return redirect()->route('users.index');
    }
    
    public function destroy(string $id)
    {
        $users = Users::findOrFail($id);
        $users->delete();
    
        return redirect()->route('users.index');
    }
    
}
