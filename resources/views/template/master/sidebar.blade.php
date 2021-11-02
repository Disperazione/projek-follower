{{-- @extends('template.master') --}}
<div class="main-sidebar">
    <aside id="sidebar-wrapper" style="width: 180px;">
        <div class="sidebar-brand sidebar-gone-show"><a href="index.html">Stisla</a></div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li>
                <a class="nav-link" href="{{ route('admin.index') }}">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Master</li>
            @if (Auth::user()->role == 'admin')
                <li><a class="nav-link" href="{{ route('admin.order') }}"><i class="fas fa-shopping-cart"></i>
                        <span>Order</span></a></li>
                <li><a class="nav-link" href="{{ route('admin.dataorder') }}"><i class="fas fa-server"></i>
                        <span>Data Order</span></a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                        <span>Layanan</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('admin.layanan') }}"><i
                                    class="fas fa-bars"></i>Layanan</a></li>
                        <li><a class="nav-link" href="{{ route('admin.addLayanan') }}"><i
                                    class="fas fa-cart-plus"></i> Tambah Layanan</a></li>
                    </ul>
                </li>
                <li><a class="nav-link" href="{{ route('admin.regis') }}"><i class="fas fa-server"></i>
                        <span>Registrasi User</span></a></li>
                <li><a class="nav-link" href="{{ route('admin.laporan.makanan') }}"><i class="fas fa-file"></i>
                        <span>Laporan Makanan</span></a></li>
                <li><a class="nav-link" href="{{ route('admin.laporan.followers') }}"><i class="fas fa-file"></i>
                        <span>Laporan Followers</span></a></li>
            @endif

            @if (Auth::user()->role == 'user')
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-columns"></i>
                    <span>Layanan</span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ route('admin.layanan') }}">
                            <i class="fas fa-bars"></i>Layanan
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-tasks"></i>
                    <span>Laporan</span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="">
                            <i class="fas fa-bars"></i>food.strap
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="">
                            <i class="fas fa-bars"></i>singular.care
                        </a>
                    </li>
                </ul>
            </li>
            @endif

        </ul>
    </aside>
</div>
