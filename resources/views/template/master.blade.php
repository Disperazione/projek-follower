<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">

    <!-- CSS Native -->
    @stack('link')

</head>

<body class="layout-2">

    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>


            {{-- navbar --}}
            @include('template.master.navbar')
            {{-- end navbar --}}

            {{-- sidebar --}}
            @include('template.master.sidebar')
            {{-- endsidebar --}}



            <!-- Main Content -->
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header" style="margin-left: -2px;">
                        <h1>@yield('judul')</h1>
                        <div class="section-header-breadcrumb" aria-label="breadcrumb">
                            @yield('breadcrumb')
                        </div>
                    </div>
                    <div class="section-body">
                        @yield('main')
                    </div>
                </section>
            </div>

            <footer>
                {{-- footer --}}
                @include('template.master.footer')
                {{-- endfooter --}}
            </footer>

            <!-- General JS Scripts -->

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> --}}
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
            <script src="{{ asset('assets/js/stisla.js') }}"></script>

            <!-- JS Libraries -->
            <script src="{{ asset('assets/node-modules/sticky-kit/dist/sticky-kit.min.js') }}"></script>
            @stack('script')

            <!-- Template JS File -->
            <script src="{{ asset('assets/js/scripts.js') }}"></script>
            <script src="{{ asset('assets/js/custom.js') }}"></script>
            <script src="{{ asset('js/iziToast.js') }}"></script>
            @include('vendor.lara-izitoast.toast')

</body>

</html>
