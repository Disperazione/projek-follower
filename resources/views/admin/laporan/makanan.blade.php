@extends('template.master')
@push('link')
    <link rel="stylesheet" href="{{ asset('assets/node-modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/node-modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush
@section('title', 'TOP ONE PANEL | LAPORAN')
@section('judul', 'LAPORAN')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{ route('admin.index') }}">Laporan</a></div>
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
                        <th>Kode Transaksi</th>
                        <th>Nama Siswa</th>
                        <th>Customer</th>
                        <th>Pesanan</th>
                        <th>Jumlah Pesan</th>
                        <th>Total Harga</th>
                        <th>Action</th>
                       </tr>
                    </thead>
                    <tbody>
                      @foreach ($ordermakanan as $item)
                          <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">1920{{ $item->id }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nama }}</td>
                            <td class="text-center">{{ $item->menu }}</td>
                            <td class="text-center">{{ $item->qty }}</td>
                            <td class="text-center">Rp. {{ number_format($item->total_harga) }}</td>
                            <td class="text-center" >
                              {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Detail
                              </button> --}}
                              <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Detail</a>
                              
                            </td>
                          </tr>
                      @endforeach
                      
                      {{-- <tr>
                        @for ($i = 0; $i < count($ordermakanan); $i++)
                            <tr>
                            <td class="text-center">{{ $i+1 }}</td>
                            <td>{{ Carbon\Carbon::parse($ordermakanan[$i]['tgl'])->isoFormat("D MMMM Y") }}</td>
                            <td class="text-center">{{ $ordermakanan[$i]['jumlahsiswa'] }}</td>
                            <td class="text-center">{{ $ordermakanan[$i]['qty'] }}</td>
                            <td class="text-center">Rp. {{ number_format($ordermakanan[$i]['total']) }}</td>
                            
                            </tr>
                        @endfor
                      </tr> --}}
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

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title border-bottom" id="exampleModalLabel">Nama Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-4">
            Kode Transaksi  
          </div>
          <div class="col-8">
            : 1920100 
          </div>
          <div class="col-4">
            Customer  
          </div>
          <div class="col-8">
            : saifudin
          </div>
          <div class="col-4">
            Pesanan
          </div>
          <div class="col-8">
            : Coffe bear
          </div>
          <div class="col-4">
            Jumlah
          </div>
          <div class="col-8">
            : 3
          </div>
          <div class="col-4">
            Total Harga
          </div>
          <div class="col-8">
            : 4
          </div>
          <div class="col-4">
            Tanggal Pesan
          </div>
          <div class="col-8">
            : 12 okt 2021
          </div>
          <div class="col-4">
            Alamat
          </div>
          <div class="col-8">
            : Depok
          </div>
        </div>
        <hr>
        <div class="text-center">
          <img src="{{ asset('assets/img/bukti/1634923279444.png') }}" alt="" width="250px" >
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
      </div>
    </div>
  </div>
</div>