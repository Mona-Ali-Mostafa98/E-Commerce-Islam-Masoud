@extends('admin.layouts.layout')
@section('page_title', 'E-Commerce Islam Masoud')
@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
                    <div class="row">
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-primary p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="feather icon-users text-primary font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700">{{ $admins_count }}</h2>
                                        <p class="mb-0 line-ellipsis">{{ trans('main_translation.Admins') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-success p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="fa fa-users text-success font-medium-5"></i></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700">{{ $users_count }}</h2>
                                        <p class="mb-0 line-ellipsis">{{ trans('main_translation.Users') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-warning p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="feather icon-grid text-warning font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700">{{ $products_count }}</h2>
                                        <p class="mb-0 line-ellipsis">{{ trans('main_translation.Products') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-danger p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="feather icon-shopping-bag text-danger font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700">{{ $orders_count }}</h2>
                                        <p class="mb-0 line-ellipsis">{{ trans('main_translation.Orders') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="feather icon-eye text-info font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700">{{ $subscribes_count }}</h2>
                                        <p class="mb-0 line-ellipsis">{{ trans('main_translation.Subscribes') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-warning p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="feather icon-message-square text-warning font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700">{{ $contacts_count }}</h2>
                                        <p class="mb-0 line-ellipsis">{{ trans('main_translation.Contacts') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="mb-0">{{ trans('main_translation.LastProducts') }}</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse" class=""><i
                                                        class="feather icon-chevron-down"></i></a></li>
                                            <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                            <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                            <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show" style="position: static; zoom: 1;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="table-responsive mt-1">
                                                    <table class="table table-hover-animation mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>{{ trans('main_translation.ProductImage') }}</th>
                                                                <th>{{ trans('main_translation.ProductName') }}</th>
                                                                <th>{{ trans('main_translation.ProductPrice') }}</th>
                                                                <th>{{ trans('main_translation.CreatedAt') }}</th>
                                                            </tr>
                                                        </thead>
                                                        {{-- order_number payment_method status payment_status shipping_price total_price --}}
                                                        <tbody>
                                                            @forelse($latest_products as $product)
                                                                <tr>
                                                                    <td>
                                                                        <ul
                                                                            class="list-unstyled users-list m-0  d-flex align-items-center">
                                                                            @foreach ($product->images as $value)
                                                                                <li data-toggle="tooltip"
                                                                                    data-popup="tooltip-custom"
                                                                                    data-placement="bottom"
                                                                                    data-original-title="Vinnie Mostowy"
                                                                                    class="avatar pull-up">
                                                                                    <img class="media-object rounded-circle"
                                                                                        src="{{ $value->product_image_url }}"
                                                                                        alt="" height="50"
                                                                                        width="50">
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </td>
                                                                    <td>{{ $product->product_name }}</td>
                                                                    <td>{{ $product->product_price }}</td>
                                                                    <td>{{ $product->created_at?->translatedFormat('l , j F Y') ?? 'N/A' }}
                                                                    </td>
                                                                </tr>
                                                            @empty
                                                                <td class="text-center text-muted" style="font-size: 25px"
                                                                    colspan="6">
                                                                    {{ trans('main_translation.NoOrders') }}
                                                                </td>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header" style="padding-bottom: 1.5rem;">
                                    <h4 class="mb-0">{{ trans('main_translation.LastOrders') }}</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse" class=""><i
                                                        class="feather icon-chevron-down"></i></a></li>
                                            <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                            <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                            <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show" style="position: static; zoom: 1;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="table-responsive mt-1">
                                                    <table class="table table-hover-animation mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>{{ trans('main_translation.OrderNumber') }}</th>
                                                                <th>{{ trans('main_translation.OrderStatus') }}</th>
                                                                <th>{{ trans('main_translation.PaymentMethod') }}</th>
                                                                <th>{{ trans('main_translation.PaymentStatus') }}</th>
                                                                <th>{{ trans('main_translation.TotalPrice') }}</th>
                                                                <th>{{ trans('main_translation.OrderCreatedAt') }}</th>
                                                            </tr>
                                                        </thead>
                                                        {{-- order_number payment_method status payment_status shipping_price total_price --}}
                                                        <tbody>
                                                            @forelse($latest_orders as $order)
                                                                <tr>
                                                                    <td>{{ $order->order_number }}</td>
                                                                    <td>{{ $order->status }}</td>
                                                                    <td>{{ $order->payment_method }}</td>
                                                                    <td>{{ $order->payment_status }}</td>
                                                                    <td>{{ $order->total_price }}</td>
                                                                    <td>{{ $order->created_at?->translatedFormat('l , j F Y') ?? 'N/A' }}
                                                                    </td>
                                                                </tr>
                                                            @empty
                                                                <td class="text-center text-muted" style="font-size: 25px"
                                                                    colspan="6">
                                                                    {{ trans('main_translation.NoOrders') }}
                                                                </td>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Dashboard Analytics end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->


@endsection
