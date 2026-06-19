<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logobar -->
        <div class="logobar">
            <a href="{{ route('dashboard') }}" class="logo logo-large"><img src="{{ asset(get_static_option('backend_logo') ?? get_static_option('no_image')) }}" class="img-fluid" alt="logo"></a>
            <a href="{{ route('dashboard') }}" class="logo logo-small"><img src="{{ asset(get_static_option('backend_logo')) ?? get_static_option('no_image')}}" class="img-fluid" alt="logo"></a>
        </div>
        <!-- End Logobar -->
        @if (Auth::check())
            <!-- Start Profilebar -->
            <div class="profilebar text-center">
                <img src="{{ asset(auth()->user()->avatar ?? get_static_option('no_image')) }}" class="img-fluid" alt="profile">
                <div class="profilename">
                    <h5 class="text-white">{{ auth()->user()->name }}</h5>
                    <p>{{ auth()->user()->email }}</p>
                </div>
                <div class="userbox">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="{{ route('profile') }}" class="profile-icon"><img src="{{ asset('assets/panel/vertical/images/svg-icon/user.svg') }}" class="img-fluid" alt="user"></a></li>
                        <li class="list-inline-item logout-btn" onclick="logout()"><a href="javascript:0" class="profile-icon"><img src="{{ asset('assets/panel/vertical/images/svg-icon/logout.svg') }}" class="img-fluid" alt="logout"></a></li>
                    </ul>
                </div>
            </div>
            <!-- End Profilebar -->
        @endif

        <!-- Start Navigationbar -->
        <div class="navigationbar">
            <ul class="vertical-menu">
                <li>
                    <a target="_blank" href="{{ route('frontend.home') }}">
                      <img src="{{ asset('assets/panel/vertical/images/svg-icon/dashboard.svg') }}" class="img-fluid" alt="dashboard"><span>View Website</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}">
                      <img src="{{ asset('assets/panel/vertical/images/svg-icon/dashboard.svg') }}" class="img-fluid" alt="dashboard"><span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('media.index') }}">
                        <img src="{{ asset('assets/panel/vertical/images/svg-icon/widgets.svg') }}" class="img-fluid" alt="media"><span>Media Library</span>
                    </a>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <img src="{{ asset('assets/panel/vertical/images/svg-icon/layouts.svg') }}" class="img-fluid" alt="layouts">Order  <span class="badge badge-warning">{{ incomplete_total_order() }}</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('graphicOrder.index') }}"><i class="mdi mdi-circle"></i>Graphic Order <span class="badge badge-danger">{{ incomplete_graphic_order() }}</span></a></li>
                        <li><a href="{{ route('webDesignOrder.index') }}"><i class="mdi mdi-circle"></i>Web Design Order <span class="badge badge-danger">{{ incomplete_web_design_order() }}</span></a></li>
                        <li><a href="{{ route('hostingPackageOrder.index') }}"><i class="mdi mdi-circle"></i>Hosting Order <span class="badge badge-danger">{{ incomplete_hosting_order() }}</span></a></li>
                        <li><a href="{{ route('voipDialerOrder.index') }}"><i class="mdi mdi-circle"></i>Voip Dialer Order <span class="badge badge-danger">{{ incomplete_voip_dialer_order() }}</span></a></li>
                        <li><a href="{{ route('voipHostingDomainOrder.index') }}"><i class="mdi mdi-circle"></i>Voip Hosting Domain Order <span class="badge badge-danger">{{ incomplete_voip_hosting_domain_order() }}</span></a></li>
                        <li><a href="{{ route('vpnPackageOrder.index') }}"><i class="mdi mdi-circle"></i>Vpn Package Order <span class="badge badge-danger">{{ incomplete_vpn_package_order() }}</span></a></li>
                        <li><a href="{{ route('webDesignPackageOrder.index') }}"><i class="mdi mdi-circle"></i>Web Design Package Order <span class="badge badge-danger">{{ incomplete_web_design_package_order() }}</span></a></li>
                        <li><a href="{{ route('bulkSmsOrder.index') }}"><i class="mdi mdi-circle"></i>Bulk sms Order <span class="badge badge-danger">{{ incomplete_bulk_sms_order() }}</span></a></li>
                        <li><a href="{{ route('domainOrder.index') }}"><i class="mdi mdi-circle"></i>Domain Order <span class="badge badge-danger">{{ incomplete_domain_order() }}</span></a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <img src="{{ asset('assets/panel/vertical/images/svg-icon/layouts.svg') }}" class="img-fluid" alt="layouts"><span>Website</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li>
                            <a href="javaScript:void();">
                                <span>Banner</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{ route('websiteBanner.create') }}"><i class="mdi mdi-circle"></i>Create</a></li>
                                <li><a href="{{ route('websiteBanner.index') }}"><i class="mdi mdi-circle"></i>Banner list</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();">
                                <span>Demo</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{ route('demo.index') }}"><i class="mdi mdi-circle"></i>Demo list </a></li>
                                <li><a href="{{ route('demo.create') }}"><i class="mdi mdi-circle"></i>Demo create </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();">
                                <span>Blog</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{ route('blog.index') }}"><i class="mdi mdi-circle"></i>Blog list </a></li>
                                <li><a href="{{ route('blog.create') }}"><i class="mdi mdi-circle"></i>Blog create </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();">
                                <span>Testimonial</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{ route('testimonial.index') }}"><i class="mdi mdi-circle"></i>Testimonial list </a></li>
                                <li><a href="{{ route('testimonial.create') }}"><i class="mdi mdi-circle"></i>Testimonial create </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();">
                                <span>Home content</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{ route('homeContent.index') }}"><i class="mdi mdi-circle"></i>Home content list </a></li>
                                <li><a href="{{ route('homeContent.create') }}"><i class="mdi mdi-circle"></i>Home content create </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();">
                                <span>Gallery</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{ route('gallery.index') }}"><i class="mdi mdi-circle"></i>Gallery list </a></li>
                                <li><a href="{{ route('gallery.create') }}"><i class="mdi mdi-circle"></i>Gallery create </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();">
                                <span>Faq</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{ route('faq.index') }}"><i class="mdi mdi-circle"></i>Faq list </a></li>
                                <li><a href="{{ route('faq.create') }}"><i class="mdi mdi-circle"></i>Faq create </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();">
                                <span>Custom page</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{ route('customPage.create') }}"><i class="mdi mdi-circle"></i>Create</a></li>
                                @foreach(custom_pages() as $page)
                                    <li><a href="{{ route('customPage.edit',$page) }}"><i class="mdi mdi-circle"></i>{{ $page->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();">
                                <span>Client</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{ route('websiteClient.create') }}"><i class="mdi mdi-circle"></i>Create</a></li>
                                <li><a href="{{ route('websiteClient.index') }}"><i class="mdi mdi-circle"></i>Client list</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <img src="{{ asset('assets/panel/vertical/images/svg-icon/layouts.svg') }}" class="img-fluid" alt="layouts"><span>Message</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('websiteMessage.index') }}"><i class="mdi mdi-circle"></i>Message list </a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <img src="{{ asset('assets/panel/vertical/images/svg-icon/layouts.svg') }}" class="img-fluid" alt="layouts"><span>Subscribers</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('websiteSubscribe.index') }}"><i class="mdi mdi-circle"></i>Subscribers list </a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <img src="{{ asset('assets/panel/vertical/images/svg-icon/layouts.svg') }}" class="img-fluid" alt="layouts"><span>Package</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li>
                            <a href="javaScript:void();">
                                <span>VPN Package</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{ route('vpnPackage.create') }}"><i class="mdi mdi-circle"></i>Create</a></li>
                                <li><a href="{{ route('vpnPackage.index') }}"><i class="mdi mdi-circle"></i>VPN package list</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="vertical-submenu">
                        <li>
                            <a href="javaScript:void();">
                                <span>Web design Package</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{ route('webDesignPackage.create') }}"><i class="mdi mdi-circle"></i>Create</a></li>
                                <li><a href="{{ route('webDesignPackage.index') }}"><i class="mdi mdi-circle"></i>Web design package list</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="vertical-submenu">
                        <li>
                            <a href="javaScript:void();">
                                <span>Hosting Package</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{ route('hostingPackage.create') }}"><i class="mdi mdi-circle"></i>Create</a></li>
                                <li><a href="{{ route('hostingPackage.index') }}"><i class="mdi mdi-circle"></i>Hosting package list</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="vertical-submenu">
                        <li>
                            <a href="javaScript:void();">
                                <span>Bulk sms</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{ route('bulkSms.create') }}"><i class="mdi mdi-circle"></i>Create</a></li>
                                <li><a href="{{ route('bulkSms.index') }}"><i class="mdi mdi-circle"></i>Bulk sms list</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <img src="{{ asset('assets/panel/vertical/images/svg-icon/layouts.svg') }}" class="img-fluid" alt="layouts"><span>VoIp Dialer</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('voipDialer.create') }}"><i class="mdi mdi-circle"></i>Create</a></li>
                        <li><a href="{{ route('voipDialer.index') }}"><i class="mdi mdi-circle"></i>VoIp Dialer list</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <img src="{{ asset('assets/panel/vertical/images/svg-icon/layouts.svg') }}" class="img-fluid" alt="layouts"><span>Web Design</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('webDesign.create') }}"><i class="mdi mdi-circle"></i>Create</a></li>
                        <li><a href="{{ route('webDesign.index') }}"><i class="mdi mdi-circle"></i>Web Design list</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <img src="{{ asset('assets/panel/vertical/images/svg-icon/layouts.svg') }}" class="img-fluid" alt="layouts"><span>Graphics</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('websiteGraphic.create') }}"><i class="mdi mdi-circle"></i>Create</a></li>
                        <li><a href="{{ route('websiteGraphic.index') }}"><i class="mdi mdi-circle"></i>Graphics list</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <img src="{{ asset('assets/panel/vertical/images/svg-icon/layouts.svg') }}" class="img-fluid" alt="layouts"><span>Voip Hosting Domain</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('voipHostingDomain.create') }}"><i class="mdi mdi-circle"></i>Create</a></li>
                        <li><a href="{{ route('voipHostingDomain.index') }}"><i class="mdi mdi-circle"></i>Voip Hosting Domain list</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <img src="{{ asset('assets/panel/vertical/images/svg-icon/layouts.svg') }}" class="img-fluid" alt="layouts"><span>Users</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('user.create') }}"><i class="mdi mdi-circle"></i>Create</a></li>
                        <li><a href="{{ route('user.index') }}"><i class="mdi mdi-circle"></i>User list</a></li>
                    </ul>
                </li>
                {{--Visitor--}}
                <li>
                    <a href="javaScript:void();">
                        <img src="assets/panel/vertical/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard"><span>Visitor</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('visitorActivity.index') }}"><i class="mdi mdi-circle"></i>Visitor list</a></li>
                    </ul>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('visitor.today') }}"><i class="mdi mdi-circle"></i>Visitor today</a></li>
                    </ul>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('visitor.last_seven_day') }}"><i class="mdi mdi-circle"></i>Visitor last 7 day</a></li>
                    </ul>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('visitor.last_thirty_day') }}"><i class="mdi mdi-circle"></i>Visitor last 30 day</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <img src="{{ asset('assets/panel/vertical/images/svg-icon/layouts.svg') }}" class="img-fluid" alt="layouts"><span>Application</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li>
                            <a href="javaScript:void();">
                                <span>Setting</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{ route('backend.getGeneralStaticForm') }}"><i class="mdi mdi-circle"></i>Static Option</a></li>
                                <li><a href="{{ route('backend.appStaticForm') }}"><i class="mdi mdi-circle"></i>App</a></li>
                                <li><a href="{{ route('backend.textStaticForm') }}"><i class="mdi mdi-circle"></i>Static text</a></li>
                                <li><a href="{{ route('backend.logoAndImageGeneralStaticForm') }}"><i class="mdi mdi-circle"></i>Logo and Images</a></li>
                                <li><a href="{{ route('backend.socialStaticOptionForm') }}"><i class="mdi mdi-circle"></i>Social</a></li>
                                <li><a href="{{ route('backend.counterStaticOptionForm') }}"><i class="mdi mdi-circle"></i>Counter</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <br>
                <br>
                <br>
                <br>
                <br>
            </ul>
        </div>
        <!-- End Navigationbar -->
    </div>
    <!-- End Sidebar -->
</div>
