@extends('admin.layouts.layout')
@section('page_title', 'Show User')
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
                            <h2 class="content-header-title float-left mb-0">{{ trans('main_translation.Users') }}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">
                                        {{ trans('main_translation.ShowUser') }}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        @can('List Users')
                            <a href="{{ route('admin.users.index') }}" id="addRow"
                                class="btn btn-primary  waves-effect waves-light">
                                {{ trans('main_translation.UsersList') }}</a>
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
                                    <div class="card-title mb-2">{{ trans('main_translation.ShowUser') }}</div>
                                </div>
                                <div class="card-body">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.UserImage') }} </td>
                                                <td>
                                                    <img class="m-1" id="image" src="{{ $user->image_url }}"
                                                        alt="" height="100" width="150">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.FullName') }}
                                                </td>
                                                <td>
                                                    <textarea class="form-control m-1" cols="90" rows="1" readonly>{{ $user->full_name }}</textarea>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.Email') }}
                                                </td>
                                                <td>
                                                    <input class="form-control m-1" value="{{ $user->email }}" readonly>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.MobileNumber') }}
                                                </td>
                                                <td>
                                                    <input class="form-control m-1" value="{{ $user->mobile_number }}"
                                                        readonly>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.Status') }}</td>
                                                <td>
                                                    <input class="form-control m-1"
                                                        value="@if ($user->status === 'active') {{ trans('main_translation.Active') }}
                                                        @else {{ trans('main_translation.Inactive') }} @endif"
                                                        readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.CreatedAt') }}</td>
                                                <td>
                                                    <input class="form-control m-1"
                                                        value="{{ $user->created_at?->translatedFormat('l , j F Y , H:i:s') ?? 'N/A' }}"
                                                        readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.UpdatedAt') }}</td>
                                                <td>
                                                    <input class="form-control m-1"
                                                        value="{{ $user->updated_at?->translatedFormat('l , j F Y , H:i:s') ?? 'N/A' }}"
                                                        readonly>

                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.Orders') }}</td>
                                                <td>
                                                    <div class="m-1" style="height:auto">
                                                        <table class="table table-striped dataex-html5-selectors dataTable"
                                                            id="DataTables_Table_3" role="grid"
                                                            aria-describedby="DataTables_Table_3_info">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">
                                                                        {{ trans('main_translation.OrderNumber') }}
                                                                    </th>
                                                                    <th scope="col">
                                                                        {{ trans('main_translation.UserOrdered') }}
                                                                    </th>
                                                                    <th scope="col">
                                                                        {{ trans('main_translation.PaymentMethod') }}
                                                                    </th>
                                                                    <th scope="col">
                                                                        {{ trans('main_translation.Status') }}</th>
                                                                    <th scope="col">
                                                                        {{ trans('main_translation.OrderCreatedAt') }}</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                @forelse ($user_orders as $order)
                                                                    <tr role="row" class="odd">
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td class="text-success fw-bold">
                                                                            {{ $order->order_number }}</td>
                                                                        <td>
                                                                            {{ $order->user->full_name }}</td>
                                                                        <td>
                                                                            {{ $order->payment_method }}</td>
                                                                        <td>
                                                                            @if ($order->status === 'pending')
                                                                                {{ trans('main_translation.Pending') }}
                                                                            @elseif($order->status === 'charged')
                                                                                {{ trans('main_translation.Charged') }}
                                                                            @else
                                                                                {{ trans('main_translation.Delivering') }}
                                                                            @endif
                                                                        </td>
                                                                        <td>{{ $order->created_at?->translatedFormat('l , j F Y') ?? 'N/A' }}
                                                                        </td>
                                                                    </tr>
                                                                @empty
                                                                    <td class="text-center text-muted"
                                                                        style="font-size: 25px" colspan="6">
                                                                        {{ trans('main_translation.NoOrdersForUser') }}
                                                                    </td>
                                                                @endforelse
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.Wishlist') }}</td>
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
                                                                        {{ trans('main_translation.CreatedAt') }}</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                @forelse ($favorite_products as $favorite_product)
                                                                    <tr role="row" class="odd">
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>
                                                                            <ul
                                                                                class="list-unstyled users-list m-0  d-flex align-items-center">
                                                                                @foreach ($favorite_product->product->images as $value)
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
                                                                            {{ $favorite_product->product->product_name }}
                                                                        </td>
                                                                        <td>
                                                                            {{ $favorite_product->product->product_price }}
                                                                        </td>
                                                                        <td>{{ $favorite_product->created_at?->translatedFormat('l , j F Y') ?? 'N/A' }}
                                                                        </td>
                                                                    </tr>
                                                                @empty
                                                                    <td class="text-center text-muted"
                                                                        style="font-size: 25px" colspan="6">
                                                                        {{ trans('main_translation.NoProductInWishlist') }}
                                                                    </td>
                                                                @endforelse
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.UserCart') }}</td>
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
                                                                    <th scope="col">
                                                                        {{ trans('main_translation.CreatedAt') }}</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                @forelse ($cart_products as $cart_product)
                                                                    <tr role="row" class="odd">
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>
                                                                            <ul
                                                                                class="list-unstyled users-list m-0  d-flex align-items-center">
                                                                                @foreach ($cart_product->product->images as $value)
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
                                                                            {{ $cart_product->product->product_name }}
                                                                        </td>
                                                                        <td>
                                                                            {{ $cart_product->product->product_price }}
                                                                        </td>
                                                                        <td>
                                                                            {{ $cart_product->quantity }}
                                                                        </td>
                                                                        <td>{{ $cart_product->created_at?->translatedFormat('l , j F Y') ?? 'N/A' }}
                                                                        </td>
                                                                    </tr>
                                                                @empty
                                                                    <td class="text-center text-muted"
                                                                        style="font-size: 25px" colspan="6">
                                                                        {{ trans('main_translation.NoProductInCart') }}
                                                                    </td>
                                                                @endforelse
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
