<!-- RIGHT MENU -->
<div class="modal fade window-popup right-menu-popup" id="right-menu" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="right-menu">
                    <div class="user-menu-close" data-dismiss="modal">
                        <div class="user-menu-content">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <div class="widget w-info">
                        <a class="site-logo" href="{{ route('frontend.home') }}">
                            <!-- MAIN HEADER RESPONSIVE LOGO IMAGE-->
                            <img loading="lazy"  src="{{ asset(get_static_option('frontend_logo')) }}" alt="logo" width="70">
                            <!-- /MAIN HEADER RESPONSIVE LOGO IMAGE-->
                            <div class="logo-text">
                                <div class="logo-title"><span class="weight-black">{{ config('app.name') }}</div>
                            </div>
                        </a>
                        <p class="widget-text">{{ get_static_option('company_short_description') }}</p>
                    </div>
                    <div class="widget w-login">
                        <h4 class="widget-title">Sign In to Your Account</h4>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-item">
                                <input type="email" value="{{ old('email') }}" id="email" name="email" placeholder="{{ __('Enter email here') }}" required>
                            </div>
                            <div class="form-item">
                                <input type="password" id="password" name="password" placeholder="{{ __('Enter password here') }}" required>
                            </div>
                            @if (Route::has('password.request'))
                                <div class="form-item">
                                    <div class="remember-wrap">
                                        <a href="{{ route('password.request') }}">Lost your password?</a>
                                    </div>
                                </div>
                            @endif
                            <div class="form-item">
                                <button type="submit" class="crumina-button button--dark button--l w-100">{{ __('Log in Now') }}</button>
                            </div>
                        </form>
                    </div>
                    <div class="widget w-contacts">
                        <h4 class="widget-title">Contacts</h4>
                        <div class="contact-item">
                            <img loading="lazy"  class="crumina-icon" src="{{ asset('assets/frontend/img/demo-content/icons/icon1.png') }}" alt="phone">
                            <div class="content">
                                <a href="tel:{{ get_static_option('company_phone') }}" class="title">{{ get_static_option('company_phone') }}</a>
                                <p class="sub-title">{{ get_static_option('company_office_hour') }}</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <img loading="lazy"  class="crumina-icon" src="{{ asset('assets/frontend/img/demo-content/icons/icon2.png') }}" alt="mail">
                            <div class="content">
                                <a href="mailto:{{ get_static_option('company_email') }}" class="title">{{ get_static_option('company_email') }}</a>
                                <p class="sub-title">Online support</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <img loading="lazy"  class="crumina-icon" src="{{ asset('assets/frontend/img/demo-content/icons/icon3.png') }}" alt="location">
                            <div class="content">
                                <div class="title">{{ get_static_option('company_address') }}</div>
                                <p class="sub-title">Our address</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /RIGHT MENU -->
