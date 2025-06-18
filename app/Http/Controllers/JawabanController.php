<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JawabanController extends Controller
{
    public function index(){
        
    }

    public function store(Request $request){
    $token = session("token");

        $validate = $request->validate([
            'isi' => 'required',
            'aspirasi_id' => 'required'
        ]);

        $validate['status']  = 'dibalas';

        Http::withToken($token)->post("http://localhost:8080/unit/jawaban", $validate);
        return redirect()->back();
    }

    public function update(Request $request, $id)
{
    $token = session("token");

    $request->validate([
        'aspirasi_id' => 'required',
        'isi' => 'required'
    ]);

    Http::withToken($token)->put("http://localhost:8080/unit/jawaban/{$id}", [
        'aspirasi_id' => $request->aspirasi_id,
        'isi' => $request->isi
    ]);

    url()->current();
    return redirect()->back();
    
}
public function destroy($id)
{
    $token = session("token");

    Http::withToken($token)->delete("http://localhost:8080/unit/jawaban/{$id}");

    return back();
}

}
