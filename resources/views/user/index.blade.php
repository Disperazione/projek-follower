<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
    <link rel="stylesheet" href="{{ asset('assets/user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/user/css/style.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">

    <title>Yuk, Tambah Followers!</title>

    <style>
        .order {
            width: 1300px;
            margin: 0px auto;
        }

        .card {
            border: none;
        }

        .alert-warning {
            margin-top: -20px;
            margin-bottom: 30px;
        }

        .info-text {
            font-size: 13px;
        }
        .card-pill{
            border-radius: 16px;
        }
        .iconbox{
            margin: 0px auto;
        }

    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg py-3 sticky-top navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img class="logo" src="img/logo-dark.svg" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="https://api.whatsapp.com/send?phone=6289530807796&text=Bagaimana%20dengan%20pesanan%20saya%20?"
                            target="_blank">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav><!-- //NAVBAR -->

    <!-- HERO -->
    <div class="hero vh-100 d-flex align-items-center" id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto text-center">
                    <h1 class="display-4 text-white">Tambah Followers Anda Sekarang</h1>
                    <span class="animate-typing text-white fs-2" data-animate-loop="true" data-type-speed="200"
                        data-type-delay="200" data-remove-delay="2000">
                        Layanan Cepat|
                        Pembayaran Praktis|
                        Harga Terjangkau
                    </span>
                    <p class="text-white my-3"></p>
                    <a href="/login" class="btn me-2 btn-primary mt-3">
                        <h6 class="text-light" style="padding-top: 6px;">
                            <i class="fas fa-sign-in-alt me-3"></i>Log In.
                        </h6>
                    </a>
                    <a href="#" class="btn me-2 btn-info mt-3">
                        <h6 class="text-light" style="padding-top: 6px;">
                            <i class="fas fa-sign-in-alt me-3"></i>Register.
                        </h6>
                    </a>
                </div>
            </div>
        </div>
    </div><!-- //HERO -->

    <section id="" style="margin-top: -170px;">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-lg-9 col-sm-6">
                    <div class="service card-effect card-pill row text-center">
                        <div class="col-4">
                            <h3 class="mt-2 mb-2">105+</h3>
                            {{-- <p>{{ $data->count() }}</p> --}}
                            <h5 class="text-secondary">Jumlah User Deposit</h5>
                        </div>
                        <div class="col-4">
                            <h3 class="mt-2 mb-2">105+</h3>
                            {{-- <p>{{ $data->count() }}</p> --}}
                            <h5 class="text-secondary">Pengguna Aktif</h5>
                        </div>
                        <div class="col-4">
                            <h3 class="mt-2 mb-2">105+</h3>
                            {{-- <p>{{ $data->count() }}</p> --}}
                            <h5 class="text-secondary">Pesanan Dikerjakan</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICES -->
    <section id="services" style="margin-top: -100px;">
        <div class="">
            <div class="col-lg-12 col-sm-6 row text-center" style="margin: 0px auto;">
                <div class="col-lg-4 col-sm-6">
                    <div class="card-effect" style="border-radius: 15px;">
                        <div class="iconbox">
                            <i class="far fa-gem"></i>
                        </div>
                        <h5 class="mt-4 mb-2">Kualitas Pelayanan</h5>
                        <h6 class="text-secondary">Kami menyediakan berbagai layanan terbaik dan berkualitas untuk
                            menaikkan peringkat social media Anda.</h6>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card-effect" style="border-radius: 15px;">
                        <div class="iconbox">
                            <i class="far fa-life-ring"></i>
                        </div>
                        <h5 class="mt-4 mb-2">Pelayanan Bantuan</h5>
                        <h6 class="text-secondary">Kami siap membantu Anda jika Anda mengalami kesulitan atau
                            tidak mengerti terkait layanan yang kami sediakan.</h6>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card-effect" style="border-radius: 15px;">
                        <div class="iconbox">
                            <i class="fas fa-code"></i>
                        </div>
                        <h5 class="mt-4 mb-2">Kenyamanan Desain</h5>
                        <h6 class="text-secondary">Website kami dapat diakses melalui berbagai device/perangkat
                            baik PC, tablet, maupun mobile phone.</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- SERVICES -->




    <!-- SERVICES -->
    {{-- <section id="services" style="margin-top: -100px;">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto text-center">
                    <h6 class="text-primary">SERIVCES</h6>
                    <h1>Our Services</h1>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-sm-6">
                    <div class="service card-effect bounceInUp">
                        <div class="iconbox">
                            <i class='bx bxs-user'></i>
                        </div>
                        <h5 class="mt-4 mb-2">Pelanggan</h5>
                        <p>{{ $datas->where('pembayaran', 'sudah')->count() }}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service card-effect">
                        <div class="iconbox">
                            <i class='bx bxs-rocket'></i>
                        </div>
                        <h5 class="mt-4 mb-2">Jumlah Pesanan</h5>
                        <p>{{ $datas->where('status', 'selesai')->count() }}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service card-effect">
                        <div class="iconbox">
                            <i class='bx bxs-cog'></i>
                        </div>
                        <h5 class="mt-4 mb-2">Layanan</h5>
                        <p>{{ $data->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- SERVICES -->

    {{-- ORDER --}}
    <section id="contact">
        <div class="row order">
            <div class="col-sm-8">
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
                                <form action="{{ route('user.store') }}" method="post" enctype="" id="form">
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
                                                <input type="number" class="d-none" id="hargk" name="hargaperk">
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
                                <div class="row mt-3">
                                    <button type="button" class="btn btn-success col-md-2"
                                        onclick="valid()">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
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
                                <li>Jika Membeli Likes/Views INTAGRAM, TIK TOK, YOUTUBE. Maka Target diisikan Link/Url
                                    Postingan Tersebut</li>
                                <li>Dilarang melakukan pemesanan ganda pada <u>data yang sama</u> jika status pemesanan
                                    sebelumnya masih Pending/Processing. Silakan tunggu hingga status pemesanan
                                    sebelumnya Error/Success, baru kemudian pesan kembali.</li>
                                <li>Jika ingin membuat pesanan dengan Target yang sama dengan pesanan yang sudah pernah
                                    dipesan sebelumnya, mohon menunggu sampai pesanan sebelumnya selesai diproses</li>
                                <li>Jika pesanan belum masuk, Harap kontak admin dengan megklik <a
                                        href="https://api.whatsapp.com/send?phone=6289530807796&text=Bagaimana%20dengan%20pesanan%20saya%20?"
                                        target="
                                        _blank">Contact</a>
                                </li>
                                <li>Jika terjadi kesalahan / mendapatkan pesan gagal yang kurang jelas, silahkan hubungi
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

    <!-- CONTACT -->

    <footer>
        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4">
                        <img class="logo" src="img/logo-white.svg" alt="">
                    </div>
                    <div class="col-lg-2">
                        <h5 class="text-white">Brand</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Layanan</a></li>
                            <li><a href="#">Order</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2">
                        <h5 class="text-white">More</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">FAQ's</a></li>
                            <li><a href="#">Privacy & Policy</a></li>
                            <li><a href="#">Warranty</a></li>
                            <li><a href="#">Shipment</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <h5 class="text-white">Contact</h5>
                        <ul class="list-unstyled">
                            <li>Address: </li>
                            <li>Email: </li>
                            <li>Phone:</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-0">© 2021 copyright all right reserved | Designed with <i
                                class="bx bx-heart text-danger"></i> by<a
                                href="https://www.youtube.com/channel/UCYMEEnLzGGGIpQQ3Nu_sBsQ"
                                class="text-white">Team 10</a></p>
                    </div>
                    <div class="col-md-6">
                        <div class="social-icons">
                            <a href="#"><i class='bx bxl-facebook'></i></a>
                            <a href="#"><i class='bx bxl-twitter'></i></a>
                            <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/wow.js"></script>
    <script>
        new WOW().init();
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
    <script src="{{ asset('assets/js/jquery.animateTyping.js') }}"></script>
    <!--
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>-->
    <script src="{{ asset('js/iziToast.js') }}"></script>
    @include('vendor.lara-izitoast.toast')

</body>

</html>
