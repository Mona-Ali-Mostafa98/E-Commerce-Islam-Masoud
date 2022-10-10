@extends('website.layouts.layout')
@section('page_title', 'Policy')
@section('content')

    <!------------- start of breadcrumb -------------->
    <div class="bg-white">
        <div class="container">
            <div class="d-flex align-items-center py-4 breadcrumb">
                <a href="{{ route('website.index') }}" class="text-muted">{{ trans('main_translation.HomePage') }}</a>
                <i class="bi bi-chevron-left mx-2"></i>
                <h6> {{ trans('main_translation.Policy') }}</h6>
            </div>
        </div>
    </div>
    <!------------- end of breadcrumb -------------->

    <section class="terms py-5">
        <div class="container">
            <div class="p-5">
                {!! $settings->privacy_policy !!}
            </div>
        </div>
    </section>
@endsection
