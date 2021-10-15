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
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                  <div class="card-stats">
                    <div class="card-stats-items mt-4">
                      <div class="card-stats-item">
                        <div class="card-stats-item-count">24</div>
                        <div class="card-stats-item-label">Pending</div>
                      </div>
                      <div class="card-stats-item">
                        <div class="card-stats-item-count">12</div>
                        <div class="card-stats-item-label">Shipping</div>
                      </div>
                      <div class="card-stats-item">
                        <div class="card-stats-item-count">23</div>
                        <div class="card-stats-item-label">Completed</div>
                      </div>
                    </div>
                  </div>
                  <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-archive"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Total Orders</h4>
                    </div>
                    <div class="card-body">
                      59
                    </div>
                  </div>
                </div>
              </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total</h4>
                  </div>
                  <div class="card-body">
                    42
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total</h4>
                  </div>
                  <div class="card-body">
                    1,201
                  </div>
                </div>
              </div>
            </div>                 
          </div>
    </div>
@endsection

@push('script')

@endpush
