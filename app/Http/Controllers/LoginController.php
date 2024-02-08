<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login', ['ht' => 'Login']);
    }

    // Call login Api
    public function loginApi(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|max:12'
        ]);
        try{
            $email = $request->email;
            $password = $request->password;

            $client = new Client();
            $response = $client->post('http://127.0.0.1:8000/api/login', [
                'headers' => [
                    'authorization' => 'bearer'.session()->get('token.access_token')
                ],
                'query' => [
                    'email' => $email,
                    'password' => $password
                ]
            ]);
            $result = json_decode((string)$response->getBody(), true);
            // return dd($result);
            return redirect()->to('dashboard');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Login failed, Please try again.');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session()->flush();
        return redirect()->to('login')->with('success', 'Berhasil logout');
    }
}
