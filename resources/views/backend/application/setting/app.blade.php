@extends('layouts.backend.app')
@push('title')
    Update App information
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
                <h4 class="page-title">Update App Information</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">App</a></li>
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
            <div class="card m-b-30 col-12 ">
                <div class="card-header bg-danger">
                    <h5 class="card-title">App</h5>
                </div>
                <div class="card-body">
                    <form class="row" method="POST" action="{{ route('backend.appStaticOptionUpdate') }}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="app_name" class="col-sm-4 col-form-label">Facebook page ID</label>
                                <div class="col-sm-8">
                                    <input value="{{ get_static_option('fb_page_id')  }}" name="page_id" type="text" class="form-control" id="app_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="app_name" class="col-sm-4 col-form-label">Facebook chat color code</label>
                                <div class="col-sm-8">
                                    <input value="{{ get_static_option('fb_page_color')  }}" name="page_color" type="text" class="form-control" id="app_name">
                                </div>
                            </div>
                            <hr class="bg-danger">
                            <div class="form-group row">
                                <label for="mailer" class="col-sm-4 col-form-label">Mailer</label>
                                <div class="col-sm-8">
                                    <input value="{{ env('MAIL_MAILER')  }}" name="mailer"
                                           type="text" class="form-control" id="mailer">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="host" class="col-sm-4 col-form-label">Host</label>
                                <div class="col-sm-8">
                                    <input value="{{ env('MAIL_HOST')  }}" name="host"
                                           type="text" class="form-control" id="host">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="port" class="col-sm-4 col-form-label">Port</label>
                                <div class="col-sm-8">
                                    <input value="{{ env('MAIL_PORT')  }}" name="port"
                                           type="text" class="form-control" id="port">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="username" class="col-sm-4 col-form-label">Username</label>
                                <div class="col-sm-8">
                                    <input value="{{ env('MAIL_USERNAME')  }}" name="username"
                                           type="text" class="form-control" id="username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-4 col-form-label">Password</label>
                                <div class="col-sm-8">
                                    <input value="{{ env('MAIL_PASSWORD')  }}" name="password"
                                           type="text" class="form-control" id="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="encryption" class="col-sm-4 col-form-label">Encryption</label>
                                <div class="col-sm-8">
                                    <input value="{{ env('MAIL_ENCRYPTION')  }}" name="encryption"
                                           type="text" class="form-control" id="encryption">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="from_email" class="col-sm-4 col-form-label">Mail from email</label>
                                <div class="col-sm-8">
                                    <input value="{{ env('MAIL_FROM_ADDRESS')  }}" name="from_email"
                                           type="text" class="form-control" id="from_email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="from_name" class="col-sm-4 col-form-label">Mail from name</label>
                                <div class="col-sm-8">
                                    <input value="{{ env('MAIL_FROM_NAME')  }}" name="from_name"
                                           type="text" class="form-control" id="from_name">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" id="submit-btn" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                    <br>

                    <div class="mt-5 row justify-content-center">
                        @if(Session::has('message'))
                            <p class="alert alert-info">{{ Session::get('message') }}</p>
                        @endif
                       <a href="{{  route('cache.clean') }}" class="btn btn-info mx-2">Clean all cache</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')

@endpush

