@extends('template.master')
@push('link')
    <link rel="stylesheet" href="{{ asset('assets/node-modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/node-modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush
@section('title', 'TOP ONE PANEL | LAYANAN')
@section('judul', 'Detail Singular.care')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{ route('admin.index') }}">Dashboard</a></div>
    <div class="breadcrumb-item active"><a href="{{ route('admin.layanan') }}">Layanan</a></div>
    <div class="breadcrumb-item">Detail</div>
@endsection
@section('main')
<div class="d-flex justify-content-center">
    <div class="card col-8">
        <div class="card-header">
            <h4>Detail Layanan</h4>
        </div>
        <div class="card-body">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Kategori</label>
                <label for="staticEmail" class="col-sm-1 col-form-label">:</label>
                <label for="staticEmail" class="col-sm-8 col-form-label">Instagram</label>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Layanan</label>
                <label for="staticEmail" class="col-sm-1 col-form-label">:</label>
                <label for="staticEmail" class="col-sm-8 col-form-label">Followers</label>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Harga/1000</label>
                <label for="staticEmail" class="col-sm-1 col-form-label">:</label>
                <label for="staticEmail" class="col-sm-8 col-form-label">40,000</label>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Min.Pesanan</label>
                <label for="staticEmail" class="col-sm-1 col-form-label">:</label>
                <label for="staticEmail" class="col-sm-8 col-form-label">100</label>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Max.Pesanan</label>
                <label for="staticEmail" class="col-sm-1 col-form-label">:</label>
                <label for="staticEmail" class="col-sm-8 col-form-label">3.000</label>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Deskripsi</label>
                <label for="staticEmail" class="col-sm-1 col-form-label">:</label>
                <label for="staticEmail" class="col-sm-8 col-form-label">
                    <ul>
                        <li>masukan target username instagram tanpa @</li>
                        <li>max db 2000</li>
                        <li>on layanan 6:00 WIB - 21:00 WIB</li>
                        <li>proses 24 - 48 jam</li>
                    </ul>
                </label>
            </div>
            <div class="card-footer" style="margin-top: -30px; margin-left: -28px;">
                <a class="btn btn-primary" href="#" role="button"><i class="fas fa-arrow-circle-left me-3"></i> Kembali</a>
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
