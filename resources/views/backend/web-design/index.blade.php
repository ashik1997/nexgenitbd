@extends('layouts.backend.app')
@push('title')
    Web Design
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
                <h4 class="page-title">Web Design  table</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:0">Web Design</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('webDesign.create') }}" class="btn btn-primary">Create Web Design</a>
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
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($webDesigns as $webDesign)
                                    <tr>
                                        <td>{{ $webDesign->title }}</td>
                                        <td>
                                            <img width="70px;" height="70px;" src="{{ asset($webDesign->image ?? get_static_option('no_image')) }}" alt="Icon">
                                        </td>
                                        <td>
                                            <a href="{{ route('webDesign.edit', $webDesign->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
                                            <button class="text-white btn btn-danger " onclick="delete_function(this)" value="{{ route('webDesign.destroy', $webDesign) }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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

