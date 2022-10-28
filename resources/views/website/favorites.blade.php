@extends('website.layouts.layout')
@section('page_title', 'Favorites')
@section('content')

    <!------------- start of breadcrumb -------------->
    <div class="bg-white">
        <div class="container">
            <div class="d-flex align-items-center py-4 breadcrumb">
                <a href="{{ route('website.index') }}" class="text-muted">{{ trans('main_translation.HomePage') }}</a>
                <i class="bi bi-chevron-left mx-2"></i>
                <h6> {{ trans('main_translation.Favorites') }}</h6>
            </div>
        </div>
    </div>
    <!------------- end of breadcrumb -------------->

    <section class="products mb-5">
        <div class="container-lg py-5">
            <div class="row py-5">
                @foreach ($wishlists as $wishlist)
                    <div class="col-12 col-md-6 col-lg-3 mb-4">
                        <div class="product">
                            <div class="card">
                                <div class="card-img-top">
                                    @foreach ($wishlist->product->images as $product_image)
                                        @if ($loop->iteration == 1)
                                            <img src="{{ $product_image->product_image_url }}" alt="...">
                                        @endif
                                    @endforeach
                                    <div class="fav-eye">
                                        <a href="" class="@if ($wishlist->product->favoriteUsers()->first()?->id == Auth::guard('web')->user()?->id) text-danger @endif"
                                            data-toggle="favorites" data-id="{{ $wishlist->product->id }}"
                                            data-user="{{ Auth::guard('web')->user()?->id }}">
                                            <i class="bi bi-heart-fill"></i>
                                        </a>
                                        <a type="button" data-bs-toggle="modal" href="#product-details" role="button"><i
                                                class="bi bi-eye-fill"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('website.products.show', $wishlist->product->slug) }}">
                                        <h5 class="card-title">{{ $wishlist->product->product_name }}</h5>
                                        <p class="card-text">{{ $wishlist->product->product_model }}</p>
                                        <h5 class="card-title">{{ $wishlist->product->product_price }}
                                            {{ $settings->currency_code }}
                                        </h5>
                                    </a>
                                    <div class="product-rate" rateYo="4"></div>

                                </div>
                                <div class="card-footer">

                                    <form action="{{ route('website.cart.store') }}" method="post">
                                        @csrf
                                        <div class="product-quantity">
                                            <a href="javascript:void(0);" class='qtyplus plus quantity'><i
                                                    class="bi bi-plus-lg"></i></a>
                                            <input type='text' name='quantity' value='1' class='qty' readonly />
                                            <a href="javascript:void(0);" class='qtyminus minus quantity'><i
                                                    class="bi bi-dash-lg"></i></a>
                                            <button type="submit" name="product_id"
                                                value="{{ $wishlist->product->id }}">{{ trans('main_translation.AddToCart') }}</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
