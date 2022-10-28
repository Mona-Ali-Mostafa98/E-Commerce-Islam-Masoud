@extends('website.layouts.layout')
@section('page_title', 'About')
@section('content')

    <!------------- start of breadcrumb -------------->
    <div class="bg-white">
        <div class="container">
            <div class="d-flex align-items-center py-4 breadcrumb">
                <a href="{{ route('website.index') }}" class="text-muted">{{ trans('main_translation.HomePage') }}</a>
                <i class="bi bi-chevron-left mx-2"></i>
                <h6> {{ trans('main_translation.About') }}</h6>
            </div>
        </div>
    </div>
    <!------------- end of breadcrumb -------------->

    <section class="about py-5">
        <div class="container">
            <div class="row gy-5">
                <div class="col-md-6 col-12"data-aos="fade-left" data-aos-duration="800">
                    <h4 class="title pb-4">
                        <p class="before-title"></p>
                        {{ trans('main_translation.About') }}
                    </h4>
                    <p class="description">
                        {{ $settings->about_us_description }}
                    </p>
                </div>
                <div class="col-md-6 col-12"data-aos="fade-right" data-aos-duration="800" data-aos-delay="300">
                    <img src="{{ url('storage/' . $settings->about_us_image) }}" class="about-img" alt="" />
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="steps py-5">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12 pt-4" data-aos="fade-down-left" data-aos-duration="600">
                        <div class="hover-containt">
                            <div class="border-contain">
                                <div class="bg-contain">
                                    <div class="contain">
                                    </div>
                                </div>

                            </div>
                            <div class="step-img">
                                <img src="{{ url('website/images/about us/eye.svg') }}" class="" alt="" />
                            </div>
                        </div>
                        <div class="px-5">
                            <h4 class="title pt-5 pb-1">{{ trans('main_translation.OurVision') }}</h4>
                            <p class="description py-4">
                                {{ $settings->our_vision }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 pt-4" data-aos="fade-down-left" data-aos-duration="600"
                        data-aos-delay="300">
                        <div class="hover-containt">
                            <div class="border-contain">
                                <div class="bg-contain">
                                    <div class="value">
                                    </div>
                                </div>

                            </div>
                            <div class="step-img">
                                <img src="{{ url('website/images/about us/value.svg') }}" class="" alt="" />
                            </div>
                        </div>

                        <div class="px-5">
                            <h4 class="title pt-5 pb-1">{{ trans('main_translation.OurMessage') }}</h4>
                            <p class="description py-4">
                                {{ $settings->our_message }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 pt-4" data-aos="fade-down-left" data-aos-duration="600"
                        data-aos-delay="600">
                        <div class="hover-containt">
                            <div class="border-contain">
                                <div class="bg-contain">
                                    <div class="goal">
                                    </div>
                                </div>

                            </div>
                            <div class="step-img">
                                <img src="{{ url('website/images/about us/goal.svg') }}" class="" alt="" />
                            </div>
                        </div>
                        <div class="px-5">
                            <h4 class="title pt-5 pb-1">{{ trans('main_translation.OurGoals') }}</h4>
                            <p class="description py-4">
                                {{ $settings->our_goals }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
