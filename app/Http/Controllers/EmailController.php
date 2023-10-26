<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Mail\EmailNotification;

class EmailController extends Controller
{
    public function kirimEmail(Request $request)
    {
        // Validasi input jika diperlukan
        try {
            $validatedData = $request->validate([
                'email' => 'required|email',
                'nama' => 'required',
                'isi' => 'required',
            ]);
        } catch (ValidationException $e) {
            return redirect('/form')->withErrors($e->errors());
        }

        // Kirim email
        $email = $validatedData['email'];
        $nama = $validatedData['nama'];
        $isi = $validatedData['isi'];

        Mail::to('diphaandimorgan@gmail.com')->send(new EmailNotification($email, $nama, $isi));

        return view('welcome');
    }
}
