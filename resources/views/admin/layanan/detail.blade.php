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

@endsection

@push('script')
    <!-- JS Libraies -->
    <script src="{{ asset('assets/node-modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/node-modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/node-modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
@endpush
