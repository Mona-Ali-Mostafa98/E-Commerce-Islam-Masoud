@extends('website.layouts.layout')
@section('page_title', 'E-Commerce Islam Mossaud')
@section('content')

    <header class="position-relative">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
                 <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>

            </div>
            <div class="carousel-inner">
                @foreach ($sliders as $slider)
                    <div class="carousel-item @if($loop->iteration == 1) active @endif">
                        <img src="{{ url('storage/' . $slider?->image) }}" class="d-block w-100" alt="...">
                    </div>
                @endforeach
            </div>

        </div>
        <div class="text-contant">
            @foreach ($sliders as $slider)
                @if ($loop->iteration == 1)
                    <h2>{{ $slider?->title }}</h2>
                    <p>{{ $slider?->description }}</p>

                    <form action="{{ route('website.search') }}" method="GET">
                        <div class="search-box">
                            <i class="bi bi-search"></i>
                            <input name="product_name" type="search"
                                placeholder="{{ trans('main_translation.SearchHere') }}">
                            <button>{{ trans('main_translation.Search') }}</button>
                        </div>
                    </form>
                @endif
            @endforeach

        </div>

    </header>

    {{-- start of services section --}}
    <section class="services py-5">
        <div class="container-lg">
            <h5 class="title">
                <p class="before-title"></p>
                {{ trans('main_translation.Services') }}
            </h5>
            <p class="des py-3">
                {{ $settings->about_services }}
            </p>
            <div class="row align-items-stretch pt-5">
                @foreach ($website_services as $service)
                    @include('website.partial._services_card')
                @endforeach
            </div>
        </div>
    </section>
    {{-- end of services section --}}

    {{-- start of products section --}}
    <section class="products mb-5">
        <div class="container-lg">
            <div class="title-link">
                <div>
                    <h5 class="title">
                        <p class="before-title"></p>
                        {{ trans('main_translation.Shop') }}
                    </h5>
                </div>
                <a href="{{ route('website.products') }}">{{ trans('main_translation.More') }} <i
                        class="bi bi-chevron-left"></i></a>
            </div>

            <div class="row align-items-stretch">

                @foreach ($products as $product)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
                        @include('website.partial._product-card')
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    {{-- end of products section --}}

    {{-- start of gallery section --}}
    <section>
        <div class="container-lg">
            <div class="title-link">
                <div>
                    <h5 class="title">
                        <p class="before-title"></p>
                        {{ trans('main_translation.Gallery') }}
                    </h5>
                </div>
                <a href="{{ route('website.galleries') }}">{{ trans('main_translation.More') }} <i
                        class="bi bi-chevron-left"></i></a>
            </div>

            <div class="gallery-container">
                @foreach ($galleries as $gallery)
                    <div class="item">
                        <img src="{{ url('storage/' . $gallery->image) }}" alt="">
                        <div class="overlay">
                            <p>{{ $gallery->title }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    {{-- end of gallery section --}}

    {{-- start of best-selling section --}}
    <section class="products mb-5">
        <div class="container-lg">
            <div class="title-link">
                <div>
                    <h5 class="title">
                        <p class="before-title"></p>
                        {{ trans('main_translation.BestSellingProducts') }}
                    </h5>
                </div>
                <a href="{{ route('website.best_selling_products') }}">{{ trans('main_translation.More') }} <i
                        class="bi bi-chevron-left"></i></a>
            </div>

            <div class="row align-items-stretch">
                @foreach ($products as $product)
                    @if ($product->best_selling == 1)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
                            @include('website.partial._product-card')
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    {{-- end of best-selling section --}}


    {{-- start of blogs section --}}
    <section class="blogs">
        <div class="container-lg">
            <div class="title-link">
                <div>
                    <h5 class="title">
                        <p class="before-title"></p>
                        {{ trans('main_translation.Blogs') }}
                    </h5>
                </div>
                <a href="{{ route('website.blogs') }}">{{ trans('main_translation.More') }} <i
                        class="bi bi-chevron-left"></i></a>
            </div>

            <div class="blogs-container">
                @foreach ($blogs as $blog)
                    <div class="item">
                        <div class="card">
                            <img src="{{ url('storage/' . $blog->cover_image) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                @if ($loop->iteration == 1)
                                    <ul>
                                        <li><i
                                                class="bi bi-calendar-date-fill"></i>{{ $blog->created_at?->translatedFormat('j F Y ') ?? 'N/A' }}
                                        </li>
                                        <li><i class="bi bi-pencil-square"></i> {{ $blog->admin->name }}</li>
                                        <li><i class="bi bi-eye-fill"></i> {{ $blog->views_number }}
                                            {{ trans('main_translation.ViewsNumber') }}</li>
                                    </ul>
                                @endif
                                <h5 class="card-title">{{ $blog->title }}</h5>
                                <p class="card-text">
                                    {{ Illuminate\Support\Str::of($blog->brief_about_blog)->limit(160) }}
                                </p>
                                <a href="{{ route('website.blogs.show', $blog->id) }}">{{ trans('main_translation.More') }}
                                    <i class="bi bi-chevron-left"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    {{-- end of blogs section --}}

@endsection
