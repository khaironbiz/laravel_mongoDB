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
                                                    <td>{{ $users->nama }}</td>
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
                                                    <th>Place of Birth</th>
                                                    <td>:</td>
                                                    <td>{{ $users->place_birth }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Birth Date</th>
                                                    <td>:</td>
                                                    <td>{{ $users->birth_date }}</td>
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
                                            </table>

                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header bg-black"><b>Alamat</b></div>
                                        <div class="card-body">
                                            <table class="table table-sm table-striped">
                                                <tr>
                                                    <th>Provinsi</th>
                                                    <td>:</td>
                                                    <td>{{ $users->address }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Kota</th>
                                                    <td>:</td>
                                                    <td>{{ $users->address }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Kecamatan</th>
                                                    <td>:</td>
                                                    <td>{{ $users->address }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Kelurahan</th>
                                                    <td>:</td>
                                                    <td>{{ $users->address }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Kode Pos</th>
                                                    <td>:</td>
                                                    <td>{{ $users->address }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Jalan/Building</th>
                                                    <td>:</td>
                                                    <td>{{ $users->address }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>:</td>
                                                    <td>{{ $users->address }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>




                        </div>
                        <div class="card-footer">
                            <a href="{{ route('users.edit', ['id'=> $users->id]) }}" class="btn btn-success">Edit User</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
    </section>
@endsection
