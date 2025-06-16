<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AspirasiController extends Controller
{
    public function index()
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

    public function create(){
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

    public function store(Request $request){
        $validate = $request->validate([
            'mahasiswa_nim' => 'required',
            'isi' => 'required',
            'unit_id' => 'required'
        ]);

        $validate['status']  = 'belum diproses';

        $response = Http::post('http://localhost:8080/aspirasi', $validate);

        if ($response->successful()) {
            return redirect()->route('aspirasi.index')->with('success', 'Data berhasil ditambahkan!');
        } elseif ($response->status() === 422) {
            return redirect()->back()->withErrors($response->json('errors'))->withInput();
        }  
    }

    public function show($id){
                $response = Http::get("http://localhost:8080/aspirasi/{$id}");

                // Cek kalau berhasil
                if ($response->successful()) {
                    $data = $response->json(); // ambil data JSON dari API
                } else {
                    $data = []; // fallback kalau gagal
                }
    return view('mahasiswa.detail_aspirasi', [
        'aspirasi'=> $data['aspirasi'], 
        'jawaban'=> $data['jawaban'],
        'unit'=> $data['unit']
        ] );
    }

    public function edit($id){
        $response_aspirasi = Http::get("http://localhost:8080/aspirasi/{$id}/edit");
        $response_unit = Http::get('http://localhost:8080/unit');

        $aspirasi = $response_aspirasi->json();
        $unit = $response_unit->json();
        
    
        return view('mahasiswa.editAspirasi', [
            'aspirasi' => $aspirasi, 
            'unit' => $unit]);
    }

    public function update(Request $request, $id){
        $validate = $request->validate([
            'mahasiswa_nim' => 'required',
            'isi' => 'required',
            'unit_id' => 'required'
        ]);

        $validate['status']  = 'belum diproses';

        Http::put("http://localhost:8080/aspirasi/{$id}", $validate);
        return redirect()->route('aspirasi.index')->with('success', 'Data berhasil diedit!');
    } 

    public function destroy($id){
        $respon = Http::delete("http://localhost:8080/aspirasi/{$id}");
        if($respon->status() === 404){
        return redirect()->route('aspirasi.index')->with('error', 'Data tidak ditemukan');
        } else {
        return redirect()->route('aspirasi.index')->with('success', 'Data berhasil dihapus!');
        }
    }
}
