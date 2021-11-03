@extends('template.master')
@push('link')
@endpush
@section('title', 'TOP ONE PANEL | DASHBOARD')
@section('judul', 'DASHBOARD')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{ route('admin.index') }}">Dashboard</a></div>
@endsection
@section('main')
    <div class="section-body">
        @if (Auth::user()->role == 'admin')
            <div class="row">
                <div class="col-lg-6 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card-stats-items mt-4 mb-4">
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">{{ $pesanan[0] }}</div>
                                    <div class="card-stats-item-label"
                                        style="border: 3px solid #fc544b; border-width: 0 0 3px 0">
                                        Pending</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">{{ $pesanan[1] }}</div>
                                    <div class="card-stats-item-label"
                                        style="border: 3px solid #6777ef; border-width: 0 0 3px 0">Proses</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">{{ $pesanan[2] }}</div>
                                    <div class="card-stats-item-label"
                                        style="border: 3px solid #47c363; border-width: 0 0 3px 0">Selesai</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-icon shadow-primary bg-primary">
                                    <i class="fas fa-shopping-bag"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total Order</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $pesanan[3] }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-icon shadow-success bg-success">
                                    <i class="fas fa-vote-yea"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Pemasukan</h4>
                                    </div>
                                    <div class="card-body">
                                        @if ($pesanan[6] >= 1000)
                                            {{ number_format($pesanan[6] / 1000) }}K
                                        @else
                                            {{ number_format($pesanan[6]) }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-icon shadow-danger bg-danger">
                                    <i class="fas fa-money-bill-wave"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Pengluaran</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ number_format(100) }}K
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-icon shadow-warning bg-warning">
                                    <i class="fas fa-coins"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Keuntungan</h4>
                                    </div>
                                    <div class="card-body" id="qw">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon shadow-danger bg-danger">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Order @food.strap</h4>
                            </div>
                            <div class="card-body">
                                {{ $pesanan[5] }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon shadow-warning bg-warning">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Order @singular.care</h4>
                            </div>
                            <div class="card-body">
                                {{ $pesanan[4] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (Auth::user()->role == 'user')
            {{-- ORDER --}}
            <section id="contact">
                <div class="row order">
                    <div class="col-sm-7">
                        <div class="card card-effect">
                            <div class="card-header">
                                <i class="fas fa-shopping-cart mr-2"></i> Pesan Baru
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="mt-4 pb-5">
                                        @if ($errors->any())
                                            @php
                                                notify()->error('Operasi Illegal', 'Error', 'topCenter');
                                            @endphp
                                        @endif
                                        <form action="{{ route('admin.user.store') }}" method="post" enctype=""
                                            id="form">
                                            @csrf
                                            <div class="alert alert-warning col-12" role="alert">
                                                <i class="fas fa-exclamation-triangle mr-2"></i>
                                                Sebelum mengisi form pastikan Anda sudah membaca Informasi yang terletak di
                                                kanan form.
                                            </div>
                                            <div class="row justify-content-center mb-1">
                                                <label for="ketgori" class="label-form col-md-12 mb-3">
                                                    Kategori
                                                    <select name="kategori" id="kategori" class="form-control">
                                                        <option value="plh">--Pilih satu--</option>
                                                        <option value="Instagram">Instagram</option>
                                                        <option value="Tiktok">Tiktok</option>
                                                        <option value="Shopee">Shopee</option>
                                                    </select>
                                                </label>
                                            </div>
                                            <div class="row justify-content-center mb-1">
                                                <label for="layanan" class="label-form col-md-12 mb-3">
                                                    Layanan
                                                    <select name="layanan" id="layanan" class="form-control">
                                                        <option value="plh">--Pilih satu--</option>
                                                    </select>
                                                </label>
                                            </div>
                                            <div class="row justify-content-center mb-1">
                                                <label for="deks" class="label-form col-md-12 mb-3">
                                                    Deskripsi Layanan
                                                    <div id="desk">
                                                        <span class="form-control" id="des">-</span>
                                                        <input type="number" class="d-none" id="" name="">
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="row justify-content-center">
                                                <label for="" class="label-form col-md-4 mb-3">
                                                    Minimal Pesan
                                                    <div id="min">
                                                        <span class="form-control" id="mip">0</span>
                                                        <input type="number" class="d-none" id="mimps" name="">
                                                    </div>
                                                </label>
                                                <label for="" class="label-form col-md-4 mb-3">
                                                    Maksimal Pesan
                                                    <div id="max">
                                                        <span class="form-control" id="mkp">0</span>
                                                        <input type="number" class="d-none" id="mkps" name="">
                                                    </div>
                                                </label>
                                                <label for="" class="label-form col-md-4 mb-3">
                                                    Harga/1000
                                                    <div id="hargak">
                                                        <span class="form-control" id="hargaks">0</span>
                                                        <input type="number" class="d-none" id="hargk"
                                                            name="hargaperk">
                                                        <input type="number" class="d-none" id="realpr" value="">
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="row justify-content-center mb-3">
                                                <label for="" class="label-form col-md-12 mb-1">
                                                    Target
                                                    <textarea name="target" id="" class="form-control" cols=" 30"
                                                        rows="1"></textarea>
                                                </label>
                                            </div>
                                            <div class="row justify-content-center">
                                                <label for="" class="label-form col-md-6 mb-3">
                                                    Jumlah
                                                    <input type="number" class="form-control" id="jumlah" name="jumlah">
                                                </label>
                                                <label for="" class="label-form col-md-6 mb-3">
                                                    Total Harga
                                                    <span class="form-control" id="ttl">0</span>
                                                    <input type="number" class="d-none" id="total" name="total">
                                                </label>
                                            </div>
                                        </form>
                                        <div class="row mt-3 modal-footer">
                                            <button type="button" class="btn btn-success col-md-2"
                                                onclick="valid()">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="card card-effect">
                            <div class="card-header">
                                <i class="fas fa-exclamation-circle mr-2"></i> Informasi
                            </div>
                            <div class="card-body info-text">
                                <ul>
                                    <li>Langkah-langkah membuat pesanan baru :</li>
                                    <ul type="circle">
                                        <li>Pilih salah satu Kategori.</li>
                                        <li>Pilih salah satu Layanan yang ingin dipesan.</li>
                                        <li>Masukkan Target pesanan sesuai ketentuan yang diberikan layanan tersebut.</li>
                                        <li>Masukkan Jumlah Pesanan yang Diinginkan.</li>
                                        <li>Klik Submit untuk membuat pesanan baru.</li>
                                    </ul>
                                    <br>
                                    <li>Ketentuan membuat pesanan baru :</li>
                                    <ul type="circle">
                                        <li>Pastikan Data yang diMasukkan Benar.</li>
                                        <li>Di Pastikan Akun Sewaktu Diproses Tidak di PRIVATE</li>
                                        <li>Jika Membeli Followers Instagram maka Target diisikan Dengan Username Instagram
                                            bukan link Instagram</li>
                                        <li>Jika Membeli Followers TIK TOK Maka Target diisikan Dengan Link/Url Akun TIK TOK
                                            bukan username akun TIK TOK</li>
                                        <li>Jika Membeli Subscribe YOUTUBE Maka Target diisikan Dengan Link/Url Akun YOUTUBE
                                            bukan nama akun YOUTUBE</li>
                                        <li>Jika Membeli Likes/Views INTAGRAM, TIK TOK, YOUTUBE. Maka Target diisikan
                                            Link/Url
                                            Postingan Tersebut</li>
                                        <li>Dilarang melakukan pemesanan ganda pada <u>data yang sama</u> jika status
                                            pemesanan
                                            sebelumnya masih Pending/Processing. Silakan tunggu hingga status pemesanan
                                            sebelumnya Error/Success, baru kemudian pesan kembali.</li>
                                        <li>Jika ingin membuat pesanan dengan Target yang sama dengan pesanan yang sudah
                                            pernah
                                            dipesan sebelumnya, mohon menunggu sampai pesanan sebelumnya selesai diproses
                                        </li>
                                        <li>Jika pesanan belum masuk, Harap kontak admin dengan megklik <a
                                                href="https://api.whatsapp.com/send?phone=6289530807796&text=Bagaimana%20dengan%20pesanan%20saya%20?"
                                                target="
                                                            _blank">Contact</a>
                                        </li>
                                        <li>Jika terjadi kesalahan / mendapatkan pesan gagal yang kurang jelas, silahkan
                                            hubungi
                                            Admin untuk informasi lebih lanjut.</li>
                                    </ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br><br><br>
                </div>
            </section>
            {{-- ORDER --}}
        @endif
    </div>
@endsection

@push('script')
    @include('admin.brain.laba')

    <script>
        $(document).ready(function() {
            $('#kategori').change(function() {
                let cid = $(this).val();
                $.ajax({
                    url: '/getLayanan',
                    type: 'post',
                    data: 'cid=' + cid + '&_token={{ csrf_token() }}',
                    success: function(result) {
                        $('#layanan').html(result);
                    },
                });
                $('#a').html('0');
                $('#ab').val('0');
                $('#b').html('-');
                $('#c').html('0');
                $('#cd').val('0');
                $('#d').html('0');
                $('#de').val('0');
            });
            $('#layanan').change(function() {
                let cid = $(this).val();
                let cud = $('#kategori').val();
                $.ajax({
                    url: '/getLG',
                    type: 'post',
                    data: 'cid=' + cid + '&cud=' + cud + '&_token={{ csrf_token() }}',
                    success: function(result) {
                        $('#hargak').html(result);
                        let a = $('#jumlah').val();
                        let b = $('#realpr').val();
                        $('#ttl').html(new Intl.NumberFormat().format(b * a));
                        $('#total').val(b * a);
                    },
                });
            });

            $('#layanan').change(function() {
                let cid = $(this).val();
                let cud = $('#kategori').val();
                $.ajax({
                    url: '/getDesk',
                    type: 'post',
                    data: 'cid=' + cid + '&cud=' + cud + '&_token={{ csrf_token() }}',
                    success: function(result) {
                        $('#desk').html(result);
                    },
                });
            });

            $('#layanan').change(function() {
                let cid = $(this).val();
                let cud = $('#kategori').val();
                $.ajax({
                    url: '/getMin',
                    type: 'post',
                    data: 'cid=' + cid + '&cud=' + cud + '&_token={{ csrf_token() }}',
                    success: function(result) {
                        $('#min').html(result);
                    },
                });
            });

            $('#layanan').change(function() {
                let cid = $(this).val();
                let cud = $('#kategori').val();
                $.ajax({
                    url: '/getMax',
                    type: 'post',
                    data: 'cid=' + cid + '&cud=' + cud + '&_token={{ csrf_token() }}',
                    success: function(result) {
                        $('#max').html(result);
                    },
                });
            });
        });

        $('#jumlah').change(function() {
            let a = $('#jumlah').val();
            let b = $('#realpr').val();
            $('#ttl').html(new Intl.NumberFormat().format(b * a));
            $('#total').val(b * a);
        });
        $('#jumlah').keyup(function() {
            let a = $('#jumlah').val();
            let b = $('#realpr').val();
            $('#ttl').html(new Intl.NumberFormat().format(b * a));
            $('#total').val(b * a);
        });

        function valid() {
            let a = $('#jumlah').val();
            let b = $('#cd').val();
            let c = $('#de').val();
            // if (a == 500) {
            //     document.getElementById("form").submit();
            // } else if (a < b || a > c) {
            //     iziToast.error({
            //         title: 'Error',
            //         message: 'Operasi ilegal',
            //         position: 'topCenter',
            //     });
            // } else {
            //     document.getElementById("form").submit();
            // }
            switch (a) {
                case a < b:
                    iziToast.error({
                        title: 'Error',
                        message: 'Operasi ilegal',
                        position: 'topCenter',
                    });
                    break;
                case a > c:
                    iziToast.error({
                        title: 'Error',
                        message: 'Operasi ilegal',
                        position: 'topCenter',
                    });
                    break;

                default:
                    document.getElementById("form").submit();
                    break;
            }
        }
    </script>
@endpush
