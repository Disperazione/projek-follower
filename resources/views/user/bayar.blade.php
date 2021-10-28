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

    <title>Yuk, Tambah Followers!</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap');

        *,
        *:after,
        *:before {
            box-sizing: border-box;
        }

        body {
            font-family: "Sora", sans-serif;
            line-height: 1.5;
            background-color: #f1f3fb;
        }

        img {
            max-width: 100%;
            display: block;
        }




        .card {
            margin: 2rem auto;
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 425px;
            background-color: #FFF;
            border-radius: 10px;
            box-shadow: 0 10px 20px 0 rgba(#999, .25);
            padding: .75rem;
        }

        .card-image {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            background-position: 0 5%;
            position: relative;
            width: 300px;
            margin-left: 47px;
        }

        .card-heading {
            position: absolute;
            left: 10%;
            top: 15%;
            right: 10%;
            font-size: 1.75rem;
            font-weight: 700;
            color: #735400;
            line-height: 1.222;

            small {
                display: block;
                font-size: .75em;
                font-weight: 400;
                margin-top: .25em;
            }
        }

        .action-button {
            font: inherit;
            font-size: 1.25rem;
            padding: 1em;
            width: 100%;
            font-weight: 500;
            background-color: #6658d3;
            border-radius: 6px;
            color: #FFF;
            border: 0;

            &:focus {
                outline: 0;
            }
        }

        .card-info {
            padding: 1rem 1rem;
            text-align: center;
            font-size: .875rem;
            color: #8597a3;

            a {
                display: block;
                color: #6658d3;
                text-decoration: none;
            }
        }

        /*
 CSS for the main interaction
*/
        .tabset>input[type="radio"] {
            position: absolute;
            left: -200vw;
        }

        .tabset .tab-panel {
            display: none;
        }

        .tabset>input:first-child:checked~.tab-panels>.tab-panel:first-child,
        .tabset>input:nth-child(3):checked~.tab-panels>.tab-panel:nth-child(2),
        .tabset>input:nth-child(5):checked~.tab-panels>.tab-panel:nth-child(3),
        .tabset>input:nth-child(7):checked~.tab-panels>.tab-panel:nth-child(4),
        .tabset>input:nth-child(9):checked~.tab-panels>.tab-panel:nth-child(5),
        .tabset>input:nth-child(11):checked~.tab-panels>.tab-panel:nth-child(6) {
            display: block;
        }

        /*
 Styling
*/


        .tabset>label {
            position: relative;
            display: inline-block;
            padding: 15px 15px 25px;
            border: 1px solid transparent;
            border-bottom: 0;
            cursor: pointer;
            font-weight: 600;
        }

        .tabset>label::after {
            content: "";
            position: absolute;
            left: 15px;
            bottom: 10px;
            width: 22px;
            height: 4px;
            background: #8d8d8d;
        }

        .tabset>label:hover,
        .tabset>input:focus+label {
            color: #06c;
        }

        .tabset>label:hover::after,
        .tabset>input:focus+label::after,
        .tabset>input:checked+label::after {
            background: #06c;
        }

        .tabset>input:checked+label {
            border-color: #ccc;
            border-bottom: 1px solid #fff;
            margin-bottom: -1px;
        }

        .tab-panel {
            padding: 30px 0;
            border-top: 1px solid #ccc;
        }

        /*
 Demo purposes only
*/
        *,
        *:before,
        *:after {
            box-sizing: border-box;
        }

        .tabset {
            max-width: 65em;
        }

        img {}

        input[type=file] {
            padding: 10px;
        }

    </style>
</head>

<body>
    {{-- qr --}}
    <h2 class="text-center pt-3"> <u> Pembayaran</u></h2>
    <div class="card">
        <div class="tabset">
            <!-- Tab 1 -->
            <input type="radio" name="tabset" id="tab1" aria-controls="marzen" checked>
            <label style="margin-left: 10%" for="tab1">Dana</label>
            <!-- Tab 2 -->
            <input type="radio" name="tabset" id="tab2" aria-controls="rauchbier">
            <label style="margin-left: 10%" for="tab2">Gopay</label>
            <!-- Tab 3 -->
            <input type="radio" name="tabset" id="tab3" aria-controls="dunkles">
            <label style="margin-left: 10%" for="tab3">OVO</label>

            <div class="tab-panels">
                <section id="marzen" class="tab-panel">
                    <div class="dana">
                        <div class="card-nama">
                            <div class="alert alert-warning">
                                <i class="fas fa-exclamation-circle pe-2"></i> Harap memberi keterangan saat transfer
                            </div>
                            <h4 class="text-center"><b>SINGULAR</b> </h4>
                            <h5 class="text-center">Scan QR Dengan Dana</h5>

                        </div>
                        <div class="card-image text-center">
                            <div class="justify-content-center p-3">
                                {!! QrCode::size(270)->generate('https://link.dana.id/qr/4v9gfe27') !!}
                            </div>
                        </div>

                    </div>
                </section>
                <section id="rauchbier" class="tab-panel">
                    <div class="Gopay">
                        <div class="card-nama">
                            <div class="alert alert-warning">
                                <i class="fas fa-exclamation-circle pe-2"></i> Harap memberi keterangan saat transfer
                            </div>
                            <h4 class="text-center"><b>SINGULAR</b> </h4>
                            <h5 class="text-center">Scan QR Dengan Gopay</h5>

                        </div>
                        <div class="card-image text-center">
                            <div class="justify-content-center p-3">
                                {!! QrCode::size(270)->generate('{"qr_id":"ab35440b-00ef-4b62-a4dc-9b202717a09d"}') !!}
                            </div>
                        </div>

                    </div>
                </section>
                <section id="dunkles" class="tab-panel">
                    <div class="OVO">
                        <div class="card-nama">
                            <div class="alert alert-warning">
                                <i class="fas fa-exclamation-circle pe-2"></i> Harap memberi keterangan saat transfer
                            </div>
                            <h4 class="text-center"><b>SINGULAR</b> </h4>
                            <h5 class="text-center">Scan QR Dengan OVO</h5>

                        </div>
                        <div class="card-image text-center">
                            <div class="justify-content-center p-3">
                                {!! QrCode::size(270)->generate('085890058280#Erraldo%20Daniel%20S') !!}
                            </div>
                        </div>

                    </div>
                </section>
            </div>
            <div class="bukti">
                <div class="card @error('bukti') border-danger @enderror">
                    <div class="alert @error('bukti') alert-danger @enderror alert-warning">
                        <i class="fas fa-exclamation-circle pe-2"></i> Harap Upload Bukti Pembayaran
                    </div>
                    <img id="blah" src="http://placehold.it/180" alt="your image" />
                    <form action="{{ route('user.update', [$id->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type='file' name="bukti" onchange="readURL(this);" />
                </div>
            </div>
            <div class="button position-relative pt-4">
                {{-- {{ dd($id->id) }} --}}
                <input type="text" class="d-none" value="sudah" name="pembayaran">
                {{-- <input type="text" class="d-none" value="proses" name="status"> --}}
                <button class="btn btn-success mt-1 position-relative  start-50 translate-middle"
                    type="submit">Selesai</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-4">

    </div>


    {{-- tutup --}}






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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <!--
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>-->

</body>

</html>
