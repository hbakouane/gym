<script>
    function goToImage(url) {
        return window.location.href = url;
    }
</script>
<!-- content-1 section start -->
<div class="bg-selago-3 pt-lg-25 pt-15 pb-lg-21 pb-15" id="details">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8" data-aos="fade-right" data-aos-duration="800" data-aos-once="true">
                <!-- content img start -->
                <div class="content-img">
                    <img onclick="goToImage('{{ url('images/screenshots/staves.png') }}')" src="{{ url('images/screenshots/members.png') }}" alt="" class="w-100">
                </div>
                <!-- content img end -->
            </div>
            <div class="col-lg-6 col-md-9" data-aos="fade-left" data-aos-duration="800" data-aos-once="true">
                <!-- content-1 start -->
                <div class="d-flex flex-column justify-content-center text-lg-left text-center h-100 pl-xl-21 pl-0 pr-lg-7 pr-xxl-25 pr-0 ">
                    <!-- content-1 section-title start -->
                    <h2 class="font-size-14 font-family-5 letter-spacing-np3 text-default-color-2 mb-7">
                        {{ __('external.Members and Memberships management made so easy!') }}
                    </h2>
                    <p class="font-size-7 text-default-color-4 font-family-5 mb-10 mb-lg-11 pr-lg-12">
                        {{ __('external.Manage members and their memberships at the same time, see if a membership is active or expired and more features . . .') }}
                    </p>
                    <!-- content-1 section-title end -->
                    <!-- text btn start -->
                    @include('partials.trial_button')
                    <small class="text-muted">{{ __('external.credit-card') }}</small>
                    <!-- text btn end -->
                </div>
                <!-- content-1 end -->
            </div>
        </div>
    </div>
</div>
<!-- content-2 section start -->
<div class="position-relative pt-lg-25 pt-15 pb-lg-21 pb-15 z-index-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-9" data-aos="fade-right" data-aos-duration="800" data-aos-once="true">
                <!-- content-2 start -->
                <div class="d-flex flex-column justify-content-center text-lg-left text-center h-100 pb-lg-0 pb-15">
                    <!-- content-1 section-title start -->
                    <h2 class="font-size-20 font-family-5 letter-spacing-np3 text-default-color-2 mb-7">
                        {{ __('external.Add a staff with specific role and permissions') }}
                    </h2>
                    <p class="font-size-7 text-default-color-4 font-family-5 mb-10 mb-lg-11 pr-lg-12">
                        {{ __('external.Add a staff, assign them a role and permissions and let them handle the work!') }}
                    </p>
                    <!-- content-1 section-title end -->
                    <!-- text btn start -->
                    @include('partials.trial_button')
                    <small class="text-muted">{{ __('external.credit-card') }}</small>
                    <!-- text btn end -->
                </div>
                <!-- content-2 end -->
            </div>
            <div class="col-lg-6 col-md-8 pl-0 offset-xl-1" data-aos="fade-left" data-aos-duration="800" data-aos-once="true">
                <!-- content img start -->
                <div class="content-img">
                    <img onclick="goToImage('{{ url('images/screenshots/staves.png') }}')" src="{{ url('images/screenshots/staves.png') }}" alt="" class="w-100">
                </div>
                <!-- content img end -->
            </div>
        </div>
    </div>
</div>
<!-- content-3 section start -->
<div class="bg-selago-3 pt-lg-25 pt-15 pb-lg-21 pb-15">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8" data-aos="fade-right" data-aos-duration="800" data-aos-once="true">
                <!-- content img start -->
                <div class="content-img">
                    <img src="image/l8/svg/content-img-1.svg" alt="" class="w-100">
                </div>
                <!-- content img end -->
            </div>
            <div class="col-lg-6 col-md-9" data-aos="fade-left" data-aos-duration="800" data-aos-once="true">
                <!-- content-3 start -->
                <div class="d-flex flex-column justify-content-center text-lg-left text-center h-100 pl-xl-21 pl-0 pr-lg-7 pr-xxl-25 pr-0 ">
                    <!-- content-3 section-title start -->
                    <h2 class="font-size-14 font-family-5 letter-spacing-np3 text-default-color-2 mb-7">
                        {{ __('external.New features released - Every week') }}
                    </h2>
                    <p class="font-size-7 text-default-color-4 font-family-5 mb-10 mb-lg-11 pr-lg-12">
                        {{ __('external.Our team is taking care of adding new features every week, with the help of our members.') }}
                    </p>
                    <!-- content-3 section-title end -->
                    <!-- text btn start -->
                    @include('partials.trial_button')
                    <small class="text-muted">{{ __('external.credit-card') }}</small>
                    <!-- text btn end -->
                </div>
                <!-- content-3 end -->
            </div>
        </div>
    </div>
</div>
<div class="video-area section-bg-img-3 pt-lg-23 pt-19 pb-lg-21 pb-15" style="display: none" id="video">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="video-content text-center">
                    <!-- popup start -->
                    <a class="popup mb-13" href="https://www.youtube.com/watch?v=_ulhxX_tnqY">
                        <div class="d-inline-block video-icon d-inline-block mt-lg-0 mt-n5">
                            <i class="fas fa-play circle-100 text-turquoise bg-opacity-p19 align-center m-auto "></i>
                        </div>
                    </a>
                    <!-- popup end -->
                    <!-- content-1 section-title start -->
                    <h2 class="font-size-20 font-family-5 letter-spacing-np3 text-white font-weight-bold mb-4">
                        We help you to be successful
                    </h2>
                    <p class="font-size-7 text-white font-family-5">Create custom landing pages with
                        Shade that convert more visitors than any website. With lots of unique blocks, you can easily build a page without coding.</p>
                    <!-- content-1 section-title end -->
                </div>
            </div>
        </div>
    </div>
</div>
