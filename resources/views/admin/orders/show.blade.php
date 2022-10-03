@extends('admin.layouts.layout')
@section('page_title', 'Show Order')
@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">{{ trans('main_translation.Orders') }}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">
                                        {{ trans('main_translation.ShowOrder') }}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        @can('List Orders')
                            <a href="{{ route('admin.orders.index') }}" id="addRow"
                                class="btn btn-primary  waves-effect waves-light">
                                {{ trans('main_translation.OrdersList') }}</a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- page users view start -->
                <section class="page-users-view">
                    <div class="row">
                        <!-- information start -->
                        <div class="col-md-12 col-12 ">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title mb-2">{{ trans('main_translation.ShowOrder') }}</div>
                                </div>
                                <div class="card-body">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.UserOrdered') }}
                                                </td>
                                                <td>
                                                    <textarea class="form-control m-1" cols="90" rows="1" readonly>{{ $order->user->full_name }}</textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.OrderNumber') }}
                                                </td>
                                                <td>
                                                    <input class="form-control m-1" value="{{ $order->order_number }}"
                                                        readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.PaymentMethod') }}
                                                </td>
                                                <td>
                                                    <input class="form-control m-1" value="{{ $order->payment_method }}"
                                                        readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.PaymentStatus') }}
                                                </td>
                                                <td>
                                                    <input class="form-control m-1" value="{{ $order->payment_status }}"
                                                        readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.OrderStatus') }}
                                                </td>
                                                <td>
                                                    <input class="form-control m-1" value="{{ $order->status }}" readonly>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.ShippingPrice') }}
                                                </td>
                                                <td>
                                                    <input class="form-control m-1" value="{{ $order->shipping_price }}"
                                                        readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.TotalPrice') }}
                                                </td>
                                                <td>
                                                    <input class="form-control m-1" value="{{ $order->total_price }}"
                                                        readonly>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.OrderCreatedAt') }}
                                                </td>
                                                <td>
                                                    <input class="form-control m-1"
                                                        value="{{ $order->created_at?->translatedFormat('l , j F Y , H:i:s') ?? 'N/A' }}"
                                                        readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.UpdatedAt') }}</td>
                                                <td>
                                                    <input class="form-control m-1"
                                                        value="{{ $order->updated_at?->translatedFormat('l , j F Y , H:i:s') ?? 'N/A' }}"
                                                        readonly>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.Products') }}</td>
                                                <td>
                                                    <div class="m-1" style="height:auto">
                                                        <table class="table table-striped dataex-html5-selectors dataTable"
                                                            id="DataTables_Table_3" role="grid"
                                                            aria-describedby="DataTables_Table_3_info">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">
                                                                        {{ trans('main_translation.ProductImage') }}
                                                                    </th>
                                                                    <th scope="col">
                                                                        {{ trans('main_translation.ProductName') }}
                                                                    </th>
                                                                    <th scope="col">
                                                                        {{ trans('main_translation.ProductPrice') }}
                                                                    </th>
                                                                    <th scope="col">
                                                                        {{ trans('main_translation.Quantity') }}
                                                                    </th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                @foreach ($order->items as $item)
                                                                    <tr role="row" class="odd">
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>
                                                                            <ul
                                                                                class="list-unstyled users-list m-0  d-flex align-items-center">
                                                                                @foreach ($item->product->images as $value)
                                                                                    <li data-toggle="tooltip"
                                                                                        data-popup="tooltip-custom"
                                                                                        data-placement="bottom"
                                                                                        data-original-title="Vinnie Mostowy"
                                                                                        class="avatar pull-up">
                                                                                        <img class="media-object rounded-circle"
                                                                                            src="{{ $value->product_image_url }}"
                                                                                            alt="" height="60"
                                                                                            width="60">
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </td>
                                                                        <td class="text-success fw-bold">
                                                                            {{ $item->product_name }}
                                                                        </td>
                                                                        <td class="text-success fw-bold">
                                                                            {{ $item->product->product_price }}
                                                                        </td>
                                                                        <td>
                                                                            {{ $item->quantity }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- information start -->

                    </div>
                </section>
                <!-- page users view end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection
