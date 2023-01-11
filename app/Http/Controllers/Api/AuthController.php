<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Halaman yang memberikan informasi gagal authorisasi
     *
     * @return \Illuminate\Http\Response
     */
    public function notAuthorised(){
        $data = [
            'status_code'   => 401,
            'message'       => 'Not Authorized',
        ];
        return response()->json($data,200);

    }
    /**
     * halaman login, diperlukan username dan password
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password')))
        {
            $data = [
                "status_code"   => 401,
                'message'       => 'Unauthorized',
                'time'          => time(),
            ];
            return response()->json($data, 401);
        }else{
            $user = User::where('email', $request['email'])->firstOrFail();
            $token = $user->createToken('auth_token')->plainTextToken;
            $content    = [
                "token"         => $token,
                "token_type"    => 'Bearer',
                "id_user"       => $user->id,
                "name"          => $user->name,
                "email"         => $user->email
            ];
            $data   = [
                "status_code"   => 200,
                'message'       => 'Success',
                'time'          => time(),
                'content'       => $content,
                'auth'          => auth()->user(),
            ];
            return response()
                ->json($data, 200);
        }
    }
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $data_validasi = [
            'nama_depan'    => 'required',
            'nama_belakang' => 'required',
            'jenis_kelamin' => 'required',
            'email'         => 'required|email:rfc,dns|unique:users,email',
            'phone_cell'    => 'required|unique:users,phone_cell'
        ];
//        dd($data_validasi);
        $validator = Validator::make($request->all(),$data_validasi);
        if ($validator->fails()){
            $data   = [
                "status_code"   => 203,
                "message"       => "Validation failed",
                "error"         => $validator->errors(),
                "time"          => time(),
                "content"       => $request->all()
            ];
            return response()->json($data,203);
        }
        $data_input         = [
            'nama_depan'        => $request->nama_depan,
            'nama_belakang'     => $request->nama_belakang,
            'nama_lengkap'      => $request->gelar_depan." ".$request->nama_depan." ".$request->nama_belakang." ".$request->gelar_belakang,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'email'             => $request->email,
            'phone_cell'        => $request->phone_cell,
            'password'          => bcrypt($request->password),
            'active'            => false,
            'level'             => 'user',
        ];

        $user   = new User();
        $add    = $user->create($data_input);
        if($add){
            $data =[
                "status_code"   => 201,
                "message"       => "Success",
                "time"          => time(),
                "user"          => $data_input
            ];
            return response()->json($data, 201);
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
