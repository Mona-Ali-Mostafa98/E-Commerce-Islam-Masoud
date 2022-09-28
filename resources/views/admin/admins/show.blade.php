@extends('admin.layouts.layout')
@section('page_title', 'Show Admin')
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
                            <h2 class="content-header-title float-left mb-0">{{ trans('main_translation.Admins') }}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">
                                        {{ trans('main_translation.ShowAdmin') }}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        @can('List Admins')
                            <a href="{{ route('admin.admins.index') }}" id="addRow"
                                class="btn btn-primary  waves-effect waves-light">
                                {{ trans('main_translation.AdminsList') }}</a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- page admins view start -->
                <section class="page-users-view">
                    <div class="row">
                        <!-- information start -->
                        <div class="col-md-12 col-12 ">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title mb-2">{{ trans('main_translation.ShowAdmin') }}</div>
                                </div>
                                <div class="card-body">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="font-weight-bold">{{ trans('main_translation.AdminImage') }}
                                                </td>
                                                <td>
                                                    <img class="m-1" id="image" src="{{ $admin->image_url }}"
                                                        alt="" height="100" width="150">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">{{ trans('main_translation.FullName') }}
                                                </td>
                                                <td>
                                                    <textarea class="form-control m-1" cols="90" rows="1" readonly>{{ $admin->name }}</textarea>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="font-weight-bold">{{ trans('main_translation.Email') }}
                                                </td>
                                                <td>
                                                    <input class="form-control m-1" value="{{ $admin->email }}" readonly>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="font-weight-bold">{{ trans('main_translation.MobileNumber') }}
                                                </td>
                                                <td>
                                                    <input class="form-control m-1"
                                                        value="{{ $admin->mobile_number ?? trans('main_translation.Null') }}"
                                                        readonly>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="font-weight-bold">{{ trans('main_translation.Status') }}</td>
                                                <td>
                                                    <input class="form-control m-1"
                                                        value="@if ($admin->status === 'active') {{ trans('main_translation.Active') }}
                                                        @else {{ trans('main_translation.Inactive') }} @endif"
                                                        readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">{{ trans('main_translation.CreatedAt') }}</td>
                                                <td>
                                                    <input class="form-control m-1"
                                                        value="{{ $admin->created_at?->translatedFormat('l , j F Y , H:i:s') ?? 'N/A' }}"
                                                        readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">{{ trans('main_translation.UpdatedAt') }}</td>
                                                <td>
                                                    <input class="form-control m-1"
                                                        value="{{ $admin->updated_at?->translatedFormat('l , j F Y , H:i:s') ?? 'N/A' }}"
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
                <!-- page admins view end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection
