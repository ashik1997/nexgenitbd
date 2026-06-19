@extends('layouts.backend.app')
@push('title')
    Edit  Website client
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
                <h4 class="page-title">Edit  Website client</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Edit</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('websiteClient.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
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
                    <h5 class="card-title">Edit  Website client</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('websiteClient.update', $websiteClient) }}" method="post" class="row" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group col-md-6">
                            <label for="name">Client Name <span class="text-danger">*</span></label>
                            <input value="{{ old('name', $websiteClient->name) }}" type="text" name="name" required class="form-control" id="name">
                            @error('name')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="industry">Industry</label>
                            <input value="{{ old('industry', $websiteClient->industry) }}" type="text" name="industry" class="form-control" id="industry">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="url">Website URL</label>
                            <input value="{{ old('url', $websiteClient->url === '#' ? '' : $websiteClient->url) }}" type="url" name="url" class="form-control" id="url">
                            @error('url')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="sort_order">Display Order</label>
                            <input value="{{ old('sort_order', $websiteClient->sort_order) }}" type="number" min="0" name="sort_order" class="form-control" id="sort_order">
                        </div>
                        <div class="form-group col-md-3 d-flex align-items-center pt-3">
                            <div class="custom-control custom-switch">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" {{ old('is_active', $websiteClient->is_active) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="is_active">Visible on website</label>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="description">Short Description</label>
                            <textarea name="description" class="form-control" id="description" rows="3">{{ old('description', $websiteClient->description) }}</textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="mb-3"><img style="max-width:180px;max-height:90px;object-fit:contain" src="{{ asset($websiteClient->image ?? get_static_option('no_image')) }}" alt="{{ $websiteClient->name }}"></div>
                            <label for="image">Replace Company Logo</label>
                            <input type="file" accept="image/*" class="form-control" id="image" name="image">
                            <small class="form-text text-muted">Leave empty to keep the current logo.</small>
                            @error('image')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-success mr-1 col-12">Update now</button>
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
