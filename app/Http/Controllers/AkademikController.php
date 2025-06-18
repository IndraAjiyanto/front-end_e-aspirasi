<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AkademikController extends Controller
{
    public function Akademik()
    {
    $token = session("token");
    $user = session("user");
        $respon = Http::withToken($token)->get("http://localhost:8080/akademik/aspirasi/all/{$user['id']}");
        // $respon = Http::withToken($token)->get("http://10.10.10.164/akademik/aspirasi/all/{$user['id']}");
        $data = $respon->json();
        $akademik = $data['aspirasi'];


        return view('admin.akademik.akademik', [
            'akademik' => $akademik,
        ]);
    }

    public function lihat($id)
    {
    $token = session("token");

        $respon_aspirasi = Http::withToken($token)->get("http://localhost:8080/akademik/aspirasi/{$id}");
        // $respon_jawaban = Http::withToken($token)->get("http://localhost:8080/jawaban/aspirasi/{$id}");
        $aspirasi = $respon_aspirasi->json();
        // $jawaban = $respon_jawaban->json();
        return view('admin.akademik.lihat_akademik', [
            'aspirasi' => $aspirasi['aspirasi'],
            'jawaban' => $aspirasi['jawaban'],
            'editId' => request()->query('edit') // ?edit=ID
        ]);
    }
}
