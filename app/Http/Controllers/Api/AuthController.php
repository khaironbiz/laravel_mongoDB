<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function notAuthorised(){
        $data = [
            'status'        => 'Not Authorised',
            'status_code'   => 401,
        ];
        return response()->json($data,200);

    }
    public function login(Request $request)
    {
        $data_validasi = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $validator = Validator::make($request->all(),$data_validasi);
        if ($validator->fails()){
            return response()->json([
                'status'        => 'Unauthorized',
                'status_code'   => 401,
                "error"         => $validator->errors(),
                'data'          => $request->all()
            ], 401);
        }
        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'status'        => 'Unauthorized',
                'status_code'   => 401,
                "error"         => $validator->errors(),
                'data'          => $request->all()
            ], 401);
        }
        $token = $user->createToken('user')->plainTextToken;
        if($token){
            return response()->json([
                'status'        => 'Success',
                'status_code'   => 200,
                'access_token'  => $token,
                'token_type'    => 'Bearer',
                'device_name'   => $request->device_name,
                'data'          => $user
            ],200);
        }
        return response()->json([
            'status'        => 'Faild save token',
            'status_code'   => 200,
            'access_token'  => $token,
            'token_type'    => 'Bearer',
            'device_name'   => $request->device_name,
            'data'          => $user
        ],200);



    }
    public function logout(Request $request)
    {
        $user = $request->user();
        if($user){
            $request->user()->currentAccessToken()->delete();
            $data = [
                'message' => 'success',
                'user'  => $user
            ];
            return response()->json($data,200);

        }
        return response()->json([
            'message' => 'Unauthorized'],
            203);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_validasi = [
            'nama_depan'    => 'required',
            'nama_belakang' => 'required',
            'nik'           => 'numeric|unique:users,nik|digits_between:16,16',
            'jenis_kelamin' => 'required',
            'tgl_lahir'     => 'required|date|date_format:Y-m-d',
            'email'         => 'required|email:rfc,dns|unique:users,email',
            'phone_cell'    => 'required|unique:users,phone_cell',
        ];
//        dd($data_validasi);
        $validator = Validator::make($request->all(),$data_validasi);
        if ($validator->fails()){
            return response()->json([
                "error"     => $validator->errors(),
                "created"   => time(),
                "user"      => $request->all(),
            ],203);
        }
        $data_input                 = $request->all();
        $data_input['nama_lengkap'] = $request->gelar_depan." ".$request->nama_depan." ".$request->nama_belakang." ".$request->gelar_belakang;
        $data_input['username']     = md5(uniqid());
        $user   = new User();
        $add    = $user->create($data_input);
        if($add){
            return response()->json([
                'message' => 'success',
                'user'  => $data_input
            ]);
        }
        return response()->json([
            'message' => 'faild'
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
