<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaranaPrasaranaController extends Controller
{
    // Menampilkan daftar aspirasi sarana prasarana
    public function Sarpras()
    {
        $sarpras = [
            (object)[
                'id' => 1,
                'isi' => 'Kursi di ruang kelas A-101 banyak yang rusak dan tidak nyaman digunakan.',
                'status' => 'diproses',
            ],
            (object)[
                'id' => 2,
                'isi' => 'AC di laboratorium komputer lantai 2 mati dan sangat panas.',
                'status' => 'terbalas',
            ],
            (object)[
                'id' => 3,
                'isi' => 'Lampu di area parkiran mati sejak minggu lalu.',
                'status' => 'terbalas',
            ],
        ];

        return view('admin.sarana_prasarana', [
            'sarpras' => $sarpras,
        ]);
    }

    // Menampilkan detail aspirasi berdasarkan ID
    public function show($id)
    {
        $sarpras = [
            (object)[
                'id' => 1,
                'isi' => 'Kursi di ruang kelas A-101 banyak yang rusak dan tidak nyaman digunakan.',
                'status' => 'diproses',
            ],
            (object)[
                'id' => 2,
                'isi' => 'AC di laboratorium komputer lantai 2 mati dan sangat panas.',
                'status' => 'terbalas',
            ],
            (object)[
                'id' => 3,
                'isi' => 'Lampu di area parkiran mati sejak minggu lalu.',
                'status' => 'terbalas',
            ],
        ];

        // Cari aspirasi berdasarkan ID
        $aspirasi = collect($sarpras)->firstWhere('id', $id);

        if (!$aspirasi) {
            return abort(404, 'Aspirasi tidak ditemukan.');
        }

        return view('admin.lihat_sarpras', compact('aspirasi'));
    }

    public function lihatSarpras()
    {
        $lihatSarpras = [
            'id' => 1, 
            'isi' => 'Tempat parkir kendaraan terlalu sempit dan tidak teratur.',
        ];
    
        return view('admin.lihat_sarpras', compact('lihatSarpras'));
    }
}



