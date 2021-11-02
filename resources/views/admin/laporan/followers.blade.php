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
                  <table class="table table-striped " id="table-1">
                    <thead class="text-center">
                      <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Jumlah Pesanan</th>
                        <th>Total Pendapatan</th>
                       </tr>
                    </thead>
                    <tbody>
                      
                        @foreach ($order as $item)
                            <tr>
                              <td class="text-center">{{ $loop->iteration }}</td>
                              <td class="text-center">{{ Carbon\Carbon::parse($item->tgl)->isoFormat("D MMMM Y") }}</td>
                              <td class="text-center">{{ $item->jumlah }}</td>
                              <td class="text-center">{{ number_format($item->total) }}</td>
                            </tr>
                        @endforeach
                     
                      {{-- <tr class="bg-light text-center">
                        <td colspan="2" >Total</td>
                        <td>{{ $siswa}}</td>
                        <td>{{ $qty}}</td>
                        <td>Rp. {{ number_format($total)}}</td>
                      </tr> --}}
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

    {{-- @include('admin.brain.laba') --}}
@endpush