<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'                => $this->_id,
            'nama_depan'        => $this->nama_depan,
            'nama_belakang'     => $this->nama_belakang,
            'nama'              => $this->nama,
            'place_birth'       => $this->place_birth,
            'birth_date'        => $this->birth_date,
            'gender'            => $this->gender,
            'username'          => $this->username,
            'nik'               => $this->nik,
            'email'             => $this->email,
            'nomor_telepon'     => $this->nomor_telepon,
            'foto'              => $this->foto,
            'address'           => $this->address,
            'health_overview'   => $this->health_overview,
        ];
    }
}
