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
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" name="nama" value="{{ $users->nama }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>NIK</th>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="number" class="form-control form-control-sm" name="nik" value="{{ $users->nik }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Gender</th>
                                                    <td>:</td>
                                                    <td>
                                                        <select name="gender" class="form-control form-control-sm">
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                        </select>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th>Place of Birth</th>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" name="place_birth" value="{{ $users->place_birth }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Birth Date</th>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="date" class="form-control form-control-sm" name="date_birth" value="{{ $users->birth_date }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Phone</th>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="number" class="form-control form-control-sm" name="place_birth" value="{{ $users->nomor_telepon }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="email" class="form-control form-control-sm" name="email" value="{{ $users->email }}">
                                                    </td>

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
                                                    <td>
                                                        <select class="form-control form-control-sm" name="provinsi" required>
                                                            <option value="">---pilih---</option>
                                                            @foreach($provinsi as $prov)
                                                            <option value="{{ $prov->id_prov }}">{{ $prov->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
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
                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
    </section>
@endsection
