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
        <link rel="stylesheet" href="{{ url('website/css/style.css') }}" />
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

    <!-- Start  Change-->
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
                        <a href="{{ route('website.wishlist') }}" class="has-menu bg-transparent">
                            <i class="bi bi-heart-fill"></i> {{ trans('main_translation.Favorites') }}
                            <span class="">({{ $favorite_products }})</span>
                        </a>
                    </li>
                    @include('website.partial._cart-notification')

                    <li>
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            @if (App::getLocale() == 'ar')
                                @if ($properties['native'] == 'English')
                                    <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                        hreflang="{{ $localeCode }}">
                                        {{ $properties['native'] }} <i class="bi bi-translate"></i>
                                    </a>
                                @endif
                            @endif
                            @if (App::getLocale() == 'en')
                                @if ($properties['native'] == 'العربية')
                                    <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                        hreflang="{{ $localeCode }}">
                                        {{ $properties['native'] }} <i class="bi bi-translate"></i>
                                    </a>
                                @endif
                            @endif
                        @endforeach
                    </li>
                </ul>
            </div>
        </div>


        <div class="middle-nav">
            <div class="container-lg d-flex flex-md-row  align-items-center justify-content-between">
                <div class="col-2 col-lg-2 col-md-6">
                    <div class="logo">
                        <img src="{{ url('storage/' . $settings->website_logo) }}" alt="">
                    </div>
                    <div class="logo-small">
                        <img src="{{ url('storage/' . $settings->website_logo) }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-0">

                    <ul
                        class="nav-links wow animate__animated animate__fadeInRight
                            animate__slow">
                        <li>
                            <a href="{{ route('website.index') }}"
                                class="{{ Request::is('*//') ? 'active' : '' }}">{{ trans('main_translation.HomePage') }}</a>
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
                <div class="col-9 col-lg-4 col-md-6">
                    <ul class=" d-flex align-items-center justify-content-evenly">
                        @if (!Auth::guard('web')->user())
                            <li class="add-user">
                                <a href="{{ route('website.show_register_form') }}">
                                    {{ trans('main_translation.Register') }}
                                </a>
                            </li>
                            <li class="login-user">
                                <a href="{{ route('website.show_login_form') }}">
                                    <i class="fa-solid fa-user"></i>
                                    {{ trans('main_translation.Login') }}
                                </a>
                            </li>
                        @else
                            <a href="{{ route('website.profile') }}">
                                {{ trans('main_translation.Profile') }}
                            </a>
                            {{-- <button>{{ trans('main_translation.Logout') }}</button> --}}
                            <a href="{{ route('website.logout') }}">{{ trans('main_translation.Logout') }}</a>
                        @endif

                        <li>
                            <button class="toggle-side-menu" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
                                <i class="bi bi-list"></i>
                            </button>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

    </nav>

    <div class="offcanvas offcanvas-bottom side-menu-nav" tabindex="-1" id="offcanvasBottom"
        aria-labelledby="offcanvasBottomLabel">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body large">
            <ul class="nav-links">
                <li>
                    <a href="{{ route('website.index') }}"
                        class="{{ Request::is('*website/index*') ? 'active' : '' }}">{{ trans('main_translation.HomePage') }}</a>
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
                </li>
            </ul>
            <div class="logo">
                <img src="{{ url('storage/' . $settings->website_logo) }}" alt="">
            </div>
        </div>
    </div>
