@extends('template.master')
@push('link')
    <link rel="stylesheet" href="{{ asset('assets/node-modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/node-modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush
@section('title', 'TOP ONE PANEL | Tambah Registrasi')
@section('judul', 'TambahRegistrasi')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{ route('admin.index') }}">Dashboard</a></div>
    <div class="breadcrumb-item active"><a href="{{ route('admin.regis') }}">Data User</a></div>
    <div class="breadcrumb-item">Tambah User</div>
@endsection
@section('main')
    <div class="card">
        <div class="card-header">
            <h4>Tambah User</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <form action="{{ route('admin.adduser.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                </div>
                                <input name="email" type="text"
                                    class="form-control currency @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="form-group ">
                            <button type="submit" class="btn btn-success ml-1 mt-4">Submit</button>
                        </div>


                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="far fa-id-card"></i>
                                </div>
                            </div>
                            <input name="username" type="text"
                                class="form-control currency @error('username') is-invalid @enderror"
                                value="{{ old('username') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-key"></i>
                                </div>
                            </div>
                            <input name="password" type="password"
                                class="form-control currency @error('password') is-invalid @enderror"
                                value="{{ old('password') }}">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <!-- JS Libraies -->
    <script src="{{ asset('assets/node-modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/node-modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/node-modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>

@endpush
