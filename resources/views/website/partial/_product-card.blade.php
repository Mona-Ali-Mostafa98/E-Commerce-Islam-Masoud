        <div class="product">
            <div class="card">
                <div class="card-img-top">
                    @foreach ($product->images as $product_image)
                        @if ($loop->iteration == 1)
                            <img src="{{ $product_image->product_image_url }}" alt="...">
                        @endif
                    @endforeach
                    <div class="fav-eye">
                        {{-- <form action="{{ route('website.add_product_to_wishlist') }}" method="post">
                            @csrf
                            <input type="text" name="user_id" value="{{ Auth::guard('web')->user()?->id }}" hidden>
                            <button name="product_id" type="submit" value="{{ $product->id }}"><i
                                    class="bi bi-heart-fill @if ($product->favoriteUsers()->first()?->id == Auth::guard('web')->user()?->id) text-danger @endif"></i></button>
                        </form> --}}
                        <a href="" class="@if ($product->favoriteUsers()->first()?->id === Auth::guard('web')->user()?->id && Auth::guard('web')->user()) text-danger @endif"
                            data-toggle="favorites" data-id="{{ $product->id }}"
                            data-user="{{ Auth::guard('web')->user()?->id }}">
                            <i class="bi bi-heart-fill"></i>
                        </a>

                        <a href="#" data-bs-toggle="modal" data-bs-target="#product-details{{ $product->id }}"
                            role="button"><i class="bi bi-eye-fill"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{ route('website.products.show', $product->slug) }}">
                        <h5 class="card-title">{{ $product->product_name }}</h5>
                        <p class="card-text">{{ $product->product_model }}</p>
                        <h5 class="card-title">{{ $product->product_price }} {{ $settings->currency_code }}
                        </h5>
                    </a>
                    <div class="product-rate" data-rateyo-rating="{{ $product->rating }}">
                    </div>

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
                                value="{{ $product->id }}">{{ trans('main_translation.AddToCart') }}</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- ------------------------------Modal---------------------------------------- -->
        <div class="modal fade" id="product-details{{ $product->id }}" tabindex="-1"
            aria-labelledby="product-detailsLabel" aria-hidden="true">
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
                                                        <div class="item-box">
                                                            <img src="{{ $product_image->product_image_url }}"
                                                                alt="">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="slider-two">
                                                <div class="owl-carousel owl-theme two">
                                                    @foreach ($product->images as $product_image)
                                                        <div class="item active">
                                                            <img src="{{ $product_image->product_image_url }}"
                                                                alt="">
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

                                                    <a href=""
                                                        class="@if ($product->favoriteUsers()->first()?->id === Auth::guard('web')->user()?->id && Auth::guard('web')->user()) text-danger @endif"
                                                        data-toggle="favorites" data-id="{{ $product->id }}"
                                                        data-user="{{ Auth::guard('web')->user()?->id }}">
                                                        <i class="bi bi-suit-heart-fill bi-icon"></i>
                                                    </a>
                                                </div>
                                                <div>
                                                    <p>{{ $product->product_model }}</p>
                                                    <div id="rateYo" class="mb-4" rateYo="3"></div>
                                                </div>
                                                <div class="price py-3">
                                                    <h3>{{ $product->product_price }} {{ $settings->currency_code }}
                                                    </h3>
                                                </div>
                                                <div class="product-preview">
                                                    <h4 class="py-3">{{ trans('main_translation.ProductDetails') }}
                                                    </h4>
                                                    {{ $product->product_details }}
                                                </div>

                                                {{-- <a href="{{ route('website.cart.store') }}"
                                                    data-cart="{{ $product->id }}">{{ trans('main_translation.AddToCart') }}</a> --}}

                                                <form action="{{ route('website.cart.store') }}" method="post"
                                                    id="#addToCart">
                                                    @csrf
                                                    <div class="product-info">
                                                        <div class="product-quantity">
                                                            <a href="javascript:void(0);"
                                                                class="qtyplus plus quantity"><i
                                                                    class="bi bi-plus-lg"></i></a>
                                                            <input type="text" name="quantity" value="1"
                                                                class="qty" />
                                                            <a href="javascript:void(0);"
                                                                class="qtyminus minus quantity"><i
                                                                    class="bi bi-dash-lg"></i></a>
                                                        </div>
                                                        <button id="#add" type="submit" class="add-to-cart"
                                                            name="product_id" value="{{ $product->id }}">
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
                    </div>
                </div>
            </div>
        </div>
