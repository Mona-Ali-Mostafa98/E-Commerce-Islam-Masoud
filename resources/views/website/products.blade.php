@extends('website.layouts.layout')
@section('page_title', 'Products')
@section('content')

    <!------------- start of breadcrumb -------------->
    <div class="bg-white">
        <div class="container">
            <div class="d-flex align-items-center py-4 breadcrumb">
                <a href="{{ route('website.index') }}" class="text-muted">{{ trans('main_translation.HomePage') }}</a>
                <i class="bi bi-chevron-left mx-2"></i>
                <h6> {{ trans('main_translation.Shop') }}</h6>
            </div>
        </div>
    </div>
    <!------------- end of breadcrumb -------------->

    <section class="products mb-5">
        <div class="container-lg py-5">
            <div class="row py-5">
                @forelse ($products as $product)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        @include('website.partial._product-card')
                    </div>
                @empty
                    <div class="fs-3 text-center">
                        {{ trans('main_translation.NoProductsWithThisName') }}
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
