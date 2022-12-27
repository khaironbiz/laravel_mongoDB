@extends('layout.admin')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="row mt-2 justify-content-center">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header bg-dark"><b>Create Master {{ $title }}</b></div>
                                    <form action="{{ route('marital_status.store') }}" method="post">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row mb-1">
                                                <label class="col-sm-2">System</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="system">
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <label class="col-sm-2">Marital Status</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="marital_status">
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <label class="col-sm-2">Code</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="code">
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <label class="col-sm-2">Deskripsi</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="description">
                                                </div>
                                            </div>

                                        </div>
                                        <diV class="card-footer">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </diV>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
    </section>
@endsection
