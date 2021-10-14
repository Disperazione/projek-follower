@extends('template.master')
@push('link')
@endpush
@section('title', 'TOP ONE PANEL | ORDER')
@section('judul', 'Order Makanan')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{ route('admin.index') }}">Dashboard</a></div>
    <div class="breadcrumb-item">Order</div>
@endsection
@section('main')
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-4 pb-5 pt-5">
                    {{-- <form action="{{ route('store') }}" method="post"> --}}
                    <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-center">
                            <label for="bukti" class="label-form col-md-2 mb-3">
                                <img src="{{ asset('assets/img/camera-lg.png') }}" alt="ss" srcset=""
                                    style="width: 90px; height: 80px;">
                                <input type="file" name="bukti" id="bukti" class="d-none">
                            </label>
                            <label for="nama" class="label-form col-md-5 mb-3">
                                Nama Pelanggan
                                <input type="text" name="nama" id="nama" class="form-control">
                            </label>
                            <label for="nama" class="label-form col-md-4 mb-3">
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
                        <div class="row justify-content-center d-none" id="pre">
                            <div class="alert alert-info alert-dismissible show fade col-md-11">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    <i class="fas fa-exclamation pr-2"></i> Hanya untuk Preorder 1 - 4 Hari.
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <label for="nama" class="label-form col-md-11 mb-3 lb-1">
                                Menu
                                <select name="menu" id="menu" class="form-control">
                                    <option value="plh">Pilih satu</option>
                                    @if (\Carbon\Carbon::now()->format('l') == 'Saturday')
                                        @foreach ($satdim as $item)
                                            <option value="{{ $item->menu }}">{{ $item->menu }}</option>
                                        @endforeach
                                    @else
                                        @foreach ($menu as $item)
                                            <option value="{{ $item->menu }}">{{ $item->menu }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </label>
                            <label for="" class="label-form col-md-4 d-none" id="lb-2">
                                Plus
                                <select name="plus" id="plus" class="form-control">
                                    <option>Tidak Pakai</option>
                                    @foreach ($nasi as $item)
                                        <option value="{{ $item->menu }}">+{{ $item->menu }}</option>
                                    @endforeach
                                </select>
                            </label>
                            <label for="" class="label-form col-md-4 d-none" id="lb-3">
                                Varian
                                <select name="varian" id="varian" class="form-control">
                                    <option>Pilih satu</option>
                                    <option value="Wortel">Wortel</option>
                                    <option value="Ayam">Ayam</option>
                                    <option value="Udang">Udang</option>
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
                        <div class="row justify-content-center mt-3">
                            <div class="col-md-10"></div>
                            <button type="submit" class="btn btn-primary col-md-1">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
                        $('#ttl').html(new Intl.NumberFormat().format(b * a));
                        $('#total').val(b * a);
                    },
                });

                let a = $('#menu').val();

                if (a == 'Ayam Bakar') {
                    $('.lb-1').removeClass('col-md-11');
                    $('.lb-1').addClass('col-md-7');
                    $('#lb-2').removeClass('d-none');
                    $('#varian').val('Pilih satu');
                    $('#lb-3').addClass('d-none');
                } else if (a == 'Dimsum') {
                    $('.lb-1').addClass('col-md-11');
                    $('.lb-1').removeClass('col-md-7');
                    $('#lb-2').addClass('d-none');
                    $('#plus').val('Tidak Pakai');
                    $('.lb-1').removeClass('col-md-11');
                    $('.lb-1').addClass('col-md-7');
                    $('#lb-3').removeClass('d-none');
                } else {
                    $('.lb-1').addClass('col-md-11');
                    $('.lb-1').removeClass('col-md-7');
                    $('#lb-3').addClass('d-none');
                    $('#lb-2').addClass('d-none');
                    $('#varian').val('Pilih satu');
                    $('#plus').val('Tidak Pakai');
                }

                switch (a) {
                    case 'Cofee Beer':
                        $('#pre').removeClass('d-none');
                        break;
                    case 'Sarsaparila':
                        $('#pre').removeClass('d-none');
                        break;
                    case 'Temulawak':
                        $('#pre').removeClass('d-none');
                        break;

                    default:
                        $('#pre').addClass('d-none');
                        break;
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
                        $('#ttl').html(new Intl.NumberFormat().format(b * a));
                        $('#total').val(b * a);
                    },
                });
            });
            $('#qty').change(function() {
                let a = $('#qty').val();
                let b = $('#harga').val();
                $('#ttl').html(new Intl.NumberFormat().format(b * a));
                $('#total').val(b * a);
                if (a < 0) {
                    $('#qty').val(1);
                    $('#ttl').html(new Intl.NumberFormat().format(b * 1));
                    $('#total').val(b * 1);
                }
            });
            $('#qty').keyup(function() {
                let a = $('#qty').val();
                let b = $('#harga').val();
                $('#ttl').html(new Intl.NumberFormat().format(b * a));
                $('#total').val(b * a);
            });
        })
    </script>
@endpush
