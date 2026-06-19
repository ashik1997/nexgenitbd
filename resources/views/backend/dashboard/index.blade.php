@extends('layouts.backend.app')
@push('title')
    Dashboard
@endpush
@push('meta-description')

@endpush
@push('meta-image')

@endpush
@push('style')
    <!-- Morris Chart css -->
    <link href="{{ asset('assets/panel/vertical/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />
    <!-- Datepicker css -->
    <link href="{{ asset('assets/panel/vertical/plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Dashboard</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">

                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('frontend.home') }}" target="_blank" class="btn btn-primary">Website</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbbar -->
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-md-6 col-lg-3 col-xl-3">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Total User</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <p class="dash-analytic-icon"><i class="feather icon-users warning-rgba text-warning"></i></p>
                                        <h3 class="mb-3">{{ $total_users->count() }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xl-3">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Total Active User</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <p class="dash-analytic-icon"><i class="feather icon-users success-rgba text-success"></i></p>
                                        <h3 class="mb-3">{{ $total_users->where('is_active', true)->count() }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xl-3">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Total Inactive User</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <p class="dash-analytic-icon"><i class="feather icon-users danger-rgba text-danger"></i></p>
                                        <h3 class="mb-3">{{ $total_users->where('is_active', false)->count() }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xl-3">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Total Visitor</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <p class="dash-analytic-icon"><i class="feather icon-eye info-rgba text-info"></i></p>
                                        <h3 class="mb-3">{{ $visitors->groupBy('ip')->count() }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xl-3">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Today Visitor</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <p class="dash-analytic-icon"><i class="feather icon-eye primary-rgba text-primary"></i></p>
                                        <h3 class="mb-3">{{ $today_visitor->groupBy('ip')->count() }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xl-3">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Today Page Visited</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <p class="dash-analytic-icon"><i class="feather icon-eye success-rgba text-success"></i></p>
                                        <h3 class="mb-3">{{ $today_visitor->count() }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xl-3">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Total Subscribers</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <p class="dash-analytic-icon"><i class="feather icon-bell success-rgba text-success"></i></p>
                                        <h3 class="mb-3">{{ $total_subscribers->count() }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xl-3">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Total Order</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <p class="dash-analytic-icon"><i class="feather icon-target info-rgba text-info"></i></p>
                                        <h3 class="mb-3">{{ $total_order }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xl-3">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Total Completed Order</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <p class="dash-analytic-icon"><i class="feather icon-target success-rgba text-success"></i></p>
                                        <h3 class="mb-3">{{ $total_completed_order }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xl-3">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Total Incompleted Order</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <p class="dash-analytic-icon"><i class="feather icon-target danger-rgba text-danger"></i></p>
                                        <h3 class="mb-3">{{ $total_incompleted_order }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')
    <!-- Morris Chart js -->
    <script src="{{ asset('assets/panel/vertical/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('assets/panel/vertical/plugins/raphael/raphael-min.js') }}"></script>
    <!-- Piety Chart js -->
    <script src="{{ asset('assets/panel/vertical/plugins/peity/jquery.peity.min.js') }}"></script>
    <!-- Dashboard js -->
    <script src="{{ asset('assets/panel/vertical/js/custom/custom-dashboard-analytics.js') }}"></script>
@endpush
