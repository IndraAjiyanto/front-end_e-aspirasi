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
        $respon = Http::get("http://localhost:8080/aspirasi/{$id}");
        $aspirasi = $respon->json();
        return view('admin.ppks.lihat_ppks', [
            'aspirasi' => $aspirasi['aspirasi']
        ]);
    }
}
