@extends('template.master')
@push('link')
    <link rel="stylesheet" href="{{ asset('assets/node-modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/node-modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush
@section('title', 'TOP ONE PANEL | LAYANAN')
@section('judul', 'Layanan')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{ route('admin.index') }}">Dashboard</a></div>
    <div class="breadcrumb-item">Layanan</div>
@endsection
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Layanan</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead class="text-center">
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>Layanan</th>
                                    <th>Harga/1000</th>
                                    <th>Min.Pesan</th>
                                    <th>Maks.Pesan</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Facebook Followers S1</td>
                                    <td>Rp 40.000</td>
                                    <td>100</td>
                                    <td>10.000</td>
                                    <td>
                                        <ul>
                                            <li>Masukan target link akun facebook dari web browser</li>
                                            <li>Jangan diprivate selagi proses</li>
                                            <li>No refill</li>
                                            <li>Proses 1 x 24 jam</li>
                                        </ul>
                                    </td>
                                    <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Facebook Profile Follower [Non Drop]</td>
                                    <td>Rp 77.000</td>
                                    <td>50</td>
                                    <td>500</td>
                                    <td>
                                        <ul>
                                            <li>Masukan target link profile</li>
                                            <li>Max 1 x 24 jam</li>
                                            <li>Refill 30 hari</li>
                                        </ul>
                                    </td>
                                    <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
