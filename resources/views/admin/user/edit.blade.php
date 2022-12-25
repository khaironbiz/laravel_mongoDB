@extends('layout.admin')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form action="{{ route('users.update', ['id' => $users->id]) }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header bg-success"><b>Identitas {{ $users->nama }}</b></div>
                                            <div class="card-body">
                                                <table class="table table-sm table-striped">
                                                    <tr>
                                                        <th>Nama Depan</th>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" class="form-control form-control-sm" name="nama_depan" value="{{ $users->nama_depan }}">
                                                            @error('name')
                                                            <small class="text-danger">{{$message}}</small>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nama Belakang</th>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" class="form-control form-control-sm" name="nama_belakang" value="{{ $users->nama_belakang }}">
                                                            @error('name')
                                                            <small class="text-danger">{{$message}}</small>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Gelar Depan</th>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" class="form-control form-control-sm" name="gelar_depan" value="{{ $users->gelar_depan }}">
                                                            @error('name')
                                                            <small class="text-danger">{{$message}}</small>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Gelar Belakang</th>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" class="form-control form-control-sm" name="gelar_belakang" value="{{ $users->gelar_belakang }}">
                                                            @error('name')
                                                            <small class="text-danger">{{$message}}</small>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>NIK</th>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" class="form-control form-control-sm" name="nik" value="{{ $users->nik }}">
                                                            @error('nik')
                                                            <small class="text-danger">{{$message}}</small>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Gender</th>
                                                        <td>:</td>
                                                        <td>
                                                            <select name="gender" class="form-control form-control-sm">
                                                                <option value="">---pilih---</option>
                                                                <option value="male" @if($users->gender == "male") selected @endif>Male</option>
                                                                <option value="female" @if($users->gender == "female") selected @endif>Female</option>
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
                                                            <input type="date" class="form-control form-control-sm" name="birth_date" value="{{ $users->birth_date }}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Status Pernikahan</th>
                                                        <td>:</td>
                                                        <td>
                                                            <select class="form-control form-control-sm" name="status_menikah">
                                                                <option value="">---pilih---</option>
                                                                <option value="belum menikah">Belum Menikah</option>
                                                                <option value="menikah">Menikah</option>
                                                                <option value="cerai hidup">Cerai Hidup</option>
                                                                <option value="cerai mati">Cerai Mati</option>

                                                            </select>
                                                        </td>
                                                    </tr>

                                                </table>

                                            </div>

                                        </div>

                                    </div>
                                    @if($users->address)
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header bg-success"><b>Alamat</b></div>
                                            <div class="card-body">
                                                <table class="table table-sm table-striped">
                                                    <tr>
                                                        <th>Jenis Alamat</th>
                                                        <td>:</td>
                                                        <td>
                                                            <select class="form-control form-control-sm" name="jenis_alamat">
                                                                <option value="">---pilih---</option>
                                                                <option value="rumah">Rumah</option>
                                                                <option value="kontrakan">Kontrakan Sementara</option>
                                                                <option value="kantor">Kantor</option>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Provinsi</th>
                                                        <td>:</td>
                                                        <td>
                                                            <select class="form-control form-control-sm" name="provinsi" required>
                                                                <option value="">---pilih---</option>
                                                                @foreach($provinsi as $prov)
                                                                    <option value="{{ $prov->id_prov }}" @if($prov->id_prov == $users->address['provinsi']) selected @endif>{{ $prov->nama }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <th>Kota</th>
                                                        <td>:</td>
                                                        <td>
                                                            <select class="form-control form-control-sm" name="kota">
                                                                <option value="">---pilih---</option>
                                                                @foreach($provinsi as $prov)
                                                                    <option value="{{ $prov->id_prov }}">{{ $prov->nama }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Kecamatan</th>
                                                        <td>:</td>
                                                        <td>
                                                            <select class="form-control form-control-sm" name="kecamatan">
                                                                <option value="">---pilih---</option>
                                                                @foreach($provinsi as $prov)
                                                                    <option value="{{ $prov->id_prov }}">{{ $prov->nama }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Kelurahan</th>
                                                        <td>:</td>
                                                        <td>
                                                            <select class="form-control form-control-sm" name="kelurahan">
                                                                <option value="">---pilih---</option>
                                                                @foreach($provinsi as $prov)
                                                                    <option value="{{ $prov->id_prov }}">{{ $prov->nama }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Kode Pos</th>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="number" name="kode_pos" class="form-control form-control-sm" value="{{ $users->address['kode_pos'] }}">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Jalan/Building</th>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" name="street" class="form-control form-control-sm" value="{{ $users->address['street'] }}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Phone</th>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="number" class="form-control form-control-sm" name="nomor_telepon" value="{{ $users->nomor_telepon }}">
                                                            @error('phone')
                                                            <small class="text-danger">{{$message}}</small>
                                                            @enderror
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
                                    @endif
                                </div>




                            </div>
                            <div class="card-footer text-center">
                                <a href="{{ route('users.show', ['id'=>$users->id]) }}" class="btn btn-danger">Kembali</a>
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
    </section>
@endsection
