@extends('layout.admin')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header bg-black"><b>Identitas</b></div>
                                        <div class="card-body">
                                            <table class="table table-sm table-striped">
                                                <tr>
                                                    <th>Nama</th>
                                                    <td>:</td>
                                                    <td>@if($users->gelar_depan !=''){{ $users->gelar_depan }}. @endif{{ $users->nama_depan }} {{ $users->nama_belakang }}@if($users->gelar_belakang !=''), {{ $users->gelar_belakang }}  @endif</td>
                                                </tr>
                                                <tr>
                                                    <th>NIK</th>
                                                    <td>:</td>
                                                    <td>{{ $users->nik }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Gender</th>
                                                    <td>:</td>
                                                    <td>{{ $users->gender }}</td>
                                                </tr>
                                                <tr>
                                                    <th>TTL</th>
                                                    <td>:</td>
                                                    <td>{{ $users->place_birth }}, {{ date('d-m-Y', strtotime($users->birth_date)) }}</td>
                                                </tr>

                                                <tr>
                                                    <th>Phone</th>
                                                    <td>:</td>
                                                    <td>{{ $users->nomor_telepon }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td>:</td>
                                                    <td>{{ $users->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>:</td>
                                                    <td>{{ $users['status_menikah'] }}</td>
                                                </tr>
                                            </table>

                                        </div>

                                    </div>

                                </div>
                                @if($users->address !=null)
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header bg-black"><b>Alamat</b></div>
                                        <div class="card-body">
                                            <table class="table table-sm table-striped">
                                                <tr>
                                                    <th>Provinsi</th>
                                                    <td>:</td>
                                                    <td>{{ $users->address['provinsi'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Kota</th>
                                                    <td>:</td>
                                                    <td>{{ $users->address['kota'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Kecamatan</th>
                                                    <td>:</td>
                                                    <td>{{ $users->address['kecamatan'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Kelurahan</th>
                                                    <td>:</td>
                                                    <td>{{ $users->address['kelurahan'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Kode Pos</th>
                                                    <td>:</td>
                                                    <td>{{ $users->address['kode_pos'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Jalan/Building</th>
                                                    <td>:</td>
                                                    <td>{{ $users->address['street'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Jenis</th>
                                                    <td>:</td>
                                                    <td>{{ $users->address['jenis_alamat'] }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>




                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('users.index') }}" class="btn btn-primary">Kembali</a>
                            <a href="{{ route('users.edit', ['id'=> $users->id]) }}" class="btn btn-success">Edit User</a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                Blokir
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h5 class="modal-title" id="exampleModalLabel">Anda yakin hapus data ini</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('users.blokir', ['id'=>$users->id]) }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <label>Input Your Password</label><br>
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Blokir</button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
    </section>
@endsection
