<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard', ['ht' => 'Dashboard']);
    }

    public function masterUser()
    {
        return view('master', ['ht' => 'Master Pengguna']);
    }

    public function add()
    {
        return view('add', ['ht' => 'Tambah Data']);
    }
}
