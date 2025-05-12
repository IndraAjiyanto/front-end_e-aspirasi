<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AspirasiController extends Controller
{
    public function aspirasi()
    {
                // Ambil data dari API (contoh: internal REST API lokal)
                $response = Http::get('http://localhost:8080/aspirasi');

                // Cek kalau berhasil
                if ($response->successful()) {
                    $aspirasis = $response->json(); // ambil data JSON dari API
                } else {
                    $aspirasis = []; // fallback kalau gagal
                }
        return view('mahasiswa.aspirasi', [
            'aspirasis' => $aspirasis
        ]);
    }

    public function tambah(){
        $response = Http::get('http://localhost:8080/unit');
        if ($response->successful()) {
            $unit = $response->json(); // ambil data JSON dari API
        } else {
            $unit = []; // fallback kalau gagal
        }
        return view('mahasiswa.tambahAspirasi',[
            'unit' => $unit
        ]);
    }

    public function tambahAspirasi(Request $request){
        $validate = $request->validate([
            'mahasiswa_nim' => 'required',
            'isi' => 'required',
            'unit_id' => 'required'
        ]);

        $validate['status']  = 'belum diproses';

        Http::post('http://localhost:8080/aspirasi', $validate);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function editAspirasi($id){
        $response_aspirasi = Http::get("http://localhost:8080/aspirasi/{$id}/edit");
        $response_unit = Http::get('http://localhost:8080/unit');

        $aspirasi = $response_aspirasi->json();
        $unit = $response_unit->json();
        
    
        return view('mahasiswa.editAspirasi', [
            'aspirasi' => $aspirasi, 
            'unit' => $unit]);
    }

    public function updateAspirasi(Request $request){
        $validate = $request->validate([
            'mahasiswa_nim' => 'required',
            'isi' => 'required',
            'unit_id' => 'required'
        ]);

        $validate['status']  = 'belum diproses';

        Http::put('http://localhost:8080/aspirasi', $validate);
        return redirect()->back()->with('success', 'Data berhasil diedit!');
    } 
}
