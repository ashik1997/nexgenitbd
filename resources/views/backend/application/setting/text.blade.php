@extends('layouts.backend.app')
@push('title')
    Update Text
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
                <h4 class="page-title">Update Text</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Text</a></li>
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
                    <h5 class="card-title">Text</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('backend.textStaticUpdate') }}" enctype="multipart/form-data" method="post" class="row">
                        @csrf
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Custom head code</label>
                            <textarea type="text" name="custom_head_code"  class="form-control" rows="10"/>{{ get_static_option('custom_head_code') }}</textarea>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Custom foot code</label>
                            <textarea type="text" name="custom_foot_code"  class="form-control" rows="10"/>{{ get_static_option('custom_foot_code') }}</textarea>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Company short description</label>
                            <textarea type="text" name="company_short_description"  class="form-control" rows="10"/>{{ get_static_option('company_short_description') }}</textarea>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Website meta description</label>
                            <textarea type="text" name="website_meta_description"  class="form-control" rows="10"/>{{ get_static_option('website_meta_description') }}</textarea>
                        </div>
                        <div class="form-group col-12 mt-4 border border-danger">
                            <label>Footer credit</label>
                            <textarea type="text" id="footer_credit" name="footer_credit"  class="form-control" rows="10"/>{!! get_static_option('footer_credit') !!}</textarea>
                        </div>
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary mr-2">Update Text</button>
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
    <script>
        $('#footer_credit').summernote({
            placeholder: 'lorem ipsum footer-credit.....',
            tabsize: 2,
            height: 180,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endpush
