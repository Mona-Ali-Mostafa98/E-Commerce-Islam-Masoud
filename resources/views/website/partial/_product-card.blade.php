    <div class="col-12 col-md-6 col-lg-3 mb-4">
        <div class="product">
            <div class="card">
                <div class="card-img-top">
                    @foreach ($product->images as $product_image)
                        @if ($loop->iteration == 1)
                            <img src="{{ $product_image->product_image_url }}" alt="...">
                        @endif
                    @endforeach
                    <div class="fav-eye">
                        <a href=""><i class="bi bi-heart-fill"></i></a>
                        <a type="button" data-bs-toggle="modal" href="#product-details" role="button"><i
                                class="bi bi-eye-fill"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{ route('website.products.show', $product->slug) }}">
                        <h5 class="card-title">{{ $product->product_name }}</h5>
                        <p class="card-text">{{ $product->product_model }}</p>
                        <h5 class="card-title">{{ $product->product_price }} {{ $settings->currency_code }}
                        </h5>
                    </a>
                    <div class="product-rate" rateYo="4"></div>

                </div>
                <div class="card-footer">
                    <div class="product-quantity">
                        <a href="javascript:void(0);" class='qtyplus plus quantity'><i class="bi bi-plus-lg"></i></a>
                        <input type='text' name='quantity' value='1' class='qty' readonly />
                        <a href="javascript:void(0);" class='qtyminus minus quantity'><i class="bi bi-dash-lg"></i></a>
                        <button>إضافة للسلة</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
