@extends('website.layouts.layout')
@section('page_title', 'Blog Single')
@section('content')

    <!------------- start of breadcrumb -------------->
    <div class="bg-white">
        <div class="container">
            <div class="d-flex align-items-center py-4 breadcrumb">
                <a href="{{ route('website.index') }}" class="text-muted">{{ trans('main_translation.HomePage') }}</a>
                <i class="bi bi-chevron-left mx-2"></i>
                <a href="{{ route('website.blogs') }}"
                    class="text-muted">{{ trans('main_translation.BestSellingProducts') }}</a>
                <i class="bi bi-chevron-left mx-2"></i>
                <h6>{{ $blog->title }}</h6>
            </div>
        </div>
    </div>
    <!------------- end of breadcrumb -------------->

    <section class="single-blog">
        <div class="container py-5">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <h3> {{ $blog->title }}</h3>
                    <ul>
                        <li><i
                                class="bi bi-calendar-date-fill"></i>{{ $blog->created_at?->translatedFormat('j F Y ') ?? 'N/A' }}
                        </li>
                        <li><i class="bi bi-pencil-square"></i> {{ $blog->admin->name }}</li>
                        <li><i class="bi bi-eye-fill"></i> 5 مرات المشاهدة</li>
                    </ul>
                    <img src="{{ url('storage/' . $blog->image) }}" alt="">
                    {!! $blog->description !!}
                    {{-- <p></p>
                    <p></p>
                    <p class="line-before"></p>

                    <h4></h4>
                    <p></p>
                    <img src="images/index/blog 1.png" alt="">
                    <p></p> --}}
                </div>


                <div class="col-md-4 side-more-blogs">
                    {{-- form of search --}}
                    <form action="{{ route('website.blogs.show', $blog->id) }}" method="get" class="contact-form">
                        <div class="mb-5 search-box">
                            <label for="" class="form-label">{{ trans('main_translation.Search') }}</label>
                            <input name="title" type="text" class="form-control" id=""
                                placeholder="{{ trans('main_translation.TybeSearchHere') }}">
                            <button type="submit"><i class="bi bi-search"></i></button>
                        </div>
                    </form>

                    <h6>{{ trans('main_translation.SimilarBlogs') }}</h6>
                    @foreach ($another_blogs as $another_blog)
                        <div class="another-blog">
                            <img src="{{ url('storage/' . $another_blog->cover_image) }}" alt="">
                            <div>
                                <p>{{ Illuminate\Support\Str::of($another_blog->brief_about_blog)->limit(160) }}</p>
                                <a
                                    href="{{ route('website.blogs.show', $another_blog->id) }}">{{ trans('main_translation.Details') }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        <button class="toggle-side-more-blogs" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
            aria-controls="offcanvasExample">
            <i class="bi bi-filter"></i>
        </button>


        <div class="offcanvas offcanvas-start p-3" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="side-more-blogs">
                <form action="{{ route('website.blogs.show', $blog->id) }}" method="get" class="contact-form">
                    <div class="mb-5 search-box">
                        <label for="" class="form-label">{{ trans('main_translation.Search') }}</label>
                        <input name="title" type="text" class="form-control" id=""
                            placeholder="{{ trans('main_translation.TybeSearchHere') }}">
                        <button type="submit"><i class="bi bi-search"></i></button>
                    </div>
                </form>

                <h6>{{ trans('main_translation.SimilarBlogs') }}</h6>
                @foreach ($another_blogs as $another_blog)
                    <div class="another-blog">
                        <img src="{{ url('storage/' . $another_blog->cover_image) }}" alt="">
                        <div>
                            <p>{{ Illuminate\Support\Str::of($another_blog->brief_about_blog)->limit(160) }}</p>
                            <a
                                href="{{ route('website.blogs.show', $another_blog->id) }}">{{ trans('main_translation.Details') }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>



@endsection
