<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AkademikController extends Controller
{
    public function Akademik()
    {
        // Menambahkan status terbalas ke setiap aspirasi
        $akademik = [
            (object) [
                'id' => 1,
                'judul' => 'Perbaikan Sistem Pembayaran',
                'isi' => 'Aspirasi ini bertujuan untuk memperbaiki sistem pembayaran yang lambat dan tidak transparan.',
                'unit' => 'akademik',
                'status' => 'terbalas', // Menambahkan status
            ],
            (object) [
                'id' => 2,
                'judul' => 'Pengadaan Wi-Fi di Ruang Kelas',
                'isi' => 'Mengusulkan pengadaan Wi-Fi yang stabil di semua ruang kelas untuk mendukung pembelajaran online.',
                'unit' => 'akademik',
                'status' => 'diproses', // Status belum terbalas
            ],
            (object) [
                'id' => 3,
                'judul' => 'Peningkatan Fasilitas Perpustakaan',
                'isi' => 'Usulan untuk meningkatkan fasilitas dan koleksi buku di perpustakaan agar lebih lengkap.',
                'unit' => 'akademik',
                'status' => 'terbalas', // Menambahkan status
            ]
        ];

        return view('admin.akademik', [
            'akademik' => $akademik,
        ]);
    }

    public function show($id)
    {
        $akademik = [
            (object) [
                'id' => 1,
                'judul' => 'Perbaikan Sistem Pembayaran',
                'isi' => 'Aspirasi ini bertujuan untuk memperbaiki sistem pembayaran yang lambat dan tidak transparan.',
                'unit' => 'akademik',
                'status' => 'diproses', // Menambahkan status
            ],
            (object) [
                'id' => 2,
                'judul' => 'Pengadaan Wi-Fi di Ruang Kelas',
                'isi' => 'Mengusulkan pengadaan Wi-Fi yang stabil di semua ruang kelas untuk mendukung pembelajaran online.',
                'unit' => 'akademik',
                'status' => 'diproses', // Status belum terbalas
            ],
            (object) [
                'id' => 3,
                'judul' => 'Peningkatan Fasilitas Perpustakaan',
                'isi' => 'Usulan untuk meningkatkan fasilitas dan koleksi buku di perpustakaan agar lebih lengkap.',
                'unit' => 'akademik',
                'status' => 'terbalas', // Menambahkan status
            ]
        ];

        // Cari aspirasi berdasarkan ID
        $aspirasi = collect($akademik)->firstWhere('id', $id);

        if (!$aspirasi) {
            return abort(404, 'Aspirasi tidak ditemukan.');
        }

        return view('admin.lihat_akademik', compact('aspirasi'));
    }
}
