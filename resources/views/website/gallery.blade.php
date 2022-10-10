@extends('website.layouts.layout')
@section('page_title', 'Gallery')
@section('content')

    <!------------- start of breadcrumb -------------->
    <div class="bg-white">
        <div class="container">
            <div class="d-flex align-items-center py-4 breadcrumb">
                <a href="{{ route('website.index') }}" class="text-muted">{{ trans('main_translation.HomePage') }}</a>
                <i class="bi bi-chevron-left mx-2"></i>
                <h6> {{ trans('main_translation.Gallery') }}</h6>
            </div>
        </div>
    </div>
    <!------------- end of breadcrumb -------------->

    <section>
        <div class="container-lg">

            <div class="gallery" id="customize-thumbnails-gallery">
                @foreach ($galleries as $gallery)
                    <a data-fancybox="gallery" data-src="{{ url('storage/' . $gallery->image) }}" class="item">
                        <img src="{{ url('storage/' . $gallery->image) }}" alt="">
                        <div class="overlay">
                            <p>{{ $gallery->title }}</p>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </section>
@endsection
