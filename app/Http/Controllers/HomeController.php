<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $response = Http::get('http://127.0.0.1:8000/api/data/list?');
        $jsonData = $response->json();
        dd($jsonData);
        
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
