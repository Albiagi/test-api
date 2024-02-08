<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    const API_URL = "http://127.0.0.1:8000/api/data/list";
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
    public function masterUser(Request $request)
    {
        $current_url = url()->current();

        $client = new Client();
        $url = static::API_URL;

        if($request->input('page') != ''){
            $url .= "?page=" . $request->input('page');
        }

        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        foreach($data['links'] as $key => $value){
            $data['links'][$key]['url2'] = str_replace(static::API_URL, $current_url, $value['url']);
        }
        
        return view('master', ['data' => $data], ['ht' => 'Master Pengguna']);
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
            return redirect()->to('master/create')->withErrors($error)->withInput();
        }else{
            return redirect()->to('master')->with('success', 'Berhasil menambah data');
        }
        
    }
    /**
     * show view blade edit data
     */
    public function edit(String $id)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/data/user/$id?";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] != true){
            $error = $contentArray['message'];
            return redirect()->to('master')->withErrors($error);
        }else{
            $data = $contentArray['data'];
            return view('edit', ['data' => $data,'ht' => 'Edit Data']);
        }
        

        // return view('edit', $jsonData, ['ht' => 'Edit Data']);
    }
    /**
     * function for edit/update data
     */
    public function editData(Request $request, String $id)
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
        $url = "http://127.0.0.1:8000/api/data/user/$id?";
        $response = $client->request('PUT', $url,[
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($parameter)
        ]);

        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);

        if ($contentArray['status'] != true) {
            $error = $contentArray['data'];
            return redirect()->to('master/create')->withErrors($error)->withInput();
        }else{
            return redirect()->to('master')->with('success', 'Data berhasil di ubah');
        }
    }
    /**
     * function delete data
     */
    public function destroy(String $id, Request $request)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/data/user/$id?";
        $response = $client->request('DELETE', $url);

        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);

        if ($contentArray['status'] != true) {
            $error = $contentArray['data'];
            return redirect()->to('master')->withErrors($error)->withInput();
        }else{
            return redirect()->to('login')->with('success', 'Data berhasil di hapus');
        }
    }
}
