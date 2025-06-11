<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JawabanController extends Controller
{
    public function index(){
        
    }

    public function create(Request $request, $id){
        $validate = $request->validate([
            'isi' => 'required'
        ]);

        $validate['status']  = 'dibalas';
        $validate['aspirasi_id']  = $id;

        Http::post("http://localhost:8080/jawaban", $validate);
        return redirect()->back();
    }
}
