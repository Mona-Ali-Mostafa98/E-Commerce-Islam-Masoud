@extends('admin.layouts.layout')
@section('page_title', 'Edit Settings')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">{{ trans('main_translation.Settings') }}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">
                                        {{ trans('main_translation.UpdateSettings') }}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Update Settings section start -->
                <section id="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{ trans('main_translation.UpdateSettings') }}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        @if (count($errors))
                                            <div class="alert alert-danger alert-validation-msg">
                                                <h4 class="alert-heading">{{ trans('main_translation.ErrorsMessages') }}
                                                </h4>
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="general-settings-tab-justified"
                                                    data-toggle="tab" href="#general-settings" role="tab"
                                                    aria-controls="general-settings"
                                                    aria-selected="true">{{ trans('main_translation.GeneralSettings') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="social-links-tab-justified" data-toggle="tab"
                                                    href="#social-links" role="tab" aria-controls="social-links"
                                                    aria-selected="false">{{ trans('main_translation.SocialLinks') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="services-tab-justified" data-toggle="tab"
                                                    href="#services" role="tab" aria-controls="services"
                                                    aria-selected="false">{{ trans('main_translation.OurServices') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="offers-tab-justified" data-toggle="tab"
                                                    href="#offers" role="tab" aria-controls="offers"
                                                    aria-selected="false">{{ trans('main_translation.OurOffers') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="policy-tab-justified" data-toggle="tab"
                                                    href="#policy" role="tab" aria-controls="policy"
                                                    aria-selected="false">{{ trans('main_translation.PrivacyPolicy') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="about-us-tab-justified" data-toggle="tab"
                                                    href="#about-us" role="tab" aria-controls="about-us"
                                                    aria-selected="false">{{ trans('main_translation.AboutUs') }}</a>
                                            </li>
                                        </ul>

                                        <form class="form form-vertical" method="post"
                                            action="{{ route('admin.settings.update', $setting->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            @include('admin.settings.form')
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Update Settings section end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
