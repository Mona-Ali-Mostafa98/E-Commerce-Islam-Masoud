<li class="top-nav-notification">
    @if (Auth::guard('web')->user())
        <a href="javascript:void(0)" class="has-menu bg-transparent">
            <i class="bi bi-bell-fill"></i>
            {{ trans('main_translation.Notifications') }}
            <span class="">({{ Auth::guard('web')->user()->unreadNotifications->count() }})</span>
        </a>
        <div class="sub-menu">
            @forelse (Auth::guard('web')->user()->unreadNotifications as $notification)
                @if ($notification->type == 'App\Notifications\OrderUpdatedNotification')
                    <a href="">
                        <img src="{{ url('website/images/index/little-logo.png') }}" alt="">
                        <div>
                            <h6>{{ $notification->data['title'] }} <i class="bi bi-dot new"></i> &nbsp;&nbsp;</h6>
                            <p>{{ $notification->data['status'] }}</p>
                        </div>
                    </a>
                @endif

                @if (Auth::guard('web')->user()->receive_notifications == 1)
                    @if ($notification->type == 'App\Notifications\ProductAddedNotification')
                        <a href="">
                            <img src="{{ url('website/images/index/little-logo.png') }}" alt="">
                            <div>
                                <h6>{{ $notification->data['title'] }} <i class="bi bi-dot new"></i> &nbsp;&nbsp;
                                </h6>
                                <p>{{ $notification->data['product_name'] }}</p>
                            </div>
                        </a>
                    @endif
                @endif

            @empty
                <h6>{{ trans('main_translation.NoNotification') }}</h6>
            @endforelse
        </div>
    @else
        <a href="javascript:void(0)" class="has-menu"> <i
                class="bi bi-bell-fill"></i>{{ trans('main_translation.Notifications') }}
            <span class="">(0)</span>
        </a>
    @endif
</li>


{{-- Start of cart icon --}}
<li class="top-nav-cart">
    <a href="javascript:void(0)" class="has-menu bg-transparent"> <i class="bi bi-cart-fill"></i> {{ trans('main_translation.Cart') }}
        <span class="">({{ $cart_items->sum('quantity') }})</span> </a>
    <div class="sub-menu">
        @forelse ($cart_items as $cart_item)
            <a href="{{ route('website.cart.index') }}">
                <div class="prod-img">
                    @foreach ($cart_item->product->images as $product_image)
                        @if ($loop->iteration == 1)
                            <img src="{{ $product_image->product_image_url }}" alt="...">
                        @endif
                    @endforeach
                </div>
                <div class="prod-info">
                    <h6>{{ $cart_item->product->product_name }}</h6>
                    <p>{{ $cart_item->product->product_price }} {{ $settings->currency_code }} </p>
                </div>
                {{-- form to delete items from cart --}}
                <form action="{{ route('website.delete_product_from_cart', $cart_item->product->id) }}" method="post"
                    class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" data-id="{{ $cart_item->id }}"><i class="bi bi-x-lg"></i></button>
                </form>

            </a>
        @empty
            <div class="prod-info mt-4 mb-4">
                <h6>{{ trans('main_translation.NoProductsInCart') }}</h6>
            </div>
        @endforelse
        @if (Auth::guard('web')->user() && $cart_items->sum('quantity') != 0)
            <div class="cart-detals w-100">
                <div class="d-flex justify-content-between align-items-center w-75 m-auto mt-4">
                    <span>{{ trans('main_translation.Total') }}</span> <span>{{ $total }}
                        {{ $settings->currency_code }}</span>
                </div>
                <a href="{{ route('website.cart.index') }}">{{ trans('main_translation.Pay') }}</a>
            </div>
        @elseif (Auth::guard('web')->user() && $cart_items->sum('quantity') == 0)
            <div></div>
        @elseif (!Auth::guard('web')->user() && $cart_items->sum('quantity') != 0)
            <div class="cart-detals w-100">
                <a href="{{ route('website.show_login_form') }}">{{ trans('main_translation.LoginToPay') }}</a>
            </div>
        @endif
    </div>
</li>
