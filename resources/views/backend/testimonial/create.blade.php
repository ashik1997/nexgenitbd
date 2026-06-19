@extends('layouts.backend.app')
@push('title')
    Testimonial create
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
                <h4 class="page-title">Testimonial create</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:0">Testimonial create</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('testimonial.index') }}" class="btn btn-primary">Testimonial list</a>
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
            <div class="card m-b-30 col-12 ">
                <div class="card-header bg-danger">
                    <h5 class="card-title text-white">Testimonial create</h5>
                </div>
                <div class="card-body">
                    <form class="row justify-content-center" method="POST" action="{{ route('testimonial.store') }}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-10">
                            <div class="form-group row">
                                <label for="writer_name" class="col-sm-4 col-form-label">Writer name</label>
                                <div class="col-sm-8">
                                    <input value="{{ old('writer_name') }}" name="writer_name" type="text" class="form-control"
                                           id="writer_name" placeholder="Writer name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="writer_designation" class="col-sm-4 col-form-label">Writer designation</label>
                                <div class="col-sm-8">
                                    <input value="{{ old('writer_designation') }}" name="writer_designation" type="text" class="form-control"
                                           id="writer_designation" placeholder="Writer designation">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="speech" class="col-sm-4 col-form-label">Speech</label>
                                <div class="col-12">
                                    <textarea name="speech" rows="8" type="text" class="form-control" id="speech">{{ old('speech') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-sm-4 col-form-label">Writer Avatar</label>
                                <div class="col-sm-8">
                                    <input name="image" type="file" accept="image/*" class="form-control-lg" id="image">
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button id="submit-btn" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')

@endpush
@push('summer-note')

@endpush

