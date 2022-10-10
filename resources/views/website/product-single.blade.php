@extends('website.layouts.layout')
@section('page_title', 'Product Single')
@section('content')

    <!------------- start of breadcrumb -------------->
    <div class="bg-white">
        <div class="container">
            <div class="d-flex align-items-center py-4 breadcrumb">
                <a href="{{ route('website.index') }}" class="text-muted">{{ trans('main_translation.HomePage') }}</a>
                <i class="bi bi-chevron-left mx-2"></i>
                <h6> {{ trans('main_translation.ProductDetails') }}</h6>
            </div>
        </div>
    </div>
    <!------------- end of breadcrumb -------------->

    <section class="singleProduct py-5">
        <div class="container product-details py-5">
            <div class="row align-items-center">
                <div class="col-12 col-md-5">
                    <div class="single-img">
                        <div class="all">
                            <div class="slider-two">
                                <div class="owl-carousel owl-theme two">
                                    @foreach ($product->images as $product_image)
                                        <div class="item active">
                                            <img src="{{ $product_image->product_image_url }}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="slider">
                                <div class="owl-carousel owl-theme one">
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
                                <div class="cart-product-name d-flex justify-content-between align-items-center mb-2">
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
                                        <input type="text" name="quantity" value="1" class="qty" />
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


        <div class="description-comments">
            <div class="header-comment">
                <div class="container">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="description-tab" data-bs-toggle="pill"
                                data-bs-target="#description" type="button" role="tab" aria-controls="description"
                                aria-selected="true">
                                {{ trans('main_translation.ProductDescription') }}
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="comments-tab" data-bs-toggle="pill"
                                data-bs-target="#comments" type="button" role="tab" aria-controls="comments"
                                aria-selected="false">
                                {{ trans('main_translation.CommentAndRates') }}
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="container">
                <div class="tab-content" id="pills-tabContent">

                    <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">

                        {!! $product->product_description !!}

                    </div>
                    <div class="tab-pane fade active show" id="comments" role="tabpanel" aria-labelledby="comments-tab">
                        <div class="row align-items-center">
                            <div class="col-lg-9 col-12 py-md-5 py-2">
                                <div class="user-comment-container">
                                    @foreach ($product_comments as $product_comment)
                                        <div class="user-comment">
                                            <div class="avatar">
                                                <img src="{{ $product_comment->user->image_url }}" alt="" />
                                            </div>
                                            <div class="comment-details">
                                                <div
                                                    class="sec-small d-flex justify-content-between align-items-center w-100">
                                                    <div>
                                                        <h6 class="title py-2">{{ $product_comment->user->full_name }}
                                                        </h6>
                                                        <div class="mt-1 mb-3 px-0 user-rate"
                                                            rateYo="{{ $product_comment->rate }}"></div>
                                                    </div>
                                                    <p>
                                                        {{ $product_comment->created_at?->translatedFormat('l , j F Y') ?? 'N/A' }}
                                                    </p>
                                                </div>
                                                <p>
                                                    {{ $product_comment->comment }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="your-comment pt-5">
                                    <form action="{{ route('website.blog_comment.store') }}" method="POST">
                                        @csrf
                                        <input name="user_id" type="text">
                                        <div class="py-3">
                                            <h5 class="title">{{ trans('main_translation.AddComment') }}</h5>
                                            <div id="your-rate" class="my-1 px-2" rateYo="5"></div>
                                        </div>
                                        <h6 class="title pb-3">{{ trans('main_translation.Comment') }} </h6>
                                        <textarea name="comment" rows="8"></textarea>
                                        @error('comment')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                        <button type="submit" class="btn">
                                            {{ trans('main_translation.Send') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
