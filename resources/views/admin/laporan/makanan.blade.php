@extends('template.master')
@push('link')
    <link rel="stylesheet" href="{{ asset('assets/node-modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/node-modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush
@section('title', 'TOP ONE PANEL | LAPORAN')
@section('judul', 'LAPORAN')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{ route('admin.index') }}">Dashboard</a></div>
    <div class="breadcrumb-item active">Laporan</div>
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
                        @if (Auth::user()->role == 'admin')
                            <a href="{{ route('admin.export') }}" class="btn btn-success mb-3 bg-success"><i
                                    class="fas fa-file-excel"></i> Export Excel</a>
                        @else
                            <a href="{{ route('user.export') }}" class="btn btn-success mb-3 bg-success"><i
                                    class="fas fa-file-excel"></i> Export Excel</a>
                        @endif
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
                                            <td class="text-center">{{ $item->kode_transaksi }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->customer }}</td>
                                            <td class="text-center">{{ $item->menu }}</td>
                                            <td class="text-center">{{ $item->qty }}</td>
                                            <td class="text-center">Rp. {{ number_format($item->total_harga) }}</td>
                                            <td class="text-center">
                                                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Detail
                              </button> --}}
                                                <a href="" class="btn btn-primary detail" data-toggle="modal"
                                                    data-target="#exampleModal" data-detail="{{ $item->id }}">
                                                    Detail</a>

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
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>

    <script>
        $(document).ready(function() {
            var id = [];
            var kode_transaksi = [];
            var nama = [];
            var customer = [];
            var menu = [];
            var jumlah = [];
            var total_harga = [];
            var tgl = [];
            var alamat = [];
            var keterangan = [];
            var bukti_pembayaran = [];

            // nama.Push('hai');
            <?php foreach ($ordermakanan as $item): ?>
            id.push(<?php echo '"' . $item->id . '"'; ?>);
            kode_transaksi.push(<?php echo '"' . $item->kode_transaksi . '"'; ?>);
            nama.push(<?php echo '"' . $item->nama . '"'; ?>);
            customer.push(<?php echo '"' . $item->customer . '"'; ?>);
            menu.push(<?php echo '"' . $item->menu . '"'; ?>);
            jumlah.push(<?php echo '"' . $item->qty . '"'; ?>);
            total_harga.push(<?php echo '"' . $item->total_harga . '"'; ?>);
            tgl.push(<?php echo '"' . $item->created_at->format('d/F/Y') . '"'; ?>);
            alamat.push(<?php echo '"' . $item->alamat . '"'; ?>);
            keterangan.push(<?php echo '"' . $item->keterangan . '"'; ?>);
            bukti_pembayaran.push(<?php echo '"' . $item->bukti_pembayaran . '"'; ?>);
            <?php endforeach; ?>


            $('.detail').click(function() {
                let a = parseInt($(this).attr('data-detail')) - 1;
                // let b = parseInt($(this).attr('data-detail'));
                $('#exampleModalLabel').html(nama[a]);
                $('#kotra').html(': ' + kode_transaksi[a]);
                $('#customer').html(': ' + customer[a]);
                $('#pesan').html(': ' + menu[a]);
                $('#jumlah').html(': ' + jumlah[a]);
                $('#total').html(': ' + total_harga[a]);
                $('#tgl').html(': ' + tgl[a]);
                $('#alamat').html(': ' + alamat[a]);
                $('#keterangan').html(': ' + keterangan[a]);
                $('#bukti').attr('src', 'http://127.0.0.1:8000/assets/img/bukti/' +
                    bukti_pembayaran[a]);
                // $('#next').attr('data-detail', a);
                // let b = parseInt($('#next').data('detail'));
                // $('#next').click(function() {
                //     // let b = a + 1;
                //     let c = id[b];
                //     console.log(b);
                //     $('#exampleModalLabel').html(nama[c]);
                //     $('#kotra').html(': ' + kode_transaksi[c]);
                //     $('#customer').html(': ' + customer[c]);
                //     $('#pesan').html(': ' + menu[c]);
                //     $('#jumlah').html(': ' + jumlah[c]);
                //     $('#total').html(': ' + total_harga[c]);
                //     $('#tgl').html(': ' + tgl[c]);
                //     $('#alamat').html(': ' + alamat[c]);
                //     $('#keterangan').html(': ' + keterangan[c]);
                //     $('#bukti').attr('src', 'http://127.0.0.1:8000/assets/img/bukti/' +
                //         bukti_pembayaran[c]);
                //     let d = parseInt($('#next').data('detail'));
                //     $('#next').attr('data-detail', d + 1);
                // });

                // switch (a) {
                //     case a == 0:

                //         break;
                //     default:
                //         $('#prev').attr('data-detail', Number(a) - 1);
                //         break;
                // }
                // $('#next').attr('data-detail', 1);
                // console.log($('#next').data());
                // console.log($('.detail').data());
            });
        });
    </script>

    {{-- @include('admin.brain.laba') --}}
@endpush

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div>
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
                        <div class="col-8" id="kotra">
                            : 1920100
                        </div>
                        <div class="col-4">
                            Customer
                        </div>
                        <div class="col-8" id="customer">
                            : saifudin
                        </div>
                        <div class="col-4">
                            Pesanan
                        </div>
                        <div class="col-8" id="pesan">
                            : Coffe bear
                        </div>
                        <div class="col-4">
                            Jumlah
                        </div>
                        <div class="col-8" id="jumlah">
                            : 3
                        </div>
                        <div class="col-4">
                            Total Harga
                        </div>
                        <div class="col-8" id="total">
                            : 4
                        </div>
                        <div class="col-4">
                            Tanggal Pesan
                        </div>
                        <div class="col-8" id="tgl">
                            : 12 okt 2021
                        </div>
                        <div class="col-4">
                            Alamat
                        </div>
                        <div class="col-8" id="alamat">
                            : Depok
                        </div>
                        <div class="col-4">
                            Keterangan
                        </div>
                        <div class="col-8" id="keterangan">
                            : sdkj
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <img id="bukti" src="{{ asset('assets/img/bukti/1634923279444.png') }}" alt="" width="250px">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
</div>
