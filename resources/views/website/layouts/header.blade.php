<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('page_title')</title>

    <link rel="icon" type="image/x-icon" href="{{ url('website/images/Mask Group 2.png') }}" />
    <!-- Bootstrap link  -->
    <link rel="stylesheet" href="{{ url('website/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />

    <!-- font awesom link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- owl-carousel link -->
    <link rel="stylesheet" href="{{ url('website/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ url('website/css/owl.theme.default.min.css') }}" />

    <!-- rateyo link -->
    <link rel="stylesheet" href="{{ url('website/css/jquery.rateyo.min.css') }}" />

    <!-- nice select link -->
    <link rel="stylesheet" href="{{ url('website/css/nice-select.css') }}" />

    <!-- WoW link -->
    <link rel="stylesheet" href="{{ url('website/css/animate.css') }}" />

    <!-- animate link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- toastr link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    @if (App::getLocale() == 'en')
        <!-- custom css file link  -->
        <link rel="stylesheet" href="{{ url('website/css/style-ltr.css') }}">
    @else
        <!-- custom css file link  -->
        <link rel="stylesheet" href="{{ url('website/css/style.css') }}" />
    @endif

    @stack('styles')

</head>

<body>
    <!-- -------- loading ----------- -->

    <div id="loading">
        <div class="loader">
            <img src="{{ url('website/images/Mask Group 2.png') }}" alt="" />
        </div>
    </div>

    <!-- -------- loading ends ----------- -->

    <!-- -------- scroll top ----------- -->
    <a href="javascript:void(0)" id="scroll-top">
        <i class="bi bi-chevron-up"></i>
    </a>
    <!-- -------- scroll top ends ----------- -->


    <nav>
        <div class="top-nav">
            <div class="container-lg d-flex flex-md-row flex-column align-items-center justify-content-between">
                <ul class="right flex-md-row flex-column text-center text-md-end">
                    <li>
                        <span>: {{ trans('main_translation.CallCenter') }}</span>
                        <span>{{ $settings->mobile_number }}</span>
                    </li>
                    <li>
                        <span>: {{ trans('main_translation.Email') }}</span>
                        <span>{{ $settings->email }}</span>
                    </li>
                </ul>
                <ul class="left">
                    <li>
                        <a href="{{ route('website.policy') }}">{{ trans('main_translation.Policy') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('website.contact.create') }}">{{ trans('main_translation.Contact') }}</a>
                    </li>
                    <li>
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            @if ($properties['native'] == 'English')
                                <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                    hreflang="{{ $localeCode }}">
                                    {{ $properties['native'] }}
                                </a>
                            @endif
                        @endforeach
                    </li>
                </ul>
            </div>
        </div>
        <div class="middle-nav">
            <div class="container-lg d-flex flex-md-row flex-column align-items-center justify-content-between">
                <div class="col-12 col-md-3">
                    <div class="logo">
                        <img src="{{ url('storage/' . $settings->website_logo) }}" alt="">
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-md-10">
                    <form action="{{ route('website.search') }}" method="GET">
                        <div class="search-box">
                            <i class="bi bi-search"></i>
                            <input name="product_name" type="search"
                                placeholder="{{ trans('main_translation.SearchHere') }}">
                            <button>{{ trans('main_translation.Search') }}</button>
                        </div>
                    </form>
                </div>

                @include('website.partial._cart-notification')

            </div>
        </div>
        <div class="bottom-nav">
            <div class="container-lg d-flex justify-content-between align-items-center">

                @include('website.partial._cart-notification')

                <ul class="nav-links wow animate__animated animate__fadeInRight
                animate__slow">
                    <li>
                        <a href="{{ route('website.index') }}"
                            class="active">{{ trans('main_translation.HomePage') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('website.products') }}">{{ trans('main_translation.Shop') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('website.about') }}">{{ trans('main_translation.About') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('website.services') }}">{{ trans('main_translation.Services') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('website.blogs') }}">{{ trans('main_translation.WebsiteBlogs') }}</a>
                    </li>
                </ul>
                <ul class="auth">
                    <li>
                        <a href="{{ route('website.wishlist') }}">
                            <i class="bi bi-heart-fill"></i> {{ trans('main_translation.Favorites') }}
                            ({{ $favorite_products }})
                        </a>
                    </li>
                    <li class="top-nav-user">
                        <a href="javascript:void(0)" class="has-menu">
                            <i class="fa-solid fa-user"></i> {{ trans('main_translation.MyAccount') }}
                        </a>
                        <div class="sub-menu">
                            @if (!Auth::guard('web')->user())
                                <a href="{{ route('website.show_login_form') }}">
                                    {{ trans('main_translation.Login') }}
                                </a>
                            @else
                                <a href="{{ route('website.profile') }}">
                                    {{ trans('main_translation.Profile') }}
                                </a>
                                {{-- <button>{{ trans('main_translation.Logout') }}</button> --}}
                                <a href="{{ route('website.logout') }}">{{ trans('main_translation.Logout') }}</a>
                            @endif

                        </div>
                    </li>
                    <li>
                        <button class="toggle-side-menu" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
                            <img src="{{ url('website/images/index/little-logo.png') }}" alt="">
                        </button>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <div class="offcanvas offcanvas-bottom side-menu-nav" tabindex="-1" id="offcanvasBottom"
        aria-labelledby="offcanvasBottomLabel">
        <div class="offcanvas-">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body large">
            <ul class="nav-links">
                <li>
                    <a href="index.html" class="active">{{ trans('main_translation.HomePage') }}</a>
                </li>
                <li>
                    <a href="cart.html">{{ trans('main_translation.Shop') }}</a>
                </li>
                <li>
                    <a href="about.htmltml">{{ trans('main_translation.About') }}</a>
                </li>
                <li>
                    <a href="{{ route('website.services') }}">{{ trans('main_translation.Services') }}</a>
                </li>
                <li>
                    <a href="blogs.html">{{ trans('main_translation.WebsiteBlogs') }}</a>
                </li>
            </ul>
            <div class="logo">
                <img src="{{ $settings->website_logo }}" alt="">
            </div>
        </div>
    </div>
