<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * show data in dashboard
     */
    public function index()
    {
        $url = "http://127.0.0.1:8000/api/data/list?"; 
        $response = Http::get($url);
        $jsonData = $response->json();

        return view('dashboard', $jsonData, ['ht' => 'Dashboard']);
    }
    /**
     * show data in master pengguna
     */
    public function masterUser()
    {
        $url = "http://127.0.0.1:8000/api/data/list?"; 
        $response = Http::get($url);
        $jsonData = $response->json('data');
        
        return view('master', ['data' => $jsonData], ['ht' => 'Master Pengguna']);
    }
    /**
     * show view blade tambah pengguna
     */
    public function add()
    {
        return view('add', ['ht' => 'Tambah Data']);
    }
    /**
     * function for add data to database
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $c_password = $request->password;

        $parameter = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'c_password' => $c_password
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/data/create?";
        $response = $client->request('POST', $url,[
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($parameter)
        ]);

        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);

        if ($contentArray['status'] != true) {
            $error = $contentArray['data'];
            return redirect()->to('master/create')->withErrors($error);
        }else{

        }
        
    }
    /**
     * show view blade edit data
     */
    public function edit()
    {
        return view('edit', ['ht' => 'Edit Data']);
    }
    /**
     * function for edit data
     */
    public function editData(Request $request)
    {

    }
}
