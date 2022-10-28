@extends('website.layouts.layout')
@section('page_title', 'Cart')
@section('content')

    <!------------- start of breadcrumb -------------->
    <div class="bg-white">
        <div class="container">
            <div class="d-flex align-items-center py-4 breadcrumb">
                <a href="{{ route('website.index') }}" class="text-muted">{{ trans('main_translation.HomePage') }}</a>
                <i class="bi bi-chevron-left mx-2"></i>
                <h6> {{ trans('main_translation.Invoice') }}</h6>
            </div>
        </div>
    </div>
    <!------------- end of breadcrumb -------------->
    <section class=" py-5">
        <div class="container">
            <div class="row flex-lg-row flex-column-reverse">
                @if ($order)
                    <div class="col-12  m-auto">
                        <h3 class="mb-5 text-center">{{ trans('main_translation.OrderVerifiedSuccessfully') }}</h3>
                    </div>
                    <div class="col-12 col-lg-8 mb-4">
                        <ul class="cash">
                            <li>
                                <span>{{ trans('main_translation.UserName') }}</span>
                                <span>{{ Auth::guard('web')->user()?->full_name }}</span>
                            </li>
                            <li>
                                <span>{{ trans('main_translation.PaymentMethod') }}</span>
                                <span>{{ $order->payment_method ?? trans('main_translation.Cash') }}</span>
                            </li>
                            <li>
                                <span>{{ trans('main_translation.OrderNumber') }}</span>
                                <span>{{ $order->order_number }}</span>
                            </li>
                            <li>
                                <span>{{ trans('main_translation.Date') }}</span>
                                <span>{{ $order->created_at->format('d/m/Y') }}</span>
                            </li>
                            <li>
                                <span>{{ trans('main_translation.Time') }}</span>
                                <span>{{ $order->created_at->format('g:i a') }}</span>
                            </li>
                            <li>
                                {{-- ////////////////////////////////////////////// --}}
                                <span>{{ trans('main_translation.Total') }} <span>{{ $order->total_price }}
                                        {{ $settings->currency_code }}</span></span>
                            </li>
                        </ul>
                        <button type="button" class="complete-order">{{ trans('main_translation.Print') }}</button>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="x" style="background-color: #fff; padding: 1rem ; border-radius: 5px;">
                            <h4>{{ trans('main_translation.Products') }}</h4>
                            <div class="order-info">
                                <ul>
                                    <li>
                                        <span>{{ trans('main_translation.Total') }}</span>
                                        <span><span>{{ $products_price }}</span> {{ $settings->currency_code }}</span>
                                    </li>
                                    <li>
                                        <span>{{ trans('main_translation.Delivery') }}</span>
                                        <span><span>{{ $settings->shipping_price }}</span>
                                            {{ $settings->currency_code }}</span>
                                    </li>
                                    <li>
                                        <span>{{ trans('main_translation.Tax') }}</span>
                                        <span><span>{{ $settings->tax }}</span> %</span>
                                    </li>
                                    <li>
                                        <span> {{ trans('main_translation.FinishTotal') }}</span>
                                        <span><span>{{ $order->total_price }}</span>
                                            {{ $settings->currency_code }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                @else
                    <div class="col-12  m-auto">
                        <h3 class="mb-5 text-center">{{ trans('main_translation.NoOrders') }}</h3>
                    </div>
                @endif
            </div>
        </div>
    </section>

@endsection
