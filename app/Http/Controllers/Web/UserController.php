<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\StoreUserRequest;
use App\Http\Requests\user\UpdateUserRequest;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('nama', 'ASC')->get();
        $data = [
            "title"     => "Daftar User",
            "class"     => "User",
            "sub_class" => "Get All",
            "content"   => "layout.admin",
            "users"     => $users,
        ];
        return view('admin.user.index', $data);
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
    public function store(StoreUserRequest $request)
    {
        $validator  = $request->validated();
        $users      = new User();
        $create     = $users->create($validator);
        if($create){
            return redirect()->route('users.index');
        }
        dd($validator);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $data = [
            "title"     => "Detail User",
            "class"     => "User",
            "sub_class" => "Get All",
            "content"   => "layout.admin",
            "users"     => $user,
        ];
        return view('admin.user.show', $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
//        $user_json = json_encode($user);
//        return $user_json;

        $provinces= Province::orderBy('nama')->get();
        $data = [
            "title"     => "Edit User",
            "class"     => "User",
            "sub_class" => "Get All",
            "content"   => "layout.admin",
            "users"     => $user,
            "provinsi"  => $provinces,
        ];
        return view('admin.user.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $users      = User::find($id);
        $data       = $request->validated();
        $data['nama']= $request->gelar_depan.". ".$request->nama_depan." ".$request->nama_belakang.", $request->gelar_belakang";
        $data['address']=[
            'jenis_alamat'  => $request->jenis_alamat,
            'street'        => $request->street,
            'kelurahan'     => $request->kelurahan,
            'kecamatan'     => $request->kecamatan,
            'kota'          => $request->kota,
            'provinsi'      => $request->provinsi,
            'kode_pos'      => $request->kode_pos,
        ];
        $update     = $users->update($data);
        if($update){
            return redirect()->route('users.index');
        }

    }
    public function blokir(Request $request, $id)
    {
        $users      = User::find($id);
        $setuju     = $request->setuju;
        $update     = $users->update(['blokir' => 'Y']);
        if($update){
            return redirect()->route('users.index');

        }

    }
    public function null(){
        $users = User::where('address', NULL)->first();
        $user_id = $users->id;
        $update = $users->update(['address' =>
        [
            'provinisi'     => '',
            'kota'          => '',
            'kecamatan'     => '',
            'kelurahan'     => '',
            'street'        => '',
            'rt'            => '',
            'rw'            => '',
            'kode_pos'      => '',
            'jenis_alamat'  => ''
        ]
        ]);
        if($update){
            return redirect()->route('users.null');
        }
    }
    public function kode($properti, $value)
    {
        $users = User::where($properti,'like', "%$value%")->orderBy('nama_depan')->get();
        $data = [
            "title"     => "Daftar User",
            "class"     => "User",
            "sub_class" => "Get All",
            "content"   => "layout.admin",
            "users"     => $users,
        ];
        return view('admin.user.index', $data);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $destroy = $users->destroy();
        if($destroy){
            return redirect()->route('users.index');
        }
    }
}
