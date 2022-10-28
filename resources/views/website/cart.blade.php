@extends('website.layouts.layout')
@section('page_title', 'Cart')
@section('content')

    <!------------- start of breadcrumb -------------->
    <div class="bg-white">
        <div class="container">
            <div class="d-flex align-items-center py-4 breadcrumb">
                <a href="{{ route('website.index') }}" class="text-muted">{{ trans('main_translation.HomePage') }}</a>
                <i class="bi bi-chevron-left mx-2"></i>
                <h6> {{ trans('main_translation.Cart') }}</h6>
            </div>
        </div>
    </div>
    <!------------- end of breadcrumb -------------->

    <!-- cart -->
    <!-- MultiStep Form -->
    <div class="container-fluid" id="grad1">
        <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
            <div class="row">
                <div class="col-md-12 mx-0">
                    <form id="msform" action="{{ route('website.checkout') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account">
                                <strong>{{ trans('main_translation.CartOrders') }}</strong>
                            </li>
                            <li id="personal"><strong>{{ trans('main_translation.Address') }}</strong></li>
                        </ul>
                        <!-- fieldsets -->
                        <fieldset>
                            <div class="tab">
                                <div class="orders-cart">
                                    <div class="container">
                                        <div class="cart-product-item">
                                            <table class="table">
                                                <tr>
                                                    <th colspan="2">{{ trans('main_translation.Product') }}</th>
                                                    <th>{{ trans('main_translation.Price') }}</th>
                                                    <th>{{ trans('main_translation.Quantity') }}</th>
                                                    <th>{{ trans('main_translation.Total') }}</th>
                                                </tr>

                                                @forelse ($cart_items as $cart_item)
                                                    <tr data-id="{{ $cart_item->product_id }}">
                                                        <td style="height: 200px;">
                                                            <div class="p-img">
                                                                @foreach ($cart_item->product->images as $product_image)
                                                                    @if ($loop->iteration == 1)
                                                                        <img src="{{ $product_image->product_image_url }}"
                                                                            alt="...">
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5>{{ $cart_item->product->product_name }}</h5>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="px-2 px-md-3"><span>{{ $cart_item->product->product_price }}</span>
                                                                {{ $settings->currency_code }}
                                                            </span>
                                                        </td>

                                                        <td data-th="Quantity">
                                                            <div class="product-quantity">
                                                                <a href="javascript:void(0);"
                                                                    class='qtyplus plus quantity'><i
                                                                        class="bi bi-plus-lg"></i></a>

                                                                <input type='number' name='quantity'
                                                                    data-quantity="{{ $cart_item->quantity }}"
                                                                    value='{{ $cart_item->quantity }}'
                                                                    class='qty quantity update-cart' />
                                                                <a href="javascript:void(0);"
                                                                    class='qtyminus minus quantity'><i
                                                                        class="bi bi-dash-lg"></i></a>
                                                            </div>

                                                        </td>
                                                        <td>
                                                            <span class="full-price px-2 px-md-3">
                                                                <span class="total_price_before_tax">
                                                                    {{ $cart_item->quantity * $cart_item->product->product_price }}
                                                                </span>
                                                                {{ $settings->currency_code }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5">
                                                            <h2 class="m-4" style="color: #22304A">
                                                                {{ trans('main_translation.NoProductsInCart') }}</h2>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                                {{-- </form> --}}

                                            </table>
                                        </div>

                                        @if ($cart_items->sum('quantity') != 0)
                                            <div class="order-info">
                                                <ul class="row gy-4 align-items-center justify-content-between">
                                                    <li class="col-12 col-sm-6 col-lg-auto total_price">
                                                        <span>{{ trans('main_translation.Total') }} :</span>
                                                        <span
                                                            class="px-3 total_price_before_tax">{{ $sub_total }}</span>
                                                        <span>
                                                            {{ $settings->currency_code }}</span>
                                                    </li>
                                                    <li class="col-12 col-sm-6 col-lg-auto">
                                                        <span>{{ trans('main_translation.Tax') }} :</span>
                                                        <span class="px-3">{{ $settings->tax }}</span>
                                                        <span>
                                                            %</span>
                                                    </li>
                                                    <li class="col-12 col-lg-auto">
                                                        <div class="total-order-price mx-2">
                                                            <span> {{ trans('main_translation.FinishTotal') }} :</span>
                                                            <span class="px-3 total_price_after_tax">
                                                                {{ $total }}</span>
                                                            <span>
                                                                {{ $settings->currency_code }}</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            @if ($cart_items->sum('quantity') != 0)
                                <input type="button" name="next"
                                    class="d-block m-0 m-auto next complete-order action-button"
                                    value="{{ trans('main_translation.Continue') }}"
                                    style="
                                        width: calc(100% - 15%);">
                            @endif

                        </fieldset>
                        <fieldset>
                            <div class="tab">
                                <div class="container address-tab">
                                    <div class="row flex-lg-row flex-column-reverse">
                                        <div class="profile col-12 col-lg-8 mb-4">
                                            <input name="user_id" type="text"
                                                value="{{ Auth::guard('web')->user()?->id }}" hidden>


                                            <!-- profile-addr -->
                                            @if ($user)
                                                @foreach ($user->addresses as $address)
                                                    <div class="profile-addr bg-light position-relative p-3 mb-2 rounded-3">

                                                        <div class="user-addr">
                                                            <input name="user_address_id" type="radio" class="ms-2"
                                                                name="personal-addr" value="{{ $address->id }}" checked>
                                                            <label for="html"
                                                                class="text-muted w-75">{{ $address->full_address }} ,
                                                                {{ $address->city }} , {{ $address->state }}</label>
                                                        </div>
                                                        <a href="{{ route('website.user_address_form', $address->id) }}">
                                                            <i class="bi bi-pencil-fill "></i>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @endif

                                            <a href="{{ route('website.add_address_for_user') }}" data-bs-toggle="modal"
                                                data-bs-target="#add_address"
                                                class="btn custom-btn rounded my-4">{{ trans('main_translation.AddAddress') }}</a>

                                            <div class="row gy-4">
                                                <div class="col-12">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-4">
                                            @include('website.partial._order-info')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="d-block m-0 m-auto complete-order rounded mt-3"
                                style="
                                        width: calc(100% - 15%);">
                                {{ trans('main_translation.Send') }}</button>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('scripts')
    <script>
        // ------------------- cart wizard ----------------
        $(document).ready(function() {

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;

            $(".next").click(function() {

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 600
                });
            });

            $(".previous").click(function() {

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 600
                });
            });

            $('.radio-group .radio').click(function() {
                $(this).parent().find('.radio').removeClass('selected');
                $(this).addClass('selected');
            });

            $(".submit").click(function() {
                return false;
            })

        });
    </script>

    //update cart

    <script type="text/javascript">
        $(".update-cart").change(function(e) {

            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: " <?php echo url('/'); ?>/website/update-cart",
                method: "post",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("td").find(".qty").val()
                },
                success: function(response) {
                    if (response.success == true) {
                        console.log(response.total_price_after_tax)


                        ele.closest("tr").find(".total_price_before_tax").text(response
                            .total_price_before_tax)


                        ele.parents("div").find(".total_price_before_tax").text(response
                            .total_price_before_tax)

                        ele.parents("div").find(".total_price_after_tax").text(response
                            .total_price_after_tax)

                        ele.parents("div").find(".total_price_after_shipping_price").text(response
                            .total_price_after_shipping_price)


                        toastr.success('@lang('messages.UpdatedWishlistSuccessfully')');
                    }
                },
                error: function(response) {
                    toastr.error('@lang('messages.SomeThingWrong')');
                    window.location.reload();
                }
            });

        });
    </script>
@endpush

@push('model')
    <div class="modal fade" id="add_address" tabindex="-1" aria-labelledby="product-detailsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body singleProduct">
                    <div class="container product-details py-5">
                        <div class="profile row align-items-center">
                            <h4 class="mb-3">{{ trans('main_translation.AddAddress') }}</h4>
                            <p class="text-danger mb-4">{{ trans('main_translation.NoteForAddress') }}</p>
                            <form action="{{ route('website.add_address_for_user') }}" method="post">
                                @csrf
                                <input name="user_id" type="text" value="{{ Auth::guard('web')->user()?->id }}"
                                    hidden>

                                <div class="row gy-4">
                                    @include('website.partial._address-form')
                                </div>
                                <button type="submit"
                                    class="btn custom-btn rounded mt-5">{{ trans('main_translation.Save') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush
