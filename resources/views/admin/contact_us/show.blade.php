@extends('admin.layouts.layout')
@section('page_title', 'Show ContactUs')
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
                            <h2 class="content-header-title float-left mb-0">{{ trans('main_translation.ContactUs') }}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">
                                        {{ trans('main_translation.ShowContactUs') }}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        @can('List Contact Us')
                            <a href="{{ route('admin.contacts.index') }}" id="addRow"
                                class="btn btn-primary  waves-effect waves-light">
                                {{ trans('main_translation.ContactUsList') }}</a>
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
                                    <div class="card-title mb-2">{{ trans('main_translation.ShowContactUs') }}</div>
                                </div>
                                <div class="card-body">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="font-weight-bold text-success">
                                                    {{ trans('main_translation.UserName') }}
                                                </td>
                                                <td>
                                                    <input class="form-control m-1" value="{{ $contact->full_name }}"
                                                        readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold text-success">
                                                    {{ trans('main_translation.Email') }}
                                                </td>
                                                <td>
                                                    <input class="form-control m-1" value="{{ $contact->email }}" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold text-success">
                                                    {{ trans('main_translation.MobileNumber') }}
                                                </td>
                                                <td>
                                                    <input class="form-control m-1" value="{{ $contact->mobile_number }}"
                                                        readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold text-success">
                                                    {{ trans('main_translation.Message') }}
                                                </td>
                                                <td>
                                                    <textarea class="form-control m-1" cols="90" rows="3" readonly>{{ $contact->message }}</textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold text-success">
                                                    {{ trans('main_translation.SendAt') }}</td>
                                                <td>
                                                    <input class="form-control m-1"
                                                        value="{{ $contact->created_at?->translatedFormat('l , j F Y , H:i:s') ?? 'N/A' }}"
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
