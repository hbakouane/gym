<!-- pricing-area section -->
<div class="position-relative overflow-hidden bg-default pt-md-21 pt-15 pb-lg-13 pb-10 z-index-1" id="pricing">
    <div class="bg-top bg-selago-3 pos-abs-tl w-100 h-50">
        <!-- shape start -->
        <div class="shape shape-bottom-right pos-abs-bl mb-xl-n15 mb-lg-n11 mb-md-n12 mb-n5 mr-n1 w-100 h-0 z-index-n1">
            <img src="image/l8/svg/line.svg" alt="" class="w-100 light-shape default-shape">
            <img src="image/l1/svg/l1-featrues-bg-shape-dark.svg" alt="" class="w-100 dark-shape">
        </div>
        <!-- shape end -->
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 px-0 text-center" data-aos="fade-down" data-aos-duration="800" data-aos-once="true">
                <!-- features-1 section-title start -->
                <h2 class="font-size-20 text-default-color-2 letter-spacing-np3 font-weight-bold font-family-5 mb-6">Choose a plan to start</h2>
                <p class="text-default-color-4 font-size-7 line-height-1p714 mb-11 font-family-inter">{{ __('external.We have the most affordable prices.') }}</p>
                <!-- features-1 section-title end -->
            </div>
        </div>
        <div class="row justify-content-center" id="table-price-value" data-pricing-dynamic data-value-active="monthly">
{{--            <div class="col-md-12 text-center">--}}
{{--                <!-- toggle-btn start -->--}}
{{--                <div class="toggle-btn d-inline-block mt-7 justify-content-center mb-8">--}}
{{--                    <a class="btn-toggle btn-toggle-2 font-size-2 line-height-reset d-flex mx-6 price-deck-trigger border-default-color-2 px-6" data-pricing-trigger data-target="#table-price-value" href="javascript:">--}}
{{--                        <span class="round bg-turquoise"></span>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <!-- toggle-btn end -->--}}
{{--            </div>--}}
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
                <!-- single-price start -->
                <div class="single-price border bg-default pt-9 pb-10 mb-lg-0 mb-9 pl-12 pr-lg-21 pr-sm-15 pr-11 shadow-13 hover-shadow-3" data-aos="fade-right" data-aos-duration="800" data-aos-once="true">
                    <!-- price-top start -->
                    <div class="price-top justify-content-between mb-2">
                        <span class="font-size-2 letter-spacing-np43 line-height-2p66 text-oslogray text-uppercase font-weight-bold mb-2">Basic</span>
                    </div>
                    <!-- price-top end -->
                    <!-- main-price start -->
                    <div class="main-price">
                        <div class="price mt-3 position-relative pl-7">
                            <span class="text-default-color-2 d-inline-block letter-spacing-n1p2 mb-0 font-size-13 font-weight-bold font-family-5 dynamic-value pos-abs-tl mt-md-3">$</span>
                            <h2 class="heading-default-color d-inline-block mb-0 font-size-22 font-weight-bold font-family-3 line-height-1p304 dynamic-value" data-active="15" data-monthly="19" data-yearly="149"></h2>
                            <span class="text-default-color-2 font-size-6 font-family-5 font-weight-bold letter-spacing-np3 dynamic-value line-height-reset" data-active="/ month" data-monthly="/ month" data-yearly="/ year"></span>
                        </div>
                    </div>
                    <!-- main-price end -->
                    <p class="font-family-5 font-size-3 letter-spacing-np4 text-default-color-4 mb-0">Good for small business launching their products less then once a year</p>
                    <!-- price-body start -->
                    <div class="price-body pt-8">
                        <ul class="pricing-list with-check-icon list-unstyled mb-9">
                            <li class="font-size-5 text-default-color-2 letter-spacing-np45 font-weight-normal font-family-5 mb-3"> <i class="icon icon-check-2-2 mr-4 text-default-color-2"></i> Unlimited Blocks</li>
                            <li class="font-size-5 text-default-color-2 letter-spacing-np45 font-weight-normal font-family-5 mb-3"> <i class="icon icon-check-2-2 mr-4 text-default-color-2"></i> 5GB Clould Storages</li>
                            <li class="font-size-5 text-default-color-2 letter-spacing-np45 font-weight-normal font-family-5 mb-3"><del class="text-gray"> <i class="icon icon-check-2-2 mr-4"></i> Custom Domain Names</del></li>
                            <li class="font-size-5 text-default-color-2 letter-spacing-np45 font-weight-normal font-family-5 mb-3"><del class="text-gray"> <i class="icon icon-check-2-2 mr-4"></i>Unlimited Emails</del></li>
                        </ul>
                    </div>
                    <!-- price-body end -->
                    <!-- price-btn start -->
                    <div class="price-btn">
                        @include('partials.trial_button')
                    </div>
                    <!-- price-btn end -->
                    <p class="font-size-3 text-dovegray font-family-5 mb-0 mt-5">No credit card required</p>
                </div>
                <!-- single-price end -->
            </div>
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
                <!-- single-price start -->
                <div class="single-price border bg-default popular-pricing popular-pricing-3 position-relative pt-9 pb-10 mb-lg-0 mb-9 pl-12 pr-lg-21 pr-sm-15 pr-11 shadow-13 hover-shadow-3" data-aos="fade-up" data-aos-duration="800" data-aos-once="true">
                    <!-- price-top start -->
                    <div class="price-top justify-content-between mb-2">
                        <span class="font-size-2 letter-spacing-np43 line-height-2p66 text-oslogray text-uppercase font-weight-bold mb-2">Pro</span>
                    </div>
                    <!-- price-top end -->
                    <!-- main-price start -->
                    <div class="main-price">
                        <div class="price mt-3 position-relative pl-7">
                            <span class="text-default-color-2 d-inline-block letter-spacing-n1p2 mb-0 font-size-13 font-weight-bold font-family-5 dynamic-value pos-abs-tl mt-md-3">$</span>
                            <h2 class="text-default-color-2 d-inline-block mb-0 font-size-22 font-weight-bold font-family-3 line-height-1p304 dynamic-value" data-active="15" data-monthly="29" data-yearly="249"></h2>
                            <span class="text-default-color-2 font-size-6 font-family-5 font-weight-bold letter-spacing-np3 dynamic-value line-height-reset" data-active="/ month" data-monthly="/ month" data-yearly="/ year"></span>
                        </div>
                    </div>
                    <!-- main-price end -->
                    <p class="font-family-5 font-size-3 letter-spacing-np4 text-default-color-4 mb-0">Good for small business launching their products less then once a year</p>
                    <!-- price-body start -->
                    <div class=" price-body pt-8">
                        <ul class="pricing-list with-check-icon list-unstyled mb-9">
                            <li class="font-size-5 text-default-color-2 letter-spacing-np45 font-weight-normal font-family-5 mb-3"> <i class="icon icon-check-2-2 mr-4 text-default-color-2"></i> Unlimited Blocks</li>
                            <li class="font-size-5 text-default-color-2 letter-spacing-np45 font-weight-normal font-family-5 mb-3"> <i class="icon icon-check-2-2 mr-4 text-default-color-2"></i> 5GB Clould Storages</li>
                            <li class="font-size-5 text-default-color-2 letter-spacing-np45 font-weight-normal font-family-5 mb-3"> <i class="icon icon-check-2-2 mr-4 text-default-color-2"></i> Custom Domain Names</li>
                            <li class="font-size-5 text-default-color-2 letter-spacing-np45 font-weight-normal font-family-5 mb-3"> <i class="icon icon-check-2-2 mr-4 text-default-color-2"></i>Unlimited Emails</li>
                        </ul>
                    </div>
                    <!-- price-body end -->
                    <!-- price-btn start -->
                    <div class="price-btn">
                        @include('partials.trial_button')
                    </div>
                    <!-- price-btn end -->
                    <p class="font-size-3 text-dovegray font-family-5 mb-0 mt-5">No credit card required</p>
                </div>
                <!-- single-price end -->
            </div>
        </div>
    </div>
</div>
