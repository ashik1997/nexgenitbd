@extends('layouts.backend.app')
@push('title')
    Update Counter information
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
                <h4 class="page-title">Update Counter Information</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Counter</a></li>
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
                    <h5 class="card-title">Counter Information</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('backend.counterStaticUpdate') }}" enctype="multipart/form-data" method="post" class="row">
                        @csrf
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Counter awards<span class="text-danger">*</span></label>
                            <input type="text" name="counter_awards"  class="form-control"   value="{{ get_static_option('counter_awards') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Counter year<span class="text-danger">*</span></label>
                            <input type="text" name="counter_year"  class="form-control"   value="{{ get_static_option('counter_year') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Counter project<span class="text-danger">*</span></label>
                            <input type="text" name="counter_project"  class="form-control"   value="{{ get_static_option('counter_project') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Counter client<span class="text-danger">*</span></label>
                            <input type="text" name="counter_client"  class="form-control"   value="{{ get_static_option('counter_client') }}"/>
                        </div>
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary mr-2">Update counter info</button>
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

