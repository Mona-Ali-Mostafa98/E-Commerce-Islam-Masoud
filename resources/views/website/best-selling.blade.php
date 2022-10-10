@extends('website.layouts.layout')
@section('page_title', 'Best Selling Product')
@section('content')

    <!------------- start of breadcrumb -------------->
    <div class="bg-white">
        <div class="container">
            <div class="d-flex align-items-center py-4 breadcrumb">
                <a href="{{ route('website.index') }}" class="text-muted">{{ trans('main_translation.HomePage') }}</a>
                <i class="bi bi-chevron-left mx-2"></i>
                <h6> {{ trans('main_translation.BestSellingProducts') }}</h6>
            </div>
        </div>
    </div>
    <!------------- end of breadcrumb -------------->

    <section class="products mb-5">
        <div class="container-lg py-5">

            <div class="title-link">
                <div>
                    <h5 class="title">
                        <p class="before-title"></p>
                        {{ trans('main_translation.BestSellingProducts') }}
                    </h5>
                </div>
            </div>

            <div class="row py-5">
                @foreach ($best_selling_products as $product)
                    @include('website._product-card')
                @endforeach
            </div>
        </div>
    </section>
@endsection
