<!-- footer section -->
    <footer class="gradient-bg-6 position-relative l8-footer">
        <div class="shape l8-footer-shape-top-left">
            <img src="image/l8/svg/footer-shape.svg" alt="" class="w-100 light-shape default-shape z-index-n2">
        </div>
        <div class="container pt-lg-23 pt-15 pb-12">
            <div class="row justify-content-between" data-aos="fade-left" data-aos-duration="800" data-aos-once="true">
                <div class="col col-cus-6">
                    <div class="footer-widget widget2 mb-md-0 mb-13">
                        <!-- footer widget title start -->
                        <p class="widget-title font-size-3 font-weight-normal text-periwinkle-gray mb-md-9 mb-7 font-family-inter">
                            {{ __('external.Useful links') }}
                        </p>
                        <!-- footer widget title end -->
                        <!-- widget social menu start -->
                        <ul class="widget-links pl-0 list-unstyled list-hover-primary">
                            <li class="mb-6"><a class="text-selago-3 font-size-5 font-weight-normal font-family-inter" href="{{ makeLink('pricing') }}">{{ __('external.Pricing') }}</a></li>
                            <li class="mb-6"><a class="text-selago-3 font-size-5 font-weight-normal font-family-inter" href="{{ route('homepage') }}">{{ __('external.Home') }}</a></li>
                            <li class="mb-6"><a class="text-selago-3 font-size-5 font-weight-normal font-family-inter" href="{{ makeLink('contact') }}">{{ __('external.Contact us') }}</a></li>
                            <li class="mb-6"><a class="text-selago-3 font-size-5 font-weight-normal font-family-inter" href="{{ route('terms.and.conditions') }}">{{ __('external.Terms and Conditions') }}</a></li>
                        </ul>
                        <!-- widget social menu end -->
                    </div>
                </div>
                <div class="col col-cus-6">
                    <div class="footer-widget widget3 mb-sm-0 mb-13">
                        <!-- footer widget title start -->
                        <p class="widget-title font-size-3 font-weight-normal text-periwinkle-gray mb-md-9 mb-7 font-family-inter">
                            {{ __('external.Projects') }}
                        </p>
                        <!-- footer widget title end -->
                        <!-- widget social menu start -->
                        <ul class="widget-links pl-0 list-unstyled list-hover-primary">
                            <li class="mb-6"><a class="text-selago-3 font-size-5 font-weight-normal font-family-inter" href="{{ route('projects.manage') }}">{{ __('external.Dashboard') }}</a></li>
                            <li class="mb-6"><a class="text-selago-3 font-size-5 font-weight-normal font-family-inter" href="{{ route('project.create') }}">{{ __('project.Create a Project') }}</a></li>
                            <li class="mb-6"><a class="text-selago-3 font-size-5 font-weight-normal font-family-inter" href="{{ route('projects.manage') }}">{{ __('project.Manage projects') }}</a></li>
                        </ul>
                        <!-- widget social menu end -->
                    </div>
                </div>
                <div class="col col-cus-6">
                    <div class="footer-widget widget3 mb-sm-0 mb-13">
                        <!-- footer widget title start -->
                        <p class="widget-title font-size-3 font-weight-normal text-periwinkle-gray mb-md-9 mb-7 font-family-inter">
                            {{ __('external.Get in touch') }}
                        </p>
                        <!-- footer widget title end -->
                        <!-- widget social menu start -->
                        <ul class="widget-links pl-0 list-unstyled list-hover-primary">
                            <li class="mb-6 text-light">
                                <i class="fa fa-phone"></i> <a class="text-light" href="tel:{{ env('PHONE') }}">{{ env('PHONE') }}</a>
                            </li>
                            <li class="mb-6 text-light">
                                <i class="fa fa-envelope"></i> <a class="text-light" href="mailto:{{ env('EMAIL') }}">{{ env('EMAIL') }}</a>
                            </li>
                        </ul>
                        <!-- widget social menu end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom start -->
        <div class="pt-6 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 px-0">
                        <div class="navbar site-navbar d-md-flex d-block text-center px-0">
                            <!-- DO NOT DELETE THIS CREDIT. TO DELETE, PLEASE BUY PRO LICENSE -->
                            <div class="copyright">
                                <p class="font-size-1 font-family-5 text-periwinkle-gray line-height-1p5 mb-0 font-family-inter"> &copy; {{ env('APP_NAME') }} 2020 All right reserved, Page designed by Grayic. </p>
                            </div>
                            <!-- copyright end-->
                            <!-- footer-menu start-->
                            <div class="footer-menu">
                                <!-- navbar-nav-wrapper start-->
                                <div class="navbar-nav-wrapper">
                                    <!-- main-menu start-->
                                    <ul class="mb-0 list-unstyled d-flex flex-row justify-content-center">
                                        <li class="mx-3">
                                            <a class="text-periwinkle-gray font-size-1 font-weight-normal font-family-inter" href="{{ route('homepage') }}">{{ __('external.Home') }}</a>
                                        </li>
                                        <li class="mx-3">
                                            <a class="text-periwinkle-gray font-size-1 font-weight-normal font-family-inter" href="{{ makeLink('contact') }}">{{ __('external.Contact us') }}</a>
                                        </li>
                                        <li class="mx-3">
                                            <a class="text-periwinkle-gray font-size-1 font-weight-normal font-family-inter" href="{{ route('terms.and.conditions') }}">{{ __('external.Terms and Conditions') }}</a>
                                        </li>
                                    </ul>
                                    <!-- main-menu end-->
                                </div>
                                <!-- navbar-nav-wrapper end-->
                            </div>
                            <!-- footer-menu end-->
                            <div class="ml-auto pr-2 ml-lg-12 ml-md-0">
                                <!-- widget social icon start -->
                                <div class="social-icons">
                                    <!-- widget social icon list start -->
                                    <ul class="pl-0 list-unstyled mb-lg-0 mb-0">
                                        <li class="d-inline-block px-3 ml-3"><a href="{{ env('FACEBOOK_URL') }}" class="hover-color-primary text-white"><i class="fab fa-facebook-f font-size-3 pt-2"></i></a></li>
                                        <li class="d-inline-block px-3 ml-3"><a href="{{ env('TWITTER_URL') }}" class="hover-color-primary text-white"><i class="fab fa-twitter font-size-3 pt-2"></i></a></li>
                                        <li class="d-inline-block px-3 ml-3"><a href="{{ env('INSTAGRAM_URL') }}" class="hover-color-primary text-white"><i class="fab fa-linkedin-in font-size-3 pt-2"></i></a></li>
                                    </ul>
                                    <!-- widget social icon list end -->
                                </div>
                                <!-- widget social icon end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>