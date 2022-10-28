<section>
    <div class="container-lg contact-us">
        <div class="row align-items-center">
            <div class="col-12 col-sm-6">
                {{-- <p>تواصل معنا الآن</p>
                <h3>لـ أفضل العروض</h3>
                <h3>تصل إلى 20% خصم</h3> --}}
                {!! $settings->about_offers !!}
                <form action="{{ route('website.store.subscribe') }}" method="POST">
                    @csrf
                    <div class="input-box">
                        <i class="bi bi-envelope-paper-fill"></i>
                        <input name="email" type="text" placeholder="{{ trans('main_translation.EnterEmail') }}">
                        @error('email')
                            <strong class="text-white">{{ $message }}</strong>
                        @enderror
                        <button type="submit"><i class="bi bi-send-fill"></i></button>
                    </div>
                </form>

            </div>
            <div class="col-12 col-sm-6">
                <div class="contact-us-cyrcle-img">
                    <img src="{{ url('website/images/index/Header bg (2).png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="container-lg">
        <div class="partners owl-carousel">
            @foreach ($partners as $partner)
                <div class="item">
                    <img src="{{ url('storage/' . $partner->partner_image) }}" alt="">
                </div>
            @endforeach
        </div>
    </div>
</section>


<footer>

    <div class="container ">
        <div class="sub-footer">
            <div class="first-foot mb-4 d-flex justify-content-between align-items-center">
                <div class="logo">
                    <img src="{{ url('storage/' . $settings->website_logo) }}" alt="">
                </div>
                <div class="social-icons">
                    <p>{{ trans('main_translation.FollowUs') }}</p>
                    <a href="{{ $settings->linkedin_url }}">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    <a href="{{ $settings->instagram_url }}">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="{{ $settings->twitter_url }}">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    <a href="{{ $settings->facebook_url }}">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                </div>
            </div>
            <div class="border"></div>
            <ul class="nav-links d-flex justify-content-evenly pt-3">
                <li>
                    <a href="{{ route('website.index') }}"
                        class="{{ Request::is('*/') ? 'active' : '' }}">{{ trans('main_translation.HomePage') }}</a>
                </li>
                <li>
                    <a href="{{ route('website.policy') }}"
                        class="{{ Request::is('*website/policy*') ? 'active' : '' }}">{{ trans('main_translation.Policy') }}</a>

                </li>
                <li>
                    <a href="{{ route('website.products') }}"
                        class="{{ Request::is('*website/products*') ? 'active' : '' }}">{{ trans('main_translation.Shop') }}</a>
                </li>
                <li>
                    <a href="{{ route('website.about') }}"
                        class="{{ Request::is('*website/about*') ? 'active' : '' }}">{{ trans('main_translation.About') }}</a>
                </li>
                <li>
                    <a href="{{ route('website.services') }}"
                        class="{{ Request::is('*website/services*') ? 'active' : '' }}">{{ trans('main_translation.Services') }}</a>
                </li>
                <li>
                    <a href="{{ route('website.blogs') }}"
                        class="{{ Request::is('*website/blogs*') ? 'active' : '' }}">{{ trans('main_translation.WebsiteBlogs') }}</a>

            </ul>
        </div>
    </div>



    <div class="container-lg rights">
        <!-- <p>جميع الحقوق محفوظة لشركة رؤية ذكية للتصميم والرمجة</p> -->
        <div class="container-lg rights">
            {{-- <p>جميع الحقوق محفوظة لشركة رؤية ذكية للتصميم والرمجة</p> --}}
            <p>{{ $settings->copy_footer_text }}</p>
            <img src="{{ url('website/images/index/smartvision logo.png') }}" alt="">
        </div>
    </div>
</footer>


@stack('model')

<!-- Ajax an toastr script to show toastr using ajax-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    $(document).ready(function() {
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.options.timeOut = 10000;
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.options.timeOut = 10000;
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.options.timeOut = 10000;
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    });
</script>

{{-- <script src="{{ url('website/js/ajax-for-favorites.js') }}"></script> --}}

