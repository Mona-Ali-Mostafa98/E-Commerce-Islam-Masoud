<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Login Page</title>
    <link rel="apple-touch-icon" href="{{ url('admin/images/logo.png') }}  ">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('admin/images/logo.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">


    @if (App::getLocale() == 'en')
        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/vendors/css/vendors.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css/bootstrap-extended.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css/colors.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css/components.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css/themes/dark-layout.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css/themes/semi-dark-layout.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ url('admin/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ url('admin/app-assets/css/core/colors/palette-gradient.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css/pages/authentication.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ url('admin/assets/css/style.css') }}">
    @else
        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/vendors/css/vendors-rtl.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css-rtl/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css-rtl/bootstrap-extended.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css-rtl/colors.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css-rtl/components.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css-rtl/themes/dark-layout.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ url('admin/app-assets/css-rtl/themes/semi-dark-layout.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ url('admin/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ url('admin/app-assets/css-rtl/core/colors/palette-gradient.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css-rtl/pages/authentication.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css-rtl/custom-rtl.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/assets/css/style-rtl.css') }}">
    @endif

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body
    class="vertical-layout vertical-menu-modern semi-dark-layout 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page"
    data-open="click" data-menu="vertical-menu-modern" data-col="1-column" data-layout="semi-dark-layout">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-11 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                    <img src="{{ url('admin/app-assets/images/pages/login.png') }}  "
                                        alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">{{ trans('main_translation.Login') }}</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">{{ trans('main_translation.Note') }}.</p>
                                        <div class="card-content mb-2">
                                            <div class="card-body pt-1">
                                                <form action="{{ route('admin.do_login') }}" method="post">
                                                    @csrf
                                                    <fieldset
                                                        class="form-label-group form-group position-relative has-icon-left">
                                                        <input type="text" name="email" class="form-control"
                                                            id="email"
                                                            placeholder="{{ trans('main_translation.EnterEmail') }}"
                                                            required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                        <label
                                                            for="email">{{ trans('main_translation.Email') }}</label>
                                                        @error('email')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </fieldset>

                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                        <input type="password" name="password" class="form-control"
                                                            id="user-password"
                                                            placeholder="{{ trans('main_translation.EnterPassword') }}"
                                                            required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                        <label
                                                            for="user-password">{{ trans('main_translation.Password') }}</label>
                                                    </fieldset>
                                                    {{-- <div
                                                        class="form-group d-flex justify-content-between align-items-center">
                                                        <div class="text-right"><a href="#"
                                                                class="card-link">{{ trans('main_translation.ForgetPassword') }}</a>
                                                        </div>
                                                    </div> --}}

                                                    <button type="submit"
                                                        class="btn btn-primary float-left btn-inline">{{ trans('main_translation.Login') }}</button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ url('admin/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->

    <script src="{{ url('admin/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ url('admin/app-assets/js/core/app.js') }}"></script>
    <script src="{{ url('admin/app-assets/js/scripts/components.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>
