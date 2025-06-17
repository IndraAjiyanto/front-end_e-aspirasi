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

    public function update(Request $request, $id)
{
    $request->validate([
        'aspirasi_id' => 'required',
        'isi' => 'required'
    ]);

    Http::put("http://localhost:8080/jawaban/{$id}", [
        'aspirasi_id' => $request->aspirasi_id,
        'isi' => $request->isi
    ]);

    return redirect()->route('unit.ppks.lihat', ['id' => $request->aspirasi_id]);
}
public function destroy($id)
{
    Http::delete("http://localhost:8080/jawaban/{$id}");

    return back();
}

}
