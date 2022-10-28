<div class="x" style="background-color: #fff; padding: 1rem ; border-radius: 5px;">
    <h4>{{ trans('main_translation.Products') }}</h4>
    <div class="side-product-items d-flex flex-column py-3">
        @foreach ($cart_items as $cart_item)
            <div class="side-product-item d-flex align-items-center">
                <div class="col-3">
                    @foreach ($cart_item->product->images as $product_image)
                        @if ($loop->iteration == 1)
                            <img src="{{ $product_image->product_image_url }}" alt="...">
                        @endif
                    @endforeach
                </div>
                <div class="col p-2 ">
                    <h6>{{ $cart_item->product->product_name }}</h5>
                </div>
                <div class="col-auto">
                    <span class="price"><span>{{ $cart_item->product->product_price }}</span>
                        {{ $settings->currency_code }}</span>
                </div>
            </div>
        @endforeach
    </div>
    <div class="order-info">
        <ul>
            <li>
                <span>{{ trans('main_translation.Total') }}</span>
                <span><span class="total_price_before_tax">{{ $sub_total }}</span>
                    {{ $settings->currency_code }}</span>
            </li>
            <li>
                <span>{{ trans('main_translation.Delivery') }}</span>
                <span><span>{{ $settings->shipping_price }}</span> {{ $settings->currency_code }}</span>
            </li>
            <li>
                <span>{{ trans('main_translation.Tax') }}</span>
                <span><span>{{ $settings->tax }}</span> %</span>
            </li>
            <li>
                <span> {{ trans('main_translation.FinishTotal') }}</span>
                <span><span class="total_price_after_shipping_price">{{ $total + $settings->shipping_price }}</span>
                    {{ $settings->currency_code }}</span>
            </li>
        </ul>
    </div>
</div>
