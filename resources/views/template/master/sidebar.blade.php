{{-- @extends('template.master') --}}
<div class="main-sidebar">
    <aside id="sidebar-wrapper" style="width: 180px;">
        <div class="sidebar-brand sidebar-gone-show"><a href="index.html">Stisla</a></div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            @if (request()->routeIs('admin.index'))
                <li>
                    <a class="nav-link text-primary" href="{{ route('admin.index') }}">
                        <i class="fas fa-fire"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            @else
                <li>
                    <a class="nav-link" href="{{ route('admin.index') }}">
                        <i class="fas fa-fire"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            @endif
            <li class="menu-header">Master</li>
            @if (Auth::user()->role == 'admin')
                @if (request()->routeIs('admin.order'))
                    <li><a class="nav-link text-primary" href="{{ route('admin.order') }}"><i
                                class="fas fa-shopping-cart"></i>
                            <span>Order</span></a></li>
                @else
                    <li><a class="nav-link" href="{{ route('admin.order') }}"><i
                                class="fas fa-shopping-cart"></i>
                            <span>Order</span></a></li>
                @endif
                @if (request()->routeIs('admin.dataorder'))
                    <li><a class="nav-link text-primary" href="{{ route('admin.dataorder') }}"><i
                                class="fas fa-server"></i>
                            <span>Data Order</span></a></li>
                @else
                    <li><a class="nav-link" href="{{ route('admin.dataorder') }}"><i class="fas fa-server"></i>
                            <span>Data Order</span></a></li>
                @endif
                @if (request()->routeIs('admin.layanan'))
                    <li class="nav-item dropdown active">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                            <span>Layanan</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link text-primary" href="{{ route('admin.layanan') }}"><i
                                        class="fas fa-bars"></i>Layanan</a></li>
                            <li><a class="nav-link" href="{{ route('admin.addLayanan') }}"><i
                                        class="fas fa-cart-plus"></i> Tambah Layanan</a></li>
                        </ul>
                    </li>
                    @if (request()->routeIs('admin.addlayanan'))
                        <li class="nav-item dropdown active">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="fas fa-columns"></i>
                                <span>Layanan</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('admin.layanan') }}"><i
                                            class="fas fa-bars"></i>Layanan</a></li>
                                <li><a class="nav-link text-primary" href="{{ route('admin.addLayanan') }}"><i
                                            class="fas fa-cart-plus"></i> Tambah Layanan</a></li>
                            </ul>
                        </li>
                    @endif
                @else
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
                @endif
                @if (request()->routeIs('admin.regis'))
                    <li><a class="nav-link text-primary" href="{{ route('admin.regis') }}"><i
                                class="fas fa-users"></i>
                            <span>Registrasi User</span></a></li>
                @else
                    <li><a class="nav-link" href="{{ route('admin.regis') }}"><i class="fas fa-users"></i>
                            <span>Registrasi User</span></a></li>
                @endif
                @if (request()->routeIs('admin.siswa.index'))
                    <li><a class="nav-link text-primary" href="{{ route('admin.siswa.index') }}"><i
                                class="fas fa-users"></i>
                            <span>Data Siswa</span></a></li>
                @else
                    <li><a class="nav-link" href="{{ route('admin.siswa.index') }}"><i
                                class="fas fa-users"></i>
                            <span>Data Siswa</span></a></li>
                @endif
                @if (request()->routeIs('admin.laporan.makanan'))
                    <li class="nav-item dropdown active">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                            <i class="fas fa-tasks"></i>
                            <span>Laporan</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="nav-link text-primary" href="{{ route('admin.laporan.makanan') }}">
                                    <i class="fas fa-bars"></i>food.strap
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('admin.laporan.followers') }}">
                                    <i class=" fas fa-bars"></i>singular.care
                                </a>
                            </li>
                        </ul>
                    </li>
                    @if (request()->routeIs('admin.laporan.followers'))
                        <li class="nav-item dropdown active">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                                <i class="fas fa-tasks"></i>
                                <span>Laporan</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="nav-link" href="{{ route('admin.laporan.makanan') }}">
                                        <i class="fas fa-bars"></i>food.strap
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="{{ route('admin.laporan.followers') }}">
                                        <i class=" fas fa-bars"></i>singular.care
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                            <i class="fas fa-tasks"></i>
                            <span>Laporan</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="nav-link" href="{{ route('admin.laporan.makanan') }}">
                                    <i class="fas fa-bars"></i>food.strap
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('admin.laporan.followers') }}">
                                    <i class=" fas fa-bars"></i>singular.care
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            @endif

            @if (Auth::user()->role == 'siswa')
                @if (request()->routeIs('user.order'))
                    <li><a class="nav-link text-primary" href="{{ route('user.order') }}"><i
                                class="fas fa-shopping-cart"></i>
                            <span>Order</span></a></li>
                @else
                    <li><a class="nav-link" href="{{ route('user.order') }}"><i
                                class="fas fa-shopping-cart"></i>
                            <span>Order</span></a></li>
                @endif
                @if (request()->routeIs('user.laporan.makanan'))
                    <li class="nav-item dropdown active">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                            <i class="fas fa-tasks"></i>
                            <span>Laporan</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="nav-link text-primary" href="{{ route('user.laporan.makanan') }}">
                                    <i class="fas fa-bars"></i>food.strap
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                            <i class="fas fa-tasks"></i>
                            <span>Laporan</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="nav-link" href="{{ route('user.laporan.makanan') }}">
                                    <i class="fas fa-bars"></i>food.strap
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            @endif

            @if (Auth::user()->role == 'user')
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-columns"></i>
                        <span>Layanan</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="nav-link" href="{{ route('user.layanan') }}">
                                <i class="fas fa-bars"></i>Layanan
                            </a>
                        </li>
                    </ul>
                </li>
                @if (request()->routeIs('user.dataorder'))
                    <li><a class="nav-link text-primary" href="{{ route('user.dataorder') }}"><i
                                class="fas fa-server"></i>
                            <span>Data Order</span></a></li>
                @else
                    <li><a class="nav-link" href="{{ route('user.dataorder') }}"><i class="fas fa-server"></i>
                            <span>Data Order</span></a></li>
                @endif
            @endif

        </ul>
    </aside>
</div>
