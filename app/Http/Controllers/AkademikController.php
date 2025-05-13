<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AkademikController extends Controller
{
    public function Akademik()
    {
        $respon = Http::get('http://localhost:8080/aspirasi/akademik/2');
        $akademik = $respon->json();

        return view('admin.akademik.akademik', [
            'akademik' => $akademik,
        ]);
    }

    public function lihat($id)
    {
        $respon = Http::get("http://localhost:8080/aspirasi/{$id}");
        $aspirasi = $respon->json();
        return view('admin.akademik.lihat_akademik', [
            'aspirasi' => $aspirasi['aspirasi']
        ]);
    }

    public function balas(Request $request, $id){
        $validate = $request->validate([
            'isi' => 'required'
        ]);

        $validate['status']  = 'dibalas';
        $validate['aspirasi_id']  = $id;

        Http::post("http://localhost:8080/jawaban", $validate);
        return redirect()->route('aspirasi.akademik');
    }
}
