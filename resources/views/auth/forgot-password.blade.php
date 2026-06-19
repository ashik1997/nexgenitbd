@extends('layouts.auth.app')
@push('title')
    Forgot - password
@endpush
@push('meta-description')

@endpush
@push('meta-image')

@endpush
@push('style')

@endpush

@section('content')
    <div class="auth-box login-box">
        <!-- Start row -->
        <div class="row no-gutters align-items-center justify-content-center">
            <!-- Start col -->
            <div class="col-6">
                <!-- Start Auth Box -->
                <div class="auth-box-right">
                    <div class="card">
                        <div class="card-body">
                            <form  method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <h4 class="text-primary mb-4">{{ __('Forgot password !') }}</h4>
                                <div class="bg-white">
                                    <div class="form-group bg-white">
                                        <input name="email" value="{{ old('email') }}" type="email" class="form-control bg-green" placeholder="Email" required="required">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <input type="submit" class="btn btn-primary" value="Send Password Reset Link">
                                </div>
                            </form>
                            <div class="login-or">
                                <h6 class="text-muted">{{ __('OR') }}</h6>
                            </div>

                                <div class="col-12 text-center">
                                    <a id="forgot-psw" href="{{ route('login') }}" class="font-14">{{ __('Redirect to login?') }}</a>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- End Auth Box -->
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
@endsection
@push('script')

@endpush
