@extends('template.master')
@push('link')
    <link rel="stylesheet" href="{{ asset('assets/node-modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/node-modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush
@section('title', 'TOP ONE PANEL | Data Registrasi')
@section('judul', 'DataRegistrasi')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{ route('admin.index') }}">Dashboard</a></div>
    <div class="breadcrumb-item">Data Registrasi</div>
@endsection
@section('main')
<div class="card">
    <div class="card-header">
        <h4>Data Registrasi</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="{{ route('admin.adduser') }}" class="btn btn-primary mb-2">Tambah</a>
            <table class="table table-striped" id="table-1">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   
                        <tr class="text-center">
                            <td>1</td>
                            <td>admin@gmail.com</td>
                            <td>Yasir</td>
                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                        </tr>
            
                </tbody>
            </table>
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
