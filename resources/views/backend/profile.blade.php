@extends('layouts.backend.app')
@push('title')
    Profile
@endpush
@push('meta-description')

@endpush
@push('meta-image')

@endpush
@push('style')

@endpush

@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">My Account</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Account</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
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
            <div class="col-lg-5 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title mb-0">My Account</h5>
                    </div>
                    <div class="card-body">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link mb-2 active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="feather icon-user mr-2"></i>My Profile</a>
                            <a class="nav-link" id="v-pills-logout-tab" data-toggle="pill" href="#v-pills-logout" role="tab" aria-controls="v-pills-logout" aria-selected="false"><i class="feather icon-log-out mr-2"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-7 col-xl-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <!-- My Profile Start -->
                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title mb-0">My Profile</h5>
                            </div>
                            <div class="card-body">
                                <div class="profilebox pt-4 text-center">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <img height="106px;" width="95px;" src="{{ asset(auth()->user()->avatar ?? 'assets/panel/vertical/images/users/profile.svg') }}" class="img-fluid" alt="profile">
                                        </li>
                                        <li class="list-item">
                                         <h3>{{ auth()->user()->name }}</h3>
                                        </li>
                                        <li class="list-item">
                                            <h4>{{ auth()->user()->email }}</h4>
                                        </li>
                                        <li class="list-item">
                                            <h4>{{ auth()->user()->phone }}</h4>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Edit Profile Informations</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="">Change password</h6>
                                <form action="{{ route('profilePasswordUpdate') }}" method="POST" >
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="old_password">Old Password</label>
                                            <input required value="{{ old('old_password') }}" name="old_password" type="password" class="form-control" id="old_password">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="password">Password</label>
                                            <input required value="{{ old('password') }}" name="password" type="password" class="form-control" id="password">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="password_confirmation">Confirmed Password</label>
                                            <input required value="{{ old('password_confirmation') }}"  name="password_confirmation" type="password" class="form-control" id="password_confirmation">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary-rgba font-16"><i class="feather icon-save mr-2"></i>Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- My Profile End -->
                    <!-- My Logout Start -->
                    <div class="tab-pane fade" id="v-pills-logout" role="tabpanel" aria-labelledby="v-pills-logout-tab">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Logout</h5>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6 col-xl-4">
                                        <div class="logout-content text-center my-5">
                                            <img src="assets/panel/vertical/images/ecommerce/logout.svg" class="img-fluid mb-5" alt="logout">
                                            <h2 class="text-success">Logout ?</h2>
                                            <div class="button-list">
                                                <button type="button" class="btn btn-danger font-16 logout-btn "><i class="feather icon-check mr-2"></i>Yes, I'm sure</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- My Logout End -->
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')
    <!-- eCommerce My Account Page js -->
    <script src="{{ asset('assets/panel/vertical/js/custom/custom-ecommerce-myaccount.js') }}"></script>
@endpush

