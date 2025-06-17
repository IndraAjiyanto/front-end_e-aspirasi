<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardAkademikController extends Controller
{
    public function index(){
        return view('admin.akademik.dashboard_admin_akademik');
    }
}
