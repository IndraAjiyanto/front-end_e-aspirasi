<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardSarprasController extends Controller
{
    public function index(){
        return view('admin.sarpras.dashboard_admin_sarpras');
    }
}
