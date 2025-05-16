<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AkademikController extends Controller
{
    public function Akademik()
    {
        $respon = Http::get('http://localhost:8080/unit/aspirasi/1');
        $akademik = $respon->json();

        return view('admin.akademik.akademik', [
            'akademik' => $akademik,
        ]);
    }

    public function lihat($id)
    {
        $respon_aspirasi = Http::get("http://localhost:8080/aspirasi/{$id}");
        $respon_jawaban = Http::get("http://localhost:8080/jawaban/aspirasi/{$id}");
        $aspirasi = $respon_aspirasi->json();
        $jawaban = $respon_jawaban->json();
        return view('admin.akademik.lihat_akademik', [
            'aspirasi' => $aspirasi['aspirasi'],
            'jawaban' => $jawaban,
        ]);
    }
}
