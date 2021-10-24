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
    </div>
@endsection

@push('script')
    @include('admin.brain.laba')
@endpush
