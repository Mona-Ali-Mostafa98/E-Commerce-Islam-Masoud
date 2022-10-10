@extends('website.layouts.layout')
@section('page_title', 'Favorites')
@section('content')

    <!------------- start of breadcrumb -------------->
    <div class="bg-white">
        <div class="container">
            <div class="d-flex align-items-center py-4 breadcrumb">
                <a href="{{ route('website.index') }}" class="text-muted">{{ trans('main_translation.HomePage') }}</a>
                <i class="bi bi-chevron-left mx-2"></i>
                <h6> {{ trans('main_translation.Favorites') }}</h6>
            </div>
        </div>
    </div>
    <!------------- end of breadcrumb -------------->

    <section class="products mb-5">
        <div class="container-lg py-5">
            <div class="row py-5">
                @foreach ($favorite_products as $product)
                    @include('website.partial._product-card')
                @endforeach
            </div>
        </div>
    </section>
@endsection
