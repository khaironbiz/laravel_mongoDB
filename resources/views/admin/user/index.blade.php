@extends('layout.admin')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><b>Daftar User</b></div>
                        <div class="card-body">
                            <table class="table table-sm" id="example1">
                                <thead>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Usia</th>
                                <th>Email</th>
                                <th>Phone</th>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ date('d', strtotime($user->birth_date))."-".date('m', strtotime($user->birth_date))."-".date('y', strtotime($user->birth_date)) }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->nomor_telepon }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
    </section>
@endsection