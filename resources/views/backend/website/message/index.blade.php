@extends('layouts.backend.app')
@push('title')
    Website message
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
                <h4 class="page-title">Website message table</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:0">Website message</a></li>
                    </ol>
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($websiteMessages as $websiteMessage)
                                    <tr>
                                        <td>{{ $websiteMessage->name }}</td>
                                        <td>{{ $websiteMessage->email }}</td>
                                        <td>{{ $websiteMessage->phone }}</td>
                                        <td>
                                            <button class="text-white btn btn-danger " onclick="delete_function(this)" value="{{ route('websiteMessage.destroy', $websiteMessage) }}">Delete</button>
                                            <button class="text-white btn btn-info show-btn"  value="{{ $websiteMessage->message }}">Show</button>
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
<script>

    $('.show-btn').click(function(){
        Swal.fire({
            text: $(this).val(),
          })
    });
</script>
@endpush

