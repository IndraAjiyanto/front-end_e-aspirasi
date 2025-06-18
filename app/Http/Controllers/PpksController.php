<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PpksController extends Controller
{
    public function ppks()
    {
        $token = session("token");
        $user = session("user");

        // Ganti URL sesuai backend kamu
        $respon = Http::withToken($token)->get("http://localhost:8080/ppks/aspirasi/all/{$user['id']}");
        $ppks = $respon->json();

        return view('admin.ppks.ppks', [
            'ppks' => $ppks,
        ]);
    }

    public function lihat($id)
    {
        $token = session("token");

        // Mendapatkan aspirasi sekaligus jawaban dari endpoint yang sama seperti akademik
        $respon_aspirasi = Http::withToken($token)->get("http://localhost:8080/ppks/aspirasi/{$id}");
        $aspirasi = $respon_aspirasi->json();

        return view('admin.ppks.lihat_ppks', [
            'aspirasi' => $aspirasi['aspirasi'],
            'jawaban' => $aspirasi['jawaban'],
            'editId' => request()->query('edit') // ?edit=ID
        ]);
    }
}
