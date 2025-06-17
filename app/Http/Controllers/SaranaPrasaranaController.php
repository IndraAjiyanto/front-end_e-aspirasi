<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SaranaPrasaranaController extends Controller
{
    // Menampilkan daftar aspirasi sarana prasarana
    public function Sarpras()
    {
         $respon = Http::get('http://localhost:8080/unit/aspirasi/3'); // ID unit 3 untuk Sarpras
    $sarpras = $respon->json();

    return view('admin.sarpras.sarana_prasarana', [
        'sarpras' => $sarpras,
    ]);
    }

    public function lihat($id)
    {
        
        $respon_aspirasi = Http::get("http://localhost:8080/aspirasi/{$id}");
        $respon_jawaban = Http::get("http://localhost:8080/jawaban/aspirasi/{$id}");

        
        $aspirasi = $respon_aspirasi->json();
        $jawaban = $respon_jawaban->json();
        return view('admin.sarpras.lihat_sarpras', [
            'aspirasi' => $aspirasi['aspirasi'],
            'jawaban' => $jawaban,
            'editId' => request()->query('edit') // ?edit=ID
        ]);
}
}



