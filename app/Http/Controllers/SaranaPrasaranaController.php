<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SaranaPrasaranaController extends Controller
{
    // Menampilkan daftar aspirasi sarana prasarana
    public function Sarpras()
    {
        $token = session('token');
        $user = session('user');

        $respon = Http::withToken($token)->get("http://localhost:8080/sarpras/aspirasi/all/{$user['id']}");
        $sarpras = $respon->json();

        return view('admin.sarpras.sarana_prasarana', [
            'sarpras' => $sarpras,
        ]);
    }

    public function lihat($id)
    {
        $token = session('token');

        $respon_aspirasi = Http::withToken($token)->get("http://localhost:8080/sarpras/aspirasi/{$id}");
        $aspirasi = $respon_aspirasi->json();

        return view('admin.sarpras.lihat_sarpras', [
            'aspirasi' => $aspirasi['aspirasi'] ,
            'jawaban' => $aspirasi['jawaban'] ,
            'editId' => request()->query('edit') // ?edit=ID
        ]);
    }
}
