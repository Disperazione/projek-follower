@extends('template.master')
@push('link')
    <link rel="stylesheet" href="{{ asset('assets/node-modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/node-modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush
@section('title', 'TOP ONE PANEL | Data Registrasi')
@section('judul', 'Detail User')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{ route('admin.index') }}">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="{{ route('admin.regis') }}">Data Registrasi</a></div>
    <div class="breadcrumb-item">Detail User</div>
@endsection
@section('main')
    <div class="card">
        <div class="card-header">
            <h4>Detail User</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.regis.detail.update', $data->user_id) }}" method="post">
                @csrf
                @if ($errors->any())
                    @php
                        notify()->error('Operasi Ilegal', 'Error', 'bottomRight');
                    @endphp
                @endif
                <div class="row">
                    <label for="" class="form-label col-md-4 mb-4">
                        Username
                        <input type="text" value="{{ $data->nama }}" name="nama" class="form-control"></input>
                    </label>
                    <label for="" class="form-label col-md-4 mb-4">
                        E-mail
                        <span class="form-control">{{ $data->email }}</span>
                    </label>
                    <label for="" class="form-label col-md-4 mb-4">
                        Password
                        <input type="password" class="form-control" name="password"></input>
                    </label>
                </div>
                <div class="row">
                    <label for="" class="form-label col-md-3 mb-4">
                        No. telp
                        <input type="text" value="{{ $data->no_hp }}" name="no_hp" class="form-control"></input>
                    </label>
                    <label for="" class="form-label col-md-2 mb-4">
                        Saldo
                        <input type="number" value="{{ $data->saldo }}" name="saldo" class="form-control"></input>
                    </label>
                    <label for="" class="form-label col-md-7 mb-4">
                        Alamat
                        <textarea class="form-control" name="alamat" id="">{{ $data->alamat }}</textarea>
                    </label>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <em class="text-danger">*kosongkan agar data tidak berubah</em>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <a href="{{ route('admin.regis') }}" class="btn btn-success">Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <button type="submit" class="btn btn-primary ml-4">Perbarui</button>
                    </div>
                </div>
            </form>
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
