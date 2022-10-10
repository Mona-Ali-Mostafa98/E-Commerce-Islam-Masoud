@extends('website.layouts.layout')
@section('page_title', 'Contact Us')
@section('content')

    <!------------- start of breadcrumb -------------->
    <div class="bg-white">
        <div class="container">
            <div class="d-flex align-items-center py-4 breadcrumb">
                <a href="{{ route('website.index') }}" class="text-muted">{{ trans('main_translation.HomePage') }}</a>
                <i class="bi bi-chevron-left mx-2"></i>
                <h6> {{ trans('main_translation.Contact') }}</h6>
            </div>
        </div>
    </div>
    <!------------- end of breadcrumb -------------->

    <section>
        <div class="container py-5">
            <div class="row align-items-center py-5">
                <div class="col-md-6 col-12">
                    <form action="{{ route('website.contact.store') }}" method="POST" class="contact-form">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">{{ trans('main_translation.Name') }}</label>
                            <input name="full_name" type="text" class="form-control" id=""
                                placeholder="{{ trans('main_translation.EnterName') }}">
                            @error('full_name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">{{ trans('main_translation.Email') }}</label>
                            <input name="email" type="email" class="form-control" id=""
                                placeholder="{{ trans('main_translation.EnterEmail') }}">
                            @error('email')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">{{ trans('main_translation.MobileNumber') }}</label>
                            <input name="mobile_number" type="tel" class="form-control" id=""
                                placeholder="{{ trans('main_translation.EnterMobileNumber') }}">
                            @error('mobile_number')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">{{ trans('main_translation.Message') }}</label>
                            <textarea name="message" type="text" rows="5" class="form-control" id=""
                                placeholder="{{ trans('main_translation.EnterMessage') }}"></textarea>
                            @error('message')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <button>{{ trans('main_translation.Send') }}</button>
                    </form>
                </div>
                <div class="col-md-6 col-12">
                    <img src="{{ url('website/images/contact us/Contact us-rafiki.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>

@endsection
