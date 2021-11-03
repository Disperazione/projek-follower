@extends('template.master')
@push('link')
    <link rel="stylesheet" href="{{ asset('assets/node-modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/node-modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush
@section('title', 'TOP ONE PANEL | Data Order')
@section('judul', 'DataOrder')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{ route('admin.index') }}">Dashboard</a></div>
    <div class="breadcrumb-item">Data Order</div>
@endsection
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data FootStrap</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>No Telp</th>
                                    <th>Menu</th>
                                    <th>Jumlah</th>
                                    <th>Harga Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data[1] as $id => $item)
                                    <tr>
                                        <td>{{ ++$id }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->tlp }}</td>
                                        <td>{{ $item->menu }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>Rp.{{ number_format($item->total_harga) }}</td>
                                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- data singular --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Singular</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-2">
                            <thead class="text-center">
                                <tr>
                                    <th class="text-center">NO</th>
                                    <th>Kategori</th>
                                    <th>Layanan</th>
                                    <th>Target</th>
                                    <th>Jumlah</th>
                                    <th>Total Harga</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data[0] as $id => $item)
                                    <tr>
                                        <td>{{ ++$id }}</td>
                                        <td>{{ $item->kategori }}</td>
                                        <td>{{ $item->layanan }}</td>
                                        <td>{{ $item->target }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>Rp.{{ number_format($item->total) }}</td>
                                        <td id="{{ +$id }}sts">
                                            @if ($item->status == 'proses')
                                                <div id="{{ +$id }}status"
                                                    class="badge bg-primary text-capitalize text-white"
                                                    data-id='{{ +$id }}'>
                                                    {{ $item->status }}
                                                </div>
                                            @else
                                                @if ($item->status == 'selesai')
                                                    <div id="{{ +$id }}status"
                                                        class="badge bg-success text-capitalize text-white"
                                                        data-id='{{ +$id }}'>
                                                        {{ $item->status }}
                                                    </div>
                                                @else
                                                    <div id="{{ +$id }}status"
                                                        class="badge bg-danger text-capitalize text-white"
                                                        data-id='{{ +$id }}'>
                                                        {{ $item->status }}
                                                    </div>
                                                @endif
                                            @endif
                                            <input type="hidden" name="" id="{{ +$id }}hides"
                                                value="{{ $item->status }}">
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.dataorder.singular', $item->id) }}"
                                                class="btn btn-secondary">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach

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
    <script>
        $(document).ready(function() {
            $('.badge').click(function() {
                let cid = $(this).data('id');
                let a = $('#' + cid + 'hides').val();
                console.log(a);
                if (a == 'pending' || a == 'proses') {
                    $.ajax({
                        url: '/admin/getStatus',
                        type: 'post',
                        data: 'cid=' + cid + '&cud=' + a + '&_token={{ csrf_token() }}',
                        success: function(result) {
                            $('#' + cid + 'sts').html(result);
                        },
                    });
                }
            });
        });
    </script>
    <script>
        console.log({!! json_encode($data[0][0]['id']) !!});
    </script>
@endpush
