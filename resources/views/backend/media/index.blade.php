@extends('layouts.backend.app')

@push('title')
    Media Library
@endpush

@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="page-title">Media Library</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Media Library</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <button type="button" class="btn btn-primary js-open-media-manager">Upload & Browse Images</button>
            </div>
        </div>
    </div>

    <div class="contentbar">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="media-page-intro">
                    <div>
                        <h5>One image library for the entire project</h5>
                        <p>Upload once, then reuse the same image from any image field in the admin panel.</p>
                    </div>
                    <div class="media-page-feature"><i class="feather icon-search"></i><span>Searchable</span></div>
                    <div class="media-page-feature"><i class="feather icon-repeat"></i><span>Reusable</span></div>
                    <div class="media-page-feature"><i class="feather icon-image"></i><span>Optimized</span></div>
                </div>
                <div id="media-page-grid" class="media-library-grid"></div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (window.NexgenMediaManager) {
            window.NexgenMediaManager.renderInline(document.getElementById('media-page-grid'));
        }
    });
</script>
@endpush
