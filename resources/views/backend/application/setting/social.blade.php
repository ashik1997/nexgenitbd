@extends('layouts.backend.app')
@push('title')
    Update Social information
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
                <h4 class="page-title">Update Social Information</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Social</a></li>
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
                    <h5 class="card-title">Social Information</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('backend.socialStaticUpdate') }}" enctype="multipart/form-data" method="post" class="row">
                        @csrf
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Company facebook link<span class="text-danger">*</span></label>
                            <input type="text" name="company_facebook_link"  class="form-control"   value="{{ get_static_option('company_facebook_link') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Company twitter link<span class="text-danger">*</span></label>
                            <input type="text" name="company_twitter_link"  class="form-control"   value="{{ get_static_option('company_twitter_link') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Company youtube link<span class="text-danger">*</span></label>
                            <input type="text" name="company_youtube_link"  class="form-control"   value="{{ get_static_option('company_youtube_link') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Company instagram link<span class="text-danger">*</span></label>
                            <input type="text" name="company_instagram_link"  class="form-control"   value="{{ get_static_option('company_instagram_link') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Company linkedin link<span class="text-danger">*</span></label>
                            <input type="text" name="company_linkedin_link"  class="form-control"   value="{{ get_static_option('company_linkedin_link') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Company WhatsApp number or link</label>
                            <input type="text" name="company_whatsapp_link" class="form-control" value="{{ get_static_option('company_whatsapp_link') }}" placeholder="+8801XXXXXXXXX or https://wa.me/8801XXXXXXXXX"/>
                            <small class="form-text text-muted">The floating WhatsApp button uses this value. If empty, the company phone is used as a safe fallback.</small>
                        </div>

                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary mr-2">Update social link</button>
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
