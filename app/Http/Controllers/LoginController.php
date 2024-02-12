<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function login()
    {
        return view('login', ['ht' => 'Login']);
    }

    // Call login Api
    public function loginApi(Request $request)
    {
        $url = "http://127.0.0.1:8000/api/login";
        $access_token = $request->session()->get('token.access_token');

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|max:12'
        ]);
        try{
            $http = new Client();
            $email = $request->email;
            $password = $request->password;

            $response = $http->post($url, [
                'headers' => [
                    "Accept" => "Application/json",
                    "authorization" => "Bearer".$access_token,
                ],
                'query' => [
                    'email' => $email,
                    'password' => $password
                ]
            ]);

            $result = json_decode((string)$response->getBody(), true);
            return redirect()->to('dashboard');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Login failed, Please try again.');
        }
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        request()->session()->regenerateToken();
        return redirect()->to('login')->with('success', 'Berhasil logout');
    }
}
