<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{
    public function aspirasi()
    {
         // Data dummy (tanpa database)
         $aspirasis = [
            ['id' => 1, 'unit' => 'Akademik', 'isi' => 'Mohon diperbaiki jaringan WiFi di lantai 2.', 'status' => 'terkonfirmasi'],
            ['id' => 2, 'unit' => 'Sarana dan Prasarana', 'isi' => 'Perlu penambahan tempat duduk di taman kampus.', 'status' => 'terkonfirmasi'],
            ['id' => 3, 'unit' => 'PPKS', 'isi' => 'Kantin kurang bersih, mohon ditindaklanjuti. Seharusnya pihak kampus dapat memperbaiki dengan lebih optimal.', 'status' => 'diproses'],
            ['id' => 4, 'unit' => 'Sarana dan Prasarana', 'isi' => 'Tempat wudu yang kurang optimal dalam pengembangannya.', 'status' => 'diproses'],
        ];
        return view('mahasiswa.aspirasi', compact('aspirasis'));
    }
}
