<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
        
    }

public function proses(Request $request)
{
    $validate = $request->validate([
        'username' => 'required',
        'password' => 'required'
    ]);

    try {
        $response = Http::post('http://localhost:8080/login', $validate);

        if ($response->successful()) {
            session([
                'token' => $response->json('token'),
                'user' => $response->json('user'),
            ]);
            return redirect()->route('dashboard')->with('success', 'Berhasil login!');
        } elseif ($response->status() === 422) {
            return redirect()->back()->withErrors($response->json('errors'))->withInput();
        } else {
            return redirect()->back()->with('error', 'Login gagal. Username atau password salah.')->withInput();
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menghubungi server.')->withInput();
    }
}


         public function showRegisterForm()
     {
         return view('mahasiswa.daftar');
     }

public function daftar(Request $request)
{
    // Validasi di sisi Laravel (opsional, karena API juga validasi)
    $request->validate([
        'username' => 'required|min:5',
        'email' => 'required|email',
        'password' => 'required|min:8',
        'pass_confirm' => 'required|same:password',

        'nim' => 'required|min:5',
        'nama' => 'required|min:3',
        'kelas' => 'required|min:3',
        'prodi' => 'required',
        'jurusan' => 'required',
    ]);

    // Kirim data ke API CI4
    $response = Http::post('http://localhost:8080/register', [
        'username'      => $request->username,
        'email'         => $request->email,
        'password'      => $request->password,
        'pass_confirm'  => $request->pass_confirm,
        'nim'           => $request->nim,
        'nama'          => $request->nama,
        'kelas'         => $request->kelas,
        'prodi'         => $request->prodi,
        'jurusan'       => $request->jurusan,
    ]);

    if ($response->successful()) {
        return redirect('/login')->with('success', 'Registrasi berhasil, silakan login!');
    } else {
        $errors = $response->json('messages.error') ?? ['error' => 'Terjadi kesalahan saat registrasi.'];

return back()->withErrors($errors)->withInput();

    }
}
}
