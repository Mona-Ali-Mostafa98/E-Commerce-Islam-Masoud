@extends('website.layouts.layout')
@section('page_title', 'E-Commerce Islam Mossaud')
@section('content')

    {{-- start of slider section --}}
    <header>
        <div class="header-overlay">
            <div class="container-lg">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <h2>{{ $slider->title }}</h2>
                        <p>{{ $slider->description }}</p>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="header-cyrcle-img">
                            <img src="{{ url('storage/' . $slider->image) }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    {{-- end of slider section --}}


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
                    @include('website.partial._product-card')
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
                @foreach ($best_selling_products as $product)
                    @include('website.partial._product-card')
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
                                        <li><i class="bi bi-eye-fill"></i> 5 مرات المشاهدة</li>
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

@push('model')
    <!-- Modal -->
    <div class="modal fade" id="product-details" tabindex="-1" aria-labelledby="product-detailsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body singleProduct">
                    <div class="container product-details py-5">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-5">
                                <div class="single-img">
                                    <div class="all">
                                        <div class="slider">
                                            <div class="owl-carousel owl-theme one">
                                                @foreach ($product->images as $product_image)
                                                    <div class="item active">
                                                        <img src="{{ $product_image->product_image_url }}" alt="">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="slider-two">
                                            <div class="owl-carousel owl-theme two">
                                                @foreach ($product->images as $product_image)
                                                    <div class="item-box">
                                                        <img src="{{ $product_image->product_image_url }}" alt="">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <div class="cart-product-item bg-transparent">
                                    <div class="col-12">
                                        <div class="p-2">
                                            <div
                                                class="cart-product-name d-flex justify-content-between align-items-center mb-2">
                                                <h4 class="title">{{ $product->product_name }}</h4>
                                                <i class="bi bi-suit-heart-fill bi-icon"></i>
                                            </div>
                                            <div>
                                                <p>{{ $product->product_model }}</p>
                                                <div id="rateYo" class="mb-4" rateYo="3"></div>
                                            </div>
                                            <div class="price py-3">
                                                <h3>{{ $product->product_price }} {{ $settings->currency_code }}</h3>
                                            </div>
                                            <div class="product-preview">
                                                <h4 class="py-3">{{ trans('main_translation.ProductDetails') }}</h4>
                                                {{ $product->product_details }}
                                            </div>
                                            <div class="product-info">
                                                <div class="product-quantity">
                                                    <a href="javascript:void(0);" class="qtyplus plus quantity"><i
                                                            class="bi bi-plus-lg"></i></a>
                                                    <input type="text" name="quantity" value="1"
                                                        class="qty" />
                                                    <a href="javascript:void(0);" class="qtyminus minus quantity"><i
                                                            class="bi bi-dash-lg"></i></a>
                                                </div>
                                                <button class="add-to-cart">
                                                    <i class="bi bi-cart-fill"></i>
                                                    {{ trans('main_translation.AddToCart') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush
