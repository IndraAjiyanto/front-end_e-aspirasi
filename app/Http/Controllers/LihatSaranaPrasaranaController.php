<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LihatSaranaPrasaranaController extends Controller
{
    public function lihatSarpras()
    {
        $lihatSarpras = [
            'id' => 1, 
            'isi' => 'Tempat parkir kendaraan terlalu sempit dan tidak teratur.',
        ];
    
        return view('admin.lihat_sarpras', compact('lihatSarpras'));
    }
}
