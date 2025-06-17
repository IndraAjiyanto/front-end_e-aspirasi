<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PpksController extends Controller
{
    public function ppks()
    {
        $respon = Http::get('http://localhost:8080/unit/aspirasi/2');
        $ppks = $respon->json();

        return view('admin.ppks.ppks', [
            'ppks' => $ppks,
        ]);
    }

    public function lihat($id)
    {
        $respon_aspirasi = Http::get("http://localhost:8080/aspirasi/{$id}");
        $respon_jawaban = Http::get("http://localhost:8080/jawaban/aspirasi/{$id}");
        $aspirasi = $respon_aspirasi->json();
        $jawaban = $respon_jawaban->json();
        return view('admin.ppks.lihat_ppks', [
            'aspirasi' => $aspirasi['aspirasi'],
            'jawaban' => $jawaban,
            'editId' => request()->query('edit') // ?edit=ID
        ]);
    }
}
