@extends('website.layouts.layout')
@section('page_title', 'Blogs')
@section('content')

    <!------------- start of breadcrumb -------------->
    <div class="bg-white">
        <div class="container">
            <div class="d-flex align-items-center py-4 breadcrumb">
                <a href="{{ route('website.index') }}" class="text-muted">{{ trans('main_translation.HomePage') }}</a>
                <i class="bi bi-chevron-left mx-2"></i>
                <h6> {{ trans('main_translation.WebsiteBlogs') }}</h6>
            </div>
        </div>
    </div>
    <!------------- end of breadcrumb -------------->

    <section class="blogs">
        <div class="container-lg py-5">
            <div class="row py-5">
                @foreach ($blogs as $blog)
                    <div class="col-12 col-lg-4 col-md-6 mb-5">
                        <div class="item">
                            <div class="card">
                                <img src="{{ url('storage/' . $blog->cover_image) }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                        <li><i class="bi bi-calendar-date-fill"></i>
                                            {{ $blog->created_at?->translatedFormat('j F Y ') ?? 'N/A' }}</li>
                                        <li><i class="bi bi-pencil-square"></i> {{ $blog->admin->name }}</li>
                                        <li><i class="bi bi-eye-fill"></i> {{ $blog->views_number }} مرات المشاهدة</li>
                                    </ul>
                                    <h5 class="card-title">{{ $blog->title }}</h5>
                                    <p class="card-text">
                                        {!! $blog->description !!}
                                    </p>
                                    <a href="{{ route('website.blogs.show', $blog->id) }}">{{ trans('main_translation.More') }}
                                        <i class="bi bi-chevron-left"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
