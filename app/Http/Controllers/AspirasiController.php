<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AspirasiController extends Controller
{


public function index()
{
    $token = session("token");
    $user = session("user");
    if (!$token) {
        return redirect()->route('login')->with('error', 'Token tidak ditemukan');
    }

    $response = Http::withToken($token)->get("http://localhost:8080/mahasiswa/aspirasi/all/{$user['id']}");

    if ($response->status() === 401) {
        return redirect()->route('login')->with('error', 'Sesi telah habis, silakan login kembali.');
    }

    if ($response->successful()) {
        $json = $response->json();
        $aspirasis = $json['aspirasi'];
    } else {
        $aspirasis = [];
        logger()->error('Gagal ambil aspirasi: ' . $response->body());
    }

    return view('mahasiswa.aspirasi', [
        'aspirasis' => $aspirasis,
    ]);
}

    public function create(){
    $token = session("token");

        $response = Http::withToken($token)->get('http://localhost:8080/mahasiswa/unit');
        if ($response->successful()) {
            $unit = $response->json(); // ambil data JSON dari API
        } else {
            $unit = []; // fallback kalau gagal
        }
        return view('mahasiswa.tambahAspirasi',[
            'unit' => $unit,
        ]);
    }

    public function store(Request $request){
    $token = session("token");
    $user = session("user");

        $validate = $request->validate([
            'isi' => 'required',
            'unit_id' => 'required'
        ]);

        $validate['status']  = 'belum diproses';
        $validate['user_id']  = $user['id'];

        $response = Http::withToken($token)->post('http://localhost:8080/mahasiswa/aspirasi', $validate);

        if ($response->successful()) {
            return redirect()->route('aspirasi.index')->with('success', 'Data berhasil ditambahkan!');
        } elseif ($response->status() === 422) {
            return redirect()->back()->withErrors($response->json('errors'))->withInput();
        }  
    }

    public function show($id){
    $token = session("token");
    $user = session("user");
                $response = Http::withToken($token)->get("http://localhost:8080/mahasiswa/aspirasi/{$id}");

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
    $token = session("token");

        $response_aspirasi = Http::withToken($token)->get("http://localhost:8080/mahasiswa/aspirasi/{$id}/edit");
        $response_unit = Http::withToken($token)->get('http://localhost:8080/mahasiswa/unit');

        $aspirasi = $response_aspirasi->json();
        $unit = $response_unit->json();
        
    
        return view('mahasiswa.editAspirasi', [
            'aspirasi' => $aspirasi, 
            'unit' => $unit]);
    }

    public function update(Request $request, $id){
    $token = session("token");
    $user = session("user");


        $validate = $request->validate([
            'isi' => 'required',
            'unit_id' => 'required'
        ]);

        $validate['status']  = 'belum diproses';
        $validate['user_id']  = $user['id'];


        Http::withToken($token)->put("http://localhost:8080/mahasiswa/aspirasi/{$id}", $validate);
        return redirect()->route('aspirasi.index')->with('success', 'Data berhasil diedit!');
    } 

    public function destroy($id){
    $token = session("token");
        $respon = Http::withToken($token)->delete("http://localhost:8080/mahasiswa/aspirasi/{$id}");
        if($respon->status() === 404){
        return redirect()->route('aspirasi.index')->with('error', 'Data tidak ditemukan');
        } else {
        return redirect()->route('aspirasi.index')->with('success', 'Data berhasil dihapus!');
        }
    }
}
