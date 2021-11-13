@extends('template.master')
@push('link')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endpush
@section('title', 'TOP ONE PANEL | ORDER')
@section('judul', 'Order Makanan')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{ route('admin.index') }}">Dashboard</a></div>
    <div class="breadcrumb-item">Order</div>
@endsection
@section('main')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-4 pb-5 pt-5">
                <form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-center">
                        <label for="bukti" class="label-form col-md-2 mb-3 mt-3">
                            <img src="{{ asset('assets/img/camera-lg.png') }}" alt="ss" srcset=""
                                style="width: 90px; height: 80px;" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Bukti Pembayaran">
                            <input type="file" name="bukti" id="bukti" class="d-none">
                        </label>
                        <label for="nama" class="label-form col-md-5 mb-3 mt-3">
                            Nama Kasir
                            <span class="form-control text-capitalize">{{ Auth::user()->name }}</span>
                            <input class="d-none" type="text" name="nama" id="nama"
                                value="{{ Auth::user()->name }}">
                        </label>
                        <label for="nama" class="label-form col-md-4 mb-3 mt-3">
                            No Telp.
                            <div class="input-group">
                                <span class="input-group-text">+62</span>
                                <input type="text" name="tlp" id="telp" class="form-control" maxlength="12">
                            </div>
                        </label>
                    </div>
                    <div class="row justify-content-center">
                        <label for="nama" class="label-form col-md-4 mb-3">
                            Customer
                            <input type="text" name="customer" id="" class="form-control">
                        </label>
                        <label for="nama" class="label-form col-md-7 mb-3">
                            Alamat
                            <textarea name="alamat" id="alamat" class="form-control" cols=" 30" rows="2"></textarea>
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
                            {{-- <select class="selectpicker" multiple data-actions-box="true">
                                <option>Mustard</option>
                                <option>Ketchup</option>
                                <option>Relish</option>
                            </select> --}}

                            <select name="menu[]" id="menu" multiple class="selectpicker" data-live-search="true" multiple
                                title="Pilih menu" data-style="form-control" data-width="100%">
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
                            Jumlah/menu
                            <div id="lbh">
                                <input type="number" name="qty" id="qty" class="form-control" value="0">
                            </div>
                            {{-- @php
                                use App\Models\Menu;
                                $menu = Menu::whereIn('Menu', ['Temulawak', 'Ayam Bakar'])->get();
                                // dd($menu);
                                $harga = 0;
                                foreach ($menu as $item) {
                                    $harga += $item->harga;
                                }
                            @endphp --}}
                        </label>
                        <label for="" class="label-form col-md-4 mb-3">
                            Sub Total
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
                        <label for="nama" class="label-form col-md-11 mb-2">
                            Keterangan <span class="text-danger">(<em>Dimsum 1,Burger 1</em>)</span>
                            <textarea name="keterangan" id="" cols="30" rows="5" class="form-control h-50"></textarea>
                        </label>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10"></div>
                        <button type="submit" class="btn btn-primary col-md-1">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
    <script>
        $('.selectpicker').selectpicker();
    </script>
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
                        console.log(result);
                        let a = $('#qty').val();
                        let b = $('#harga').val();
                        $('#ttl').html(new Intl.NumberFormat().format(b * a));
                        $('#total').val(b * a);
                    },
                });

                let a = $('#menu').val();
                if (a.length > 1) {
                    $('#lbh').html('<span class="form-control" id="qty">0</span>')
                }

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
    <!-- Latest compiled and minified JavaScript -->
@endpush
