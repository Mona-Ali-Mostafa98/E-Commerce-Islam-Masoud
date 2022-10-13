@extends('website.layouts.layout')
@section('page_title', 'Product Single')
@push('styles')
    <style>
        /** rating **/
        div.stars {
            display: inline-block;
        }

        input.star {
            display: none;
        }

        label.star {
            float: right;
            padding: 0px;
            font-size: 20px;
            color:
                #707070;
            transition: all .2s;
        }

        input.star:checked~label.star:before {
            content: '★';
            color:
                #ffc107;
            transition: all .25s;
        }

        input.star-5:checked~label.star:before {
            color:
                #ffc107;
            text-shadow: 0 0 5px #707070;
        }

        input.star-1:checked~label.star:before {
            color:
                #ffc107;
        }

        label.star:hover {
            transform: rotate(-15deg) scale(1.3);
        }

        label.star:before {
            content: '★';
            font-family: FontAwesome;
        }


        .horline>li:not(:last-child):after {
            content: " |";
        }

        .horline>li {
            font-weight: bold;
            color:
                #ffc107;

        }

        /** end rating **/
    </style>
@endpush
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

                                    <a href="" class="@if ($product->favoriteUsers()->first()?->id === Auth::guard('web')->user()?->id && Auth::guard('web')->user()) text-danger @endif"
                                        data-toggle="favorites" data-id="{{ $product->id }}"
                                        data-user="{{ Auth::guard('web')->user()?->id }}">
                                        <i class="bi bi-suit-heart-fill bi-icon"></i>
                                    </a>

                                </div>
                                <div>
                                    <p>{{ $product->product_model }}</p>
                                    <div id="rateYo" class="mb-4" rateYo=""
                                        data-rateyo-rating="{{ $product->rating }}"></div>
                                </div>
                                <div class="price py-3">
                                    <h3>{{ $product->product_price }} {{ $settings->currency_code }}</h3>

                                </div>
                                <div class="product-preview">
                                    <h4 class="py-3">{{ trans('main_translation.ProductDetails') }}</h4>
                                    {{ $product->product_details }}
                                </div>
                                <form action="{{ route('website.cart.store') }}" method="post">
                                    @csrf
                                    <div class="product-info">
                                        <div class="product-quantity">
                                            <a href="javascript:void(0);" class="qtyplus plus quantity"><i
                                                    class="bi bi-plus-lg"></i></a>
                                            <input type="text" name="quantity" value="1" class="qty" />
                                            <a href="javascript:void(0);" class="qtyminus minus quantity"><i
                                                    class="bi bi-dash-lg"></i></a>
                                        </div>
                                        <button class="add-to-cart" type="submit" name="product_id"
                                            value="{{ $product->id }}">
                                            <i class="bi bi-cart-fill"></i>
                                            {{ trans('main_translation.AddToCart') }}
                                        </button>
                                    </div>
                                </form>
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
                                                        <div class="mt-1 mb-3 px-0 user-rate" rateYo=""
                                                            data-rateyo-rating="{{ $product_comment->rate }}"></div>
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
                                    <form id="review-form" action="{{ route('website.product_comment.store') }}"
                                        method="POST">
                                        @csrf
                                        <input name="user_id" type="text"
                                            value="{{ Auth::guard('web')->user()?->id }}" hidden>

                                        <input name="product_id" type="text" value="{{ $product->id }}" hidden>

                                        <div class="py-3">
                                            <h5 class="title">{{ trans('main_translation.AddComment') }}</h5>

                                            {{-- <input type="hidden" name="rate" id="rate">
                                            <div id="your-rate" class="my-1 px-2" rateYo="5"></div>
                                            <div class="rating">5</div> --}}

                                            <div class="form-group required mb-3">
                                                <div class="col-sm-12">
                                                    <input class="star star-5" value="5" id="star-5"
                                                        type="radio" name="rate" />
                                                    <label class="star star-5" for="star-5"></label>
                                                    <input class="star star-4" value="4" id="star-4"
                                                        type="radio" name="rate" />
                                                    <label class="star star-4" for="star-4"></label>
                                                    <input class="star star-3" value="3" id="star-3"
                                                        type="radio" name="rate" />
                                                    <label class="star star-3" for="star-3"></label>
                                                    <input class="star star-2" value="2" id="star-2"
                                                        type="radio" name="rate" />
                                                    <label class="star star-2" for="star-2"></label>
                                                    <input class="star star-1" value="1" id="star-1"
                                                        type="radio" name="rate" />
                                                    <label class="star star-1" for="star-1"></label>
                                                </div>
                                            </div>

                                            @error('rate')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                        <h6 class="title pb-3">{{ trans('main_translation.Comment') }} </h6>
                                        <textarea name="comment" rows="8">{{ old('comment') }}</textarea>
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
