<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public $successStatus = 200;

    Public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            $success['name'] = $user->name;

            return response()->json(['success' => $success, 'message' => 'Login Success'], $this->successStatus);
        }else{
            return response()->json(['error' => 'Unauthorised'],);
        }
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;

        return response()->json(['success' => $success, 'message' => 'Success create data'], $this->successStatus);
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth()->user()->token()->delete();
            return response()->json([
                'success' => 'Logout Success'
            ], $this->successStatus);
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401);
        } 
        
    }

    public function details()
    {
        $user = User::all();
        return response()->json(['success' => $user], $this->successStatus);
    }
}