<!-- jQuery script -->
<script src="{{ url('website/js/jquery-3.6.0.min.js') }}"></script>

<!-- owl-carousel script -->
<script src="{{ url('website/js/owl.carousel.min.js') }}"></script>

<!-- bootstrap script -->
<script src="{{ url('website/js/bootstrap.min.js') }}"></script>

<!-- font awesom script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
    integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- rateyo script -->
<script src="{{ url('website/js/jquery.rateyo.min.js') }}"></script>

<!-- nice select script -->
<script src="{{ url('website/js/jquery.nice-select.min.js') }}"></script>

<!-- wow script -->
<script src="{{ url('website/js/wow.min.js') }}"></script>

<!-- custom js file link  -->
<script src="{{ url('website/js/script.js') }}"></script>

@stack('scripts')

<!-- ajax-for-favorites script -- csrf-->
<script>
    var _csrfToken = "{{ csrf_token() }}";

    var changeSlide = 4; // mobile -1, desktop + 1
    // Resize and refresh page. slider-two slideBy bug remove
    var slide = changeSlide;
    if ($(window).width() < 600) {
        var slide = changeSlide;
        slide--;
    } else if ($(window).width() > 999) {
        var slide = changeSlide;
        slide++;
    } else {
        var slide = changeSlide;
    }

    $('.one').owlCarousel({
        nav: false,
        items: 1,
        rtl: true,
        autoplay: 5000,
    })
    $('.two').owlCarousel({
        nav: false,
        margin: 10,
        responsive: {
            0: {
                items: changeSlide - 1,
                slideBy: changeSlide - 1
            },
            600: {
                items: changeSlide,
                slideBy: changeSlide
            },
            1000: {
                items: changeSlide + 1,
                slideBy: changeSlide + 1
            }
        }
    })
    var owl = $('.one');
    owl.owlCarousel();
    owl.on('translated.owl.carousel', function(event) {

        $('.slider-two .item').removeClass("active");
        var c = $(".slider .owl-item.active").index();
        $('.slider-two .item').eq(c).addClass("active");
        var d = Math.ceil((c + 1) / (slide)) - 1;
        $(".slider-two .owl-dots .owl-dot").eq(d).trigger('click');
    })

    $('.slider-two .item').click(function() {
        var b = $(".item").index(this);
        $(".slider .owl-dots .owl-dot").eq(b).trigger('click');
        $(".slider-two .item").removeClass("active");
        $(this).addClass("active");
    });
    var owl2 = $('.two');
    owl2.owlCarousel();
</script>

<script>
    $(document).ready(function() {
        $('[data-toggle="favorites"]').on('click', function(e) {
            e.preventDefault();
            var that = $(this);
            // Delete product from wishlist
            if ($(this).hasClass('text-danger')) {
                $.ajax({
                    url: "<?php echo url('/'); ?>/website/delete/product/wishlist/" + $(this).data(
                        'id'),
                    method: 'delete',
                    dataType: 'json',
                    data: {
                        _token: _csrfToken
                    },
                }).done(function(response) {
                    that.removeClass('text-danger')
                    // alert(response.message)
                    toastr.success('@lang('messages.DeletedFromWishlistSuccessfully')');

                });
                return;
            }

            // Add product to wishlist
            else {
                $.ajax({
                    'url': "<?php echo url('/'); ?>/website/add/product/wishlist",
                    method: 'post',
                    data: {
                        product_id: $(this).data('id'),
                        user_id: $(this).data('user'),
                        _token: _csrfToken
                    },
                    success: function(response) {
                        if (response.success == true) {
                            that.addClass('text-danger')
                            // alert(response.message)
                            toastr.success('@lang('messages.AddToWishlistSuccessfully')');
                        } else {
                            toastr.error('@lang('messages.MustLogin')');
                        }
                    },
                    error: function(response) {
                        toastr.error('@lang('messages.MustLogin')');
                        window.location.href = (
                            '<?php echo url('/'); ?>/website/show_login_form');
                    }
                });
            }

        })

    });
</script>

</body>

</html>
