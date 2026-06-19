@extends('layouts.backend.app')
@push('title')
    Website client
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
                <h4 class="page-title">Website client table</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:0">Website client</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('websiteClient.create') }}" class="btn btn-primary">Create website client</a>
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
                                    <th scope="col">Order</th>
                                    <th scope="col">Client</th>
                                    <th scope="col">Industry</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($websiteClients as $websiteClient)
                                        <tr>
                                            <td>{{ $websiteClient->sort_order }}</td>
                                            <td>
                                                <strong>{{ $websiteClient->name }}</strong>
                                                @if($websiteClient->url && $websiteClient->url !== '#')
                                                    <div><a href="{{ $websiteClient->url }}" target="_blank">{{ Str::limit($websiteClient->url, 35) }}</a></div>
                                                @endif
                                            </td>
                                            <td>{{ $websiteClient->industry ?: '—' }}</td>
                                            <td>
                                                <img style="width:110px;height:55px;object-fit:contain" src="{{ asset($websiteClient->image ?? get_static_option('no_image')) }}" alt="{{ $websiteClient->name }}">
                                            </td>
                                            <td><span class="badge badge-{{ $websiteClient->is_active ? 'success' : 'secondary' }}">{{ $websiteClient->is_active ? 'Visible' : 'Hidden' }}</span></td>
                                            <td>
                                                <a href="{{ route('websiteClient.edit', $websiteClient->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
                                                <button class="text-white btn btn-danger " onclick="delete_function(this)" value="{{ route('websiteClient.destroy', $websiteClient) }}">Delete</button>
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
