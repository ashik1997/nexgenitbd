@extends('layouts.backend.app')
@push('title')
    Edit custom page
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
                <h4 class="page-title"> Edit custom page</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">create</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('customPage.create') }}" class="btn btn-primary">{{ __('Create') }}</a>
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
                    <h5 class="card-title"> Edit custom page</h5>
                </div>
                <div class="card-body">
                    <form class="row justify-content-center" method="POST" action="{{  route('customPage.update', $customPage) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" required class="form-control" id="name" value="{{ $customPage->name }}">
                                @error('name')
                                <small id="name" class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" required class="form-control" id="title" value="{{ $customPage->title }}">
                                @error('title')
                                <small class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="serial">Serial <span class="text-danger">*</span></label>
                                <input type="number" name="serial" required class="form-control" id="serial" value="{{ $customPage->serial }}">
                                @error('serial')
                                <small class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status">Status <span class="text-danger">*</span></label>
                                <select id="status" class="select2-single form-control select2-hidden-accessible" name="status" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option value="1" @if($customPage->status == 1) selected @endif>Active</option>
                                    <option value="0"  @if($customPage->status == 0) selected @endif>Inactive</option>
                                </select>
                                @error('status')
                                <small id="status" class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-12">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea name="description" type="text" class="form-control" id="description">{!! $customPage->description !!}</textarea>
                                @error('description')
                                <small id="image" class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" id="submit-btn" class="btn btn-primary">Save</button>
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
@push('summer-note')
    <script>
        $('#description').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endpush


