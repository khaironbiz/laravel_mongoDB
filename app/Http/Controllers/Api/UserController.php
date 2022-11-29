<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user   = User::where('email','anisa.fitri@gmail.comm');
        $count  = $user->count();
        $data   = $user->limit(10)->get();
        return response()->json([
            "status"        => "success",
            "status_code"   => 200,
            "time"          => time(),
            "count"         => $count,
            "data"          => $data,
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator              = Validator::make($request->all(), [
            'nama_depan'        => 'required',
            'nama_belakang'     => 'required',
            'email'             => 'required|unique:users,email|email',
            'hp'                => 'required|unique:users,nomor_telepon|numeric',
        ]);
        $data_chat              = $request->all();
        $data_chat['_id']        = time().random_int(10000,99999);
        if ($validator->fails()){
            return response()->json([
                "error"     => $validator->errors(),
                "created"   => time(),
                "data"      => $data_chat
            ],203);
        }
        $users = new User();
        $add = $users->create([
            'name'      => $request->nama_depan,
            'email'     => $request->email,
            'password'     => bcrypt('password')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        return response()->json([
            "status"        => "success",
            "status_code"   => 200,
            "time"          => time(),
            "data"          => $user
        ],200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = [
            'email'     => 'required|email',
            'name'      => 'required'
        ];
        $validator = Validator::make($request->all(),$data);
        if ($validator->fails()){
            return response()->json([
                "error"     => $validator->errors(),
                "created"   => time(),
                "data"      => $request->all()
            ],203);
        }

        if( !$user){
            return response()->json([
                'message'   => 'Not Found',
                'code'      => 404
            ],404);
        }
        $update = $user->update($request->all());
        return response()->json([
            'message'   => 'Success',
            'code'      => 200,
            'update'    => $update,
            'data'      => User::find($user->id)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $delete=$user->delete();
        if($delete){
            return response()->json([
               'status' => 'sccess',
               'status_code'=>200,
               'data'=>$user
            ]);
        }
    }
}
