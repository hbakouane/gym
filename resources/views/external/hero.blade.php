<!-- hero area -->
<div class="gradient-bg-1 pt-23 pt-sm-25 pt-md-25 pt-lg-31 pb-lg-0 pb-md-15 pb-11 position-relative z-index-1 font-family-5">
    <div class="section-bg-img-2 pos-abs-tl w-100 h-100 z-index-n1"></div>
    <div class="container">
        <div class="row position-relative justify-content-center">
            <!-- hero area content start -->
            <div class="col-xl-10 col-lg-7 col-md-10 pb-lg-20 pb-10 pr-0" data-aos="fade-right" data-aos-duration="800" data-aos-once="true">
                <div class="hero-content text-center">
                    <!-- hero area section title start -->
                    <h1 class="font-size-22 font-family-5 text-white letter-spacing-np3 mb-6 ">{{ __('external.slug') }}</h1>
                    <p class="font-size-8 text-periwinkle-gray letter-spacing-np4 font-family-5 pr-xl-15 pr-lg-0 pr-md-15 pr-0 mb-11">{{ __('external.slug-details') }}</p>
                    <!-- hero area section title end -->
                    @include('partials.trial_button')
                    <p class="font-size-3 text-periwinkle-gray font-family-5 mb-0 mt-5">{{ __('external.credit-card') }}</p>
                </div>
            </div>
            <div class="col-md-11">
                <!-- abs img start -->
                <div class="abs-img-1 mb-xl-n34 mb-lg-n30 mb-md-n32 mb-n5 mr-n1 w-100 shadow-9 z-index-1">
                    <img src="{{ url('images/screenshots/hero.png') }}" alt="" class="w-100 light-shape default-shape">
                </div>
                <!-- abs img end -->
            </div>
            <!-- hero area content end -->
        </div>
    </div>
</div>
