@extends('template.master')
@push('link')
    <link rel="stylesheet" href="{{ asset('assets/node-modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/node-modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush
@section('title', 'TOP ONE PANEL | DASHBOARD')
@section('judul', 'DASHBOARD')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{ route('admin.index') }}">Dashboard</a></div>
@endsection
@section('main')
    {{-- laporan makanan --}}
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Laporan/Bulan food.strap</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped text-center" id="table-3">
                    <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th>Menu</th>
                        <th>Kategori</th>
                        <th>November/2021</th>
                        <th>December/2021</th>
                        <th>Januari/2022</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Cofee Beer</td>
                        <td>Minuman</td>
                        <td>10</td>
                        <td>0</td>
                        <td>0</td>
                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Kebab</td>
                        <td>Makanan</td>
                        <td>20</td>
                        <td>0</td>
                        <td>0</td>
                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    {{-- laporan makanan --}}
@endsection

@push('script')
    <!-- JS Libraies -->
    <script src="{{ asset('assets/node-modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/node-modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/node-modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
    <script src="{{asset('assets/js/page/modules-datatables.js')}}"></script>

    {{--   --}}
@endpush
