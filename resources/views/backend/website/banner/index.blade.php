@extends('layouts.backend.app')
@push('title')
{{ __('Website banner') }}
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
                <h4 class="page-title">{{ __('Banner') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Website banner') }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('websiteBanner.create') }}" class="btn btn-primary">{{ __('Add new banner') }}</a>
                </div>
            </div>
        </div>
    </div>


    <div class="contentbar">

        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Short Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($websiteBanners as $websiteBanner)
                                    <tr>

                                        <td>{{ $websiteBanner->title }}</td>
                                        <td>
                                            <img width="70px;" height="70px;" src="{{ asset($websiteBanner->image ?? get_static_option('no_image')) }}" alt="Icon">
                                        </td>
                                        <td>
                                            <img width="70px;" height="70px;" src="{{ asset($websiteBanner->short_image ?? get_static_option('no_image')) }}" alt="Icon">
                                        </td>
                                        <td>
                                            <a href="{{ route('websiteBanner.edit', $websiteBanner->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
                                            <button class="text-white btn btn-danger " onclick="delete_function(this)" value="{{ route('websiteBanner.destroy', $websiteBanner) }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')

@endpush

