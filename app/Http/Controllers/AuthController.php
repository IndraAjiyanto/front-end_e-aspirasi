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

    // $response = Http::post('http://10.10.10.164/login', $validate);
    $response = Http::post('http://localhost:8080/login', $validate);

    if ($response->successful()) {
    session([
        'token' => $response['token'],
        'user' => $response['user']
    ]);
        $decoded = json_decode(base64_decode(explode('.', $response['token'])[1]), true);
        if ($decoded['role'] == 'akademik') {
            return redirect()->route('dashboardakademik');
        } else if($decoded['role'] == 'ppks') {
            return redirect()->route('dashboardppks');
        }else if($decoded['role'] == 'sarpras'){
            return redirect()->route('dashboardsarpras');
        }else if($decoded['role'] == 'mahasiswa'){
            return redirect()->route('dashboardmahasiswa');
        }
    }

    return back()->withErrors(['login' => 'Email atau password salah']);
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

public function logout(Request $request)
{
    // Hapus semua data session
    $request->session()->forget(['token', 'user']);
    $request->session()->flush(); // opsional: hapus semua session

    // Redirect ke halaman login
    return redirect()->route('login')->with('success', 'Berhasil logout');
}

}
