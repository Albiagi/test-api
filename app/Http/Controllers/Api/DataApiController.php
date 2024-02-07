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
        $user = User::orderBy('name', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Berhasil menampilkan data',
            'data' => $user,
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
            return response()->json([
                'status' => false,
                'message' => 'Fails to create data',
                'data' => $validator->errors(),
            ], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;

        return response()->json([
            'status' => true,
            'success' => $success, 
            'message' => 'Success create data',
        ], $this->successStatus);
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
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if(empty($user)){
            return response()->json([
                'status' => false,
                'message' => 'Data not found'
            ], 404);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Fails to update data',
                'error' => $validator->errors(),
            ], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;

        $input = $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Success update data',
            'data' => $user,
        ], $this->successStatus);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json([
            'status' => true,
            'message' => 'Success Delete data.'
        ], $this->successStatus);
    }

    public function search($name)
    {
        return User::where("name", $name)->get();
    }
}
