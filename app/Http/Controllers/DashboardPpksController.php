<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardPpksController extends Controller
{
    public function index(){
        return view('admin.ppks.dashboard_admin_ppks');
    }
}
