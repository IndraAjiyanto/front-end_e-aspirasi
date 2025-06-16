<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JawabanController extends Controller
{
    public function index(){
        
    }

    public function store(Request $request){
        $validate = $request->validate([
            'isi' => 'required',
            'aspirasi_id' => 'required'
        ]);

        $validate['status']  = 'dibalas';

        Http::post("http://localhost:8080/jawaban", $validate);
        return redirect()->back();
    }
}
