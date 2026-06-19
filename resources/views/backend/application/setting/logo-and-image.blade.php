@extends('layouts.backend.app')
@push('title')
    Update Logo and image
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
                <h4 class="page-title">Update Logo and image</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Logo and image</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbbar -->
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Logo and image</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('backend.logoAndImageStaticUpdate') }}" enctype="multipart/form-data" method="post" class="row">
                        @csrf
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <img class="rounded-circle" height="70px;" width="70px;" src="{{ get_static_option('fav_icon') ?? get_static_option('no_image') }}" alt="">
                            <label>Favicon </label>
                            <input accept="image/*" type="file" name="fav_icon" class="form-control"  />
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <img class="rounded-circle"  height="70px;" width="70px;" src="{{ get_static_option('frontend_logo') ?? get_static_option('no_image') }}" alt="">
                            <label>Frontend logo</label>
                            <input accept="image/*" type="file" name="frontend_logo" class="form-control"  />
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <img class="rounded-circle"  height="70px;" width="70px;" src="{{ get_static_option('backend_logo') ?? get_static_option('no_image') }}" alt="">
                            <label>Backend logo </label>
                            <input accept="image/*" type="file" name="backend_logo" class="form-control"  />
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <img class="rounded-circle"  height="70px;" width="70px;" src="{{ get_static_option('loader_image') ?? get_static_option('no_image') }}" alt="">
                            <label>Loader image </label>
                            <input accept="image/*" type="file" name="loader_image" class="form-control"  />
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <img class="rounded-circle"  height="70px;" width="70px;" src="{{ get_static_option('website_meta_image') ?? get_static_option('no_image') }}" alt="">
                            <label>Website meta image</label>
                            <input accept="image/*" type="file" name="website_meta_image" class="form-control"  />
                        </div>
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary mr-2">Update logo and image</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')

@endpush

@push('summer-note')

@endpush
