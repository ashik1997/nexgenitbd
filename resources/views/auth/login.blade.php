@extends('layouts.auth.app')
@push('title')
    Login
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
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <h4 class="text-primary mb-4">{{ __('Log in !') }}</h4>
                            <div class="form-group">
                                <input type="email" value="{{ old('email') }}" class="form-control" id="email" name="email" placeholder="{{ __('Enter email here') }}" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('Enter password here') }}" required>
                            </div>
                          <button type="submit" class="btn btn-success btn-lg btn-block font-18">{{ __('Log in Now') }}</button>
                        </form>
                        <div class="login-or">
                            <h6 class="text-muted">{{ __('OR') }}</h6>
                        </div>
                        @if (Route::has('password.request'))
                            <div class="col-12 text-center">
                                    <a id="forgot-psw" href="{{ route('password.request') }}" class="font-14">{{ __('Forgot Password?') }}</a>
                            </div>
                        @endif
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
