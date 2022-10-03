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
    <title>@yield('page_title')</title>
    <link rel="apple-touch-icon" href="{{ url('admin/images/logo.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('admin/images/logo.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <link rel="stylesheet" type="text/css"
        href="{{ url('admin/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">

    @if (App::getLocale() == 'en')
        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/vendors/css/vendors.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css/bootstrap-extended.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css/colors.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css/components.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css/themes/semi-dark-layout.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ url('admin/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ url('admin/app-assets/css/core/colors/palette-gradient.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css/pages/dashboard-analytics.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css/pages/card-analytics.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/assets/css/style.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ url('admin/app-assets/css/plugins/forms/validation/form-validation.css') }}">
    @else
        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/vendors/css/vendors-rtl.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css-rtl/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css-rtl/bootstrap-extended.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css-rtl/colors.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css-rtl/components.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ url('admin/app-assets/css-rtl/themes/semi-dark-layout.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ url('admin/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ url('admin/app-assets/css-rtl/core/colors/palette-gradient.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ url('admin/app-assets/css-rtl/pages/dashboard-analytics.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css-rtl/pages/card-analytics.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css-rtl/custom-rtl.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/assets/css/style-rtl.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ url('admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css') }}">
    @endif

    @stack('styles')
    {{-- start of styles for summernote --}}
    <!-- include libraries(jQuery, bootstrap) -->
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    {{-- end of styles for summernote --}}


    <link rel="stylesheet" type="text/css" href="{{ url('admin/assets/css/style.css') }}">

    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">

    <style>
        .swal-footer {
            text-align: center;
            direction: ltr;
        }
    </style>

</head>
<!-- END: Head-->
