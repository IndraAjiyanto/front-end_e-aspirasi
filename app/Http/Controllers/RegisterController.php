<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class RegisterController extends Controller
{
     // Tampilkan form register
     public function showRegisterForm()
     {
         return view('mahasiswa.daftar');
     }
}
