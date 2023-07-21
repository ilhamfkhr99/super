<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pegawai/beranda');
    }
    public function beranda()
    {
        return view('pegawai.beranda');
    }
}
