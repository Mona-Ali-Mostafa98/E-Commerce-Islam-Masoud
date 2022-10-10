@extends('website.layouts.layout')
@section('page_title', 'Services')
@section('content')

    <!------------- start of breadcrumb -------------->
    <div class="bg-white">
        <div class="container">
            <div class="d-flex align-items-center py-4 breadcrumb">
                <a href="{{ route('website.index') }}" class="text-muted">{{ trans('main_translation.HomePage') }}</a>
                <i class="bi bi-chevron-left mx-2"></i>
                <h6> {{ trans('main_translation.Services') }}</h6>
            </div>
        </div>
    </div>
    <!------------- end of breadcrumb -------------->

    <section class="services py-5">
        <div class="container">
            <h5 class="title">
                <p class="before-title"></p>
                {{ trans('main_translation.Services') }}
            </h5>
            <p class="des py-3">
                {{ $settings->about_services }}
            </p>
            <div class="row pt-5">
                @foreach ($website_services as $service)
                    @include('website.partial._services_card')
                @endforeach
            </div>
        </div>
    </section>


@endsection
