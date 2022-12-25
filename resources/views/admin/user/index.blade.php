@extends('layout.admin')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-black"><b>Daftar User</b></div>

                        <div class="card-body">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">
                                Add User
                            </button>
                            <table class="table table-sm mt-2" id="example1">
                                <thead>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Usia</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Aksi</th>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ date('d', strtotime($user->birth_date))."-".date('m', strtotime($user->birth_date))."-".date('y', strtotime($user->birth_date)) }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->nomor_telepon }}</td>
                                        <td>
                                            <a href="{{ route('users.show', ['id' => $user->id]) }}" class="btn btn-sm btn-info">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('users.create') }}" method="post">
                                            <div class="modal-body">
                                                @csrf
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Nama</label>
                                                    <div class="col-sm-5 mt-1">
                                                        <input type="text" class="form-control" placeholder="nama depan" name="nama_depan">
                                                    </div>
                                                    <div class="col-sm-5 mt-1">
                                                        <input type="text" class="form-control" placeholder="nama belakang" name="nama_belakang">
                                                    </div>
                                                </div>
                                                <div class="row mt-1">
                                                    <label class="col-sm-2 col-form-label">Gelar</label>
                                                    <div class="col-sm-5 mt-1">
                                                        <input type="text" class="form-control" placeholder="gelar depan" name="gelar_depan">
                                                    </div>
                                                    <div class="col-sm-5 mt-1">
                                                        <input type="text" class="form-control" placeholder="gelar belakang" name="gelar_belakang">
                                                    </div>
                                                </div>
                                                <div class="row mt-1">
                                                    <label class="col-sm-2 col-form-label">Gender / NIK</label>
                                                    <div class="col-sm-5 mt-1">
                                                        <select class="form-control" required name="gender">
                                                            <option value="">---select one---</option>
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-5 mt-1">
                                                        <input type="number" class="form-control" placeholder="nik" name="nik">
                                                    </div>
                                                </div>
                                                <div class="row mt-1">
                                                    <label class="col-sm-2 col-form-label">TTL</label>
                                                    <div class="col-sm-5 mt-1">
                                                        <input type="text" class="form-control" placeholder="tempat lahir" name="place_birth">
                                                    </div>
                                                    <div class="col-sm-5 mt-1">
                                                        <input type="date" class="form-control" name="birth_date">
                                                    </div>
                                                </div>
                                                <div class="row mt-1">
                                                    <label class="col-sm-2 col-form-label">Contact</label>
                                                    <div class="col-sm-5 mt-1">
                                                        <input type="number" class="form-control" placeholder="phone" name="nomor_telepon">
                                                    </div>
                                                    <div class="col-sm-5 mt-1">
                                                        <input type="email" class="form-control" placeholder="email" name="email">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
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
