@extends('layouts.backend.app')
@push('title')
    Create banner
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
                <h4 class="page-title">Create banner</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">create</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('websiteBanner.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
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
                    <h5 class="card-title">Create banner</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('websiteBanner.store') }}" method="post" class="row" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input value="{{ old('title') }}" type="text" name="title" required class="form-control" id="title" >
                            @error('title')
                            <small id="title" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="view_btn_url">View btn url <span class="text-danger">*</span></label>
                            <input value="{{ old('view_btn_url') }}" type="text" name="view_btn_url" required class="form-control" id="view_btn_url" >
                            @error('view_btn_url')
                            <small id="view_btn_url" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="purchase_btn_url">Purchase btn url <span class="text-danger">*</span></label>
                            <input value="{{ old('purchase_btn_url') }}" type="text" name="purchase_btn_url" required class="form-control" id="purchase_btn_url" >
                            @error('purchase_btn_url')
                            <small id="purchase_btn_url" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="image">{{ __('Image')  }}</label>
                            <input type="file" accept="image/*" class="form-control" id="image" name="image">
                            @error('image')
                            <small id="image" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="short_image">{{ __('Small Image (Manimum opacity should be 30)')  }}</label>
                            <input type="file" accept="image/*" class="form-control" id="short_image" name="short_image">
                            @error('short_image')
                            <small id="short_image" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-12 col-xl-12">
                            <label for="description">{{ __('Description')  }}</label>
                            <textarea type="text" class="form-control" id="description" name="description" placeholder="{{ __('Enter description') }}" required> {{ old('description') }} </textarea>
                            @error('description')
                            <small id="description" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-12 col-xl-12">
                            <label for="short_description">{{ __('Short Description')  }}</label>
                            <textarea type="text" class="form-control" id="short_description" name="short_description" placeholder="{{ __('Enter short description') }}" required> {{ old('short_description') }} </textarea>
                            @error('short_description')
                            <small id="short_description" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-success mr-1 col-12">Create now</button>
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

