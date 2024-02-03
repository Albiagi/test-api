<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Client\Events\ResponseReceived;
use Illuminate\Support\Facades\Validator;

class DataApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::paginate(5);
        return response()->json([
            'status' => true,
            'message' => 'Berhasil menampilkan data',
            'Data' => $user,
        ], $this->successStatus);
    }

    public $successStatus = 200;

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return response()->json([
            'status' => true,
            'message' => 'User Data Found',
            'data' => $user
        ], $this->successStatus);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->c_password = $request->c_password;
        $user->save();
        return response()->json([
            'status' => true,
            'message' => 'Success update data',
            'Data' => $user,
        ], $this->successStatus);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        $user->delete();
        return response()->json([
            'status' => true,
            'message' => 'Success Delete data.'
        ], $this->successStatus);
    }
}
