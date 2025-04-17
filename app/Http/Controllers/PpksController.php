<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PpksController extends Controller
{
    public function PPKS()
    {
        // Menambahkan status terbalas ke setiap laporan PPKS
        $ppks = [
            (object) [
                'id' => 1,
                'judul' => 'Laporan Kasus Kekerasan Seksual di Kampus A',
                'isi' => 'Menginformasikan tentang kejadian kekerasan seksual yang terjadi di Kampus A, membutuhkan penanganan segera.',
                'unit' => 'ppks',
                'status' => 'terbalas',
            ],
            (object) [
                'id' => 2,
                'judul' => 'Pelecehan di Kegiatan Organisasi Mahasiswa',
                'isi' => 'Melaporkan kejadian pelecehan seksual di kegiatan organisasi mahasiswa yang belum ditanggapi.',
                'unit' => 'ppks',
                'status' => 'diproses',
            ],
            (object) [
                'id' => 3,
                'judul' => 'Kekerasan Seksual di Kelas F',
                'isi' => 'Melaporkan adanya kekerasan seksual yang terjadi di kelas F, membutuhkan perhatian dan tindak lanjut.',
                'unit' => 'ppks',
                'status' => 'terbalas',
            ]
        ];

        return view('admin.ppks', [
            'ppks' => $ppks,
        ]);
    }

    public function show($id)
    {
        $ppks = [
            (object) [
                'id' => 1,
                'judul' => 'Laporan Kasus Kekerasan Seksual di Kampus A',
                'isi' => 'Menginformasikan tentang kejadian kekerasan seksual yang terjadi di Kampus A, membutuhkan penanganan segera.',
                'unit' => 'ppks',
                'status' => 'terbalas',
            ],
            (object) [
                'id' => 2,
                'judul' => 'Pelecehan di Kegiatan Organisasi Mahasiswa',
                'isi' => 'Melaporkan kejadian pelecehan seksual di kegiatan organisasi mahasiswa yang belum ditanggapi.',
                'unit' => 'ppks',
                'status' => 'diproses',
            ],
            (object) [
                'id' => 3,
                'judul' => 'Kekerasan Seksual di Kelas F',
                'isi' => 'Melaporkan adanya kekerasan seksual yang terjadi di kelas F, membutuhkan perhatian dan tindak lanjut.',
                'unit' => 'ppks',
                'status' => 'terbalas',
            ]
        ];

        // Cari laporan berdasarkan ID
        $laporan = collect($ppks)->firstWhere('id', $id);

        if (!$laporan) {
            return abort(404, 'Laporan tidak ditemukan.');
        }

        return view('admin.lihat_ppks', compact('laporan'));
    }
}
