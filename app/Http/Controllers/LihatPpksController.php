<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LihatPpksController extends Controller
{
    public function lihatppks()
    {
        $lihatppks = [
            'id' => 1, 
            'isi' => 'Lampu lorong padam sudah seminggu.',
        ];
    
        return view('admin.lihat_ppks', compact('lihatppks'));
    }
}



