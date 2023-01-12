<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Jobs\RegisterJob;
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
        if (!Auth::attempt($request->only('username', 'password')))
        {
            $data = [
                "status_code"   => 401,
                'message'       => 'Unauthorized',
                'time'          => time(),
            ];
            return response()->json($data, 401);
        }else{
            $user       = User::where('username', $request['username'])->firstOrFail();
            $token      = $user->createToken('auth_token')->plainTextToken;
            $data       = [
                "status_code"   => 200,
                'message'       => 'Success',
                "token"         => $token,
                "token_type"    => 'Bearer',
                'time'          => time(),
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
    public function register(RegisterRequest $request)
    {
        $time_start = microtime(true);
        // Sleep for a while
        usleep(100);

        $input              = $request->validated();
        $input['password']  = bcrypt($request->password);
        $input['active']    = false;
        $input['level']     = 'user';
        $user               = new User();
        $add                = $user->create($input);
        $data_email = [
            'nama_penerima'     => $request->nama['nama_depan'],
            'email_penerima'    => $request->kontak['email'],
            'judul_email'       => "Notifikasi Registrasi",
            'view'              => "mail.register",
            'server'            => [
                'ip'        => $request->ip(),
                'browser'   => $_SERVER['HTTP_USER_AGENT'],
                'time'      => time()
            ]
        ];
        $sending_mail = dispatch(new RegisterJob($data_email));
        $time_end   = microtime(true);
        $time       = $time_end - $time_start;
        if($add){
            $data           = [
                "status_code"   => 201,
                "message"       => "Success",
                "user"          => $input,
                "time"          => $time
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
