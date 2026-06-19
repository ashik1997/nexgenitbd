@extends('layouts.backend.app')
@push('title')
    Edit VPN package
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
                <h4 class="page-title">Edit VPN package</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Edit</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('vpnPackage.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
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
                    <h5 class="card-title">Edit VPN package</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('vpnPackage.update', $vpnPackage) }}" method="post" class="row" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input   value="{{ $vpnPackage->title }}"   type="text" name="title" required class="form-control" id="title" >
                            @error('title')
                            <small id="title" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label  for="monthly_price">Monthly price <span class="text-danger">*</span></label>
                            <input    value="{{ $vpnPackage->monthly_price }}"   type="text" name="monthly_price" required class="form-control" id="monthly_price" >
                            @error('monthly_price')
                            <small id="monthly_price" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label>Description <span class="text-danger">*</span></label>
                            <textarea id="description" name="description">{!! $vpnPackage->description !!}</textarea>
                            @error('description')
                            <small id="description" class="form-text text-muted text-danger">{{ $message }}</small>
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
    <script>
        $('#description').summernote({
          placeholder: 'Description',
          tabsize: 2,
          height: 120,
          toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
          ]
        });
      </script>
@endsection
@push('script')

@endpush

