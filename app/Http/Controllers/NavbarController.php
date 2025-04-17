<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NavbarController extends Controller
{
    public function navbar(){
            return view('mahasiswa.navbar'); 
        }
}


