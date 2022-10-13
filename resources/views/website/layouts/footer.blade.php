<section>
    <div class="container-lg contact-us">
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                {{-- <p>تواصل معنا الآن</p>
                <h3>لـ أفضل العروض</h3>
                <h3>تصل إلى 20% خصم</h3> --}}
                {!! $settings->about_offers !!}
                <div class="input-box">
                    <i class="bi bi-envelope-paper-fill"></i>
                    <input type="text" placeholder="{{ trans('main_translation.EnterEmail') }}">
                    <button><i class="bi bi-send-fill"></i></button>
                </div>
            </div>
            <div class="col-12 col-md-6">
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
    <div class="container-lg mb-5 d-flex justify-content-between align-items-center">
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
    <div class="container-lg rights">
        {{-- <p>جميع الحقوق محفوظة لشركة رؤية ذكية للتصميم والرمجة</p> --}}
        <p>{{ $settings->copy_footer_text }}</p>
        <img src="{{ url('website/images/index/smartvision logo.png') }}" alt="">
    </div>
</footer>



@stack('model')

@stack('scripts')


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
</body>

</html>