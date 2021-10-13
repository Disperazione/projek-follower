@extends('template.master')
@push('link')
@endpush
@section('title', 'TOP ONE PANEL | ORDER')
@section('judul', 'Order Makanan')
@section('breadcrumb')
<div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
<div class="breadcrumb-item">Order</div>
@endsection
@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">{{ __('Admin Makanan') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- <form action="{{ route('store') }}" method="post"> --}}
                    <form action="" method="post">
                        @csrf
                        <div class="row justify-content-center">
                            <label for="nama" class="label-form col-md-6 mb-3">
                                Nama Pelanggan
                                <input type="text" name="nama" id="nama" class="form-control">
                            </label>
                            <label for="nama" class="label-form col-md-5 mb-3">
                                No Telp.
                                <div class="input-group">
                                    <span class="input-group-text">+62</span>
                                    <input type="text" name="tlp" id="telp" class="form-control" maxlength="12">
                                </div>
                            </label>
                        </div>
                        <div class="row justify-content-center">
                            <label for="nama" class="label-form col-md-11 mb-3">
                                Alamat
                                <textarea name="alamat" id="alamat" class="form-control cols=" 30" rows="2"></textarea>
                            </label>
                        </div>
                        <div class="row justify-content-center">
                            <label for="nama" class="label-form col-md-11 mb-3" id="lb-1">
                                Menu
                                <select name="menu" id="menu" class="form-control">
                                    <option value="plh">Pilih satu</option>
                                    {{-- @foreach ($menu as $item)
                                        <option value="{{ $item->menu }}">{{ $item->menu }}</option>
                                    @endforeach --}}
                                </select>
                            </label>
                            <label for="" class="label-form col-md-4 d-none" id="lb-2">
                                Plus
                                <select name="plus" id="plus" class="form-control">
                                    <option>Tidak Pakai</option>
                                    {{-- @foreach ($nasi as $item)
                                        <option value="{{ $item->menu }}">+{{ $item->menu }}</option>
                                    @endforeach --}}
                                </select>
                            </label>
                        </div>
                        <div class="row justify-content-center">
                            <label for="nama" class="label-form col-md-3 mb-3">
                                Jumlah
                                <input type="number" name="qty" id="qty" class="form-control" value="0">
                            </label>
                            <label for="" class="label-form col-md-4 mb-3">
                                Harga / pcs
                                <div id="hargaw">
                                    <span class="form-control" id="">0</span>
                                    <input type="number" class="d-none" id="harga" name="harga">
                                </div>
                            </label>
                            <label for="" class="label-form col-md-4 mb-3">
                                Total Harga
                                <span class="form-control" id="ttl">0</span>
                                <input type="number" class="d-none" id="total" name="total">
                            </label>
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary col-md-11">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script>
        $(document).ready(function() {
            // $('#telp').keypress(function() {
            //     let a = $('#telp').val();
            //     if (a.length > 9) {
            //         console.log('+62' + $('#telp').val());
            //         let b = '+62' + $('#telp').val();
            //         $('#nama').val(b);
            //     }
            // })
            $('#menu').change(function() {
                let cid = $(this).val();

                $.ajax({
                    url: '/getHarga',
                    type: 'post',
                    data: 'cid=' + cid + '&_token={{ csrf_token() }}',
                    success: function(result) {
                        $('#hargaw').html(result);
                        let a = $('#qty').val();
                        let b = $('#harga').val();
                        $('#ttl').html(b * a);
                        $('#total').val(b * a);
                    },
                });

                let a = $('#menu').val();

                if (a == 'Ayam Bakar') {
                    $('#lb-1').removeClass('col-md-11');
                    $('#lb-1').addClass('col-md-7');
                    $('#lb-2').removeClass('d-none');
                } else {
                    $('#lb-1').addClass('col-md-11');
                    $('#lb-1').removeClass('col-md-7');
                    $('#lb-2').addClass('d-none');
                    $('#plus').val('Tidak Pakai');
                }
            });
            $('#plus').change(function() {
                let cid = $(this).val();

                $.ajax({
                    url: '/getPlus',
                    type: 'post',
                    data: 'cid=' + cid + '&_token={{ csrf_token() }}',
                    success: function(result) {
                        $('#hargaw').html(result);
                        let a = $('#qty').val();
                        let b = $('#harga').val();
                        $('#ttl').html(b * a);
                        $('#total').val(b * a);
                    },
                });
            });
            $('#qty').change(function() {
                let a = $('#qty').val();
                let b = $('#harga').val();
                $('#ttl').html(b * a);
                $('#total').val(b * a);
                if (a < 0) {
                    $('#qty').val(1);
                    $('#ttl').html(b * 1);
                    $('#total').val(b * 1);
                }
            });
            $('#qty').keyup(function() {
                let a = $('#qty').val();
                let b = $('#harga').val();
                $('#ttl').html(b * a);
                $('#total').val(b * a);
            });
        })
</script>
@endpush
