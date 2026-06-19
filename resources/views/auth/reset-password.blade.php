@extends('layouts.auth.app')
@push('title')
    Reset - password
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
                            @if(session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form   method="POST" action="{{ route('password.update') }}" class="tr-form">
                                @csrf
                                <h4 class="text-primary mb-4">{{ __('Reset Password !') }}</h4>
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                <div class="bg-white">
                                    <div class="form-group">
                                        <input name="email"  value="{{ old('email', $request->email) }}" type="email" class="form-control" placeholder="Email" required="required">
                                    </div>
                                </div>
                                <div class="bg-white">
                                    <div class="form-group">
                                        <input name="password" type="password" class="form-control" placeholder="Password" required="required">
                                    </div>
                                </div>
                                <div class="bg-white">
                                    <div class="form-group">
                                        <input name="password_confirmation" id="password_confirmation"  type="password" class="form-control" placeholder="Confirm Password" required="required">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <input type="submit" class="btn btn-primary" value="Reset Password">
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



