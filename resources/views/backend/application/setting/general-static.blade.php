@extends('layouts.backend.app')
@push('title')
    Update general information
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
                <h4 class="page-title">Update General Information</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">General</a></li>
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
                    <h5 class="card-title">General Information</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('backend.generalStaticUpdate') }}" enctype="multipart/form-data" method="post" class="row">
                        @csrf
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Company phone<span class="text-danger">*</span></label>
                            <input type="text" name="company_phone"  class="form-control"  value="{{ get_static_option('company_phone') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Company address<span class="text-danger">*</span></label>
                            <input type="text" name="company_address"  class="form-control"   value="{{ get_static_option('company_address') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Company office hour<span class="text-danger">*</span></label>
                            <input type="text" name="company_office_hour"  class="form-control"   value="{{ get_static_option('company_office_hour') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Company email<span class="text-danger">*</span></label>
                            <input type="text" name="company_email"  class="form-control" value="{{ get_static_option('company_email') }}"/>
                        </div>

{{--
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Font style<span class="text-danger">*</span></label>
                            <input type="text" name="font_style"  class="form-control" value="{{ get_static_option('font_style') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Bg success<span class="text-danger">*</span></label>
                            <input type="text" name="bg_success"  class="form-control" value="{{ get_static_option('bg_success') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Bg warning<span class="text-danger">*</span></label>
                            <input type="text" name="bg_warning"  class="form-control" value="{{ get_static_option('bg_warning') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Bg danger<span class="text-danger">*</span></label>
                            <input type="text" name="bg_danger"  class="form-control" value="{{ get_static_option('bg_danger') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Bg info<span class="text-danger">*</span></label>
                            <input type="text" name="bg_info"  class="form-control" value="{{ get_static_option('bg_info') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Bg primary<span class="text-danger">*</span></label>
                            <input type="text" name="bg_primary"  class="form-control" value="{{ get_static_option('bg_primary') }}"/>
                        </div>

                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Success<span class="text-danger">*</span></label>
                            <input type="text" name="success"  class="form-control" value="{{ get_static_option('success') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Warning<span class="text-danger">*</span></label>
                            <input type="text" name="warning"  class="form-control" value="{{ get_static_option('warning') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Danger<span class="text-danger">*</span></label>
                            <input type="text" name="danger"  class="form-control" value="{{ get_static_option('danger') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Info<span class="text-danger">*</span></label>
                            <input type="text" name="info"  class="form-control" value="{{ get_static_option('info') }}"/>
                        </div>

                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>primary<span class="text-danger">*</span></label>
                            <input type="text" name="primary"  class="form-control" value="{{ get_static_option('primary') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>h1 color<span class="text-danger">*</span></label>
                            <input type="text" name="h1_color"  class="form-control" value="{{ get_static_option('h1_color') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>h2 color<span class="text-danger">*</span></label>
                            <input type="text" name="h2_color"  class="form-control" value="{{ get_static_option('h2_color') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>h3 color<span class="text-danger">*</span></label>
                            <input type="text" name="h3_color"  class="form-control" value="{{ get_static_option('h3_color') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>h4 color<span class="text-danger">*</span></label>
                            <input type="text" name="h4_color"  class="form-control" value="{{ get_static_option('h4_color') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>h5 color<span class="text-danger">*</span></label>
                            <input type="text" name="h5_color"  class="form-control" value="{{ get_static_option('h5_color') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>h6 color<span class="text-danger">*</span></label>
                            <input type="text" name="h6_color"  class="form-control" value="{{ get_static_option('h6_color') }}"/>
                        </div>

                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>h1 bg color<span class="text-danger">*</span></label>
                            <input type="text" name="h1_bg_color"  class="form-control" value="{{ get_static_option('h1_bg_color') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>h2 bg color<span class="text-danger">*</span></label>
                            <input type="text" name="h2_bg_color"  class="form-control" value="{{ get_static_option('h2_bg_color') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>h3 bg color<span class="text-danger">*</span></label>
                            <input type="text" name="h3_bg_color"  class="form-control" value="{{ get_static_option('h3_bg_color') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>h4 bg color<span class="text-danger">*</span></label>
                            <input type="text" name="h4_bg_color"  class="form-control" value="{{ get_static_option('h4_bg_color') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>h5 bg color<span class="text-danger">*</span></label>
                            <input type="text" name="h5_bg_color"  class="form-control" value="{{ get_static_option('h5_bg_color') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>h6 bg color<span class="text-danger">*</span></label>
                            <input type="text" name="h6_bg_color"  class="form-control" value="{{ get_static_option('h6_bg_color') }}"/>
                        </div>

                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>P color<span class="text-danger">*</span></label>
                            <input type="text" name="p_color"  class="form-control" value="{{ get_static_option('p_color') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>P bg color<span class="text-danger">*</span></label>
                            <input type="text" name="p_bg_color"  class="form-control" value="{{ get_static_option('p_bg_color') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Div font style<span class="text-danger">*</span></label>
                            <input type="text" name="div_font_style"  class="form-control" value="{{ get_static_option('div_font_style') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Div head color<span class="text-danger">*</span></label>
                            <input type="text" name="div_head_color"  class="form-control" value="{{ get_static_option('div_head_color') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Div head bg color<span class="text-danger">*</span></label>
                            <input type="text" name="div_head_bg_color"  class="form-control" value="{{ get_static_option('div_head_bg_color') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Body bg color<span class="text-danger">*</span></label>
                            <input type="text" name="body_bg_color"  class="form-control" value="{{ get_static_option('body_bg_color') }}"/>
                        </div>

                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Admin leftsite bg olor<span class="text-danger">*</span></label>
                            <input type="text" name="admin_leftsite_bg_color"  class="form-control" value="{{ get_static_option('admin_leftsite_bg_color') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Admin head bg color<span class="text-danger">*</span></label>
                            <input type="text" name="admin_head_bg_color"  class="form-control" value="{{ get_static_option('admin_head_bg_color') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Is active registration from website</label>
                            <select class="form-control"   name="is_active_registration_from_website" id="is_active_registration_from_website">
                                <option @if(get_static_option('is_active_registration_from_website') == 'yes') selected @endif value="yes">Yes</option>
                                <option @if(get_static_option('is_active_registration_from_website') == 'no') selected @endif value="no">No</option>
                            </select>
                        </div> --}}


                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary mr-2">Update static option</button>
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


