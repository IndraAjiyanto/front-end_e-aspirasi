<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LihatAkademikController extends Controller
{
    public function lihatAkademik()
    {
        $lihatakademik = [
            'id' => 1,
            'isi' => 'Dosen tidak hadir selama 2 minggu tanpa pemberitahuan.',
        ];

        return view('admin.lihat_akademik', compact('lihatakademik'));
    }
}