@extends('admin.layouts.layout')
@section('page_title', 'Show Product')
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
                            <h2 class="content-header-title float-left mb-0">{{ trans('main_translation.Products') }}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">
                                        {{ trans('main_translation.ShowProduct') }}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        @can('List Products')
                            <a href="{{ route('admin.products.index') }}" id="addRow"
                                class="btn btn-primary  waves-effect waves-light">
                                {{ trans('main_translation.ProductsList') }}</a>
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
                                    <div class="card-title mb-2">{{ trans('main_translation.ShowProduct') }}</div>
                                </div>
                                <div class="card-body">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.ProductImage') }} </td>
                                                <td>
                                                    @foreach ($product->images as $value)
                                                        <img class="m-1" id="image"
                                                            src="{{ $value->product_image_url }}" alt=""
                                                            height="100" width="150">
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.ProductName') }}
                                                </td>
                                                <td>
                                                    <input class="form-control m-1" value="{{ $product->product_name }}"
                                                        readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.ProductModel') }}
                                                </td>
                                                <td>
                                                    <input class="form-control m-1" value="{{ $product->product_model }}"
                                                        readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.ProductPrice') }}
                                                </td>
                                                <td>
                                                    <input class="form-control m-1" value="{{ $product->product_price }}"
                                                        readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.ProductDetails') }} </td>
                                                <td>
                                                    <textarea class="form-control m-1" cols="90" rows="1" readonly>{{ $product->product_details }}</textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.ProductDescription') }} </td>
                                                <td>
                                                    <div class="form-control m-1"
                                                        style="background-color: #F5F5F1; height:auto">
                                                        {!! $product->product_description !!}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.Status') }}</td>
                                                <td>
                                                    <input class="form-control m-1"
                                                        value="@if ($product->status === 'active') {{ trans('main_translation.ActiveProduct') }}
                                                        @elseif($product->status === 'draft') {{ trans('main_translation.Draft') }} @else {{ trans('main_translation.Archived') }} @endif"
                                                        readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.BestSelling') }}</td>
                                                <td>
                                                    <input class="form-control m-1"
                                                        value="@if ($product->best_selling == 1) {{ trans('main_translation.Yes') }} @else {{ trans('main_translation.No') }} @endif"
                                                        readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.CreatedAt') }}</td>
                                                <td>
                                                    <input class="form-control m-1"
                                                        value="{{ $product->created_at?->translatedFormat('l , j F Y , H:i:s') ?? 'N/A' }}"
                                                        readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold text-primary">
                                                    {{ trans('main_translation.UpdatedAt') }}</td>
                                                <td>
                                                    <input class="form-control m-1"
                                                        value="{{ $product->updated_at?->translatedFormat('l , j F Y , H:i:s') ?? 'N/A' }}"
                                                        readonly>

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
