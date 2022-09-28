@extends('admin.layouts.layout')
@section('page_title', 'Admins List')
@section('content')
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
                                        {{ trans('main_translation.AdminsList') }}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        @can('Add Admin')
                            <a href="{{ route('admin.admins.create') }}" id="addRow"
                                class="btn btn-primary  waves-effect waves-light">
                                </i>{{ trans('main_translation.AddAdmin') }}</a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Admins List table -->
                <section id="add-row">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{ trans('main_translation.AdminsList') }}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div
                                                            class="ag-grid-btns d-flex justify-content-between flex-wrap mb-1">
                                                            <form action="{{ route('admin.admins.index') }}"
                                                                class="form-inline" method="get">
                                                                <div class="ag-btns d-flex flex-wrap">
                                                                    <input type="text" name="search"
                                                                        class="ag-grid-filter form-control w-150 mr-1 mb-1 mb-sm-0"
                                                                        id="filter-text-box"
                                                                        placeholder="{{ trans('main_translation.Search') }}">
                                                                    <div class="action-btns">
                                                                        <button type="submit"
                                                                            class="btn btn-primary px-2 py-75 waves-effect waves-light">
                                                                            {{ trans('main_translation.Search') }}
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table
                                                            class="table table-striped table-hover-animation dataex-html5-selectors dataTable"
                                                            id="DataTables_Table_3" role="grid"
                                                            aria-describedby="DataTables_Table_3_info">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">
                                                                        {{ trans('main_translation.AdminImage') }}
                                                                    </th>
                                                                    <th scope="col">
                                                                        {{ trans('main_translation.FullName') }}
                                                                    </th>
                                                                    <th scope="col">
                                                                        {{ trans('main_translation.Status') }}</th>
                                                                    <th scope="col">
                                                                        {{ trans('main_translation.Actions') }}</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                @forelse ($admins as $admin)
                                                                    <tr role="row" class="odd">
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td><img src="{{ $admin->image_url }}"
                                                                                alt="" height="60"
                                                                                width="60"></td>
                                                                        <td class="text-success fw-bold">
                                                                            {{ $admin->name }}</td>
                                                                        <td>
                                                                            @if ($admin->status === 'active')
                                                                                {{ trans('main_translation.Active') }}
                                                                            @else
                                                                                {{ trans('main_translation.Inactive') }}
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            <div class="d-flex justify-content-start">
                                                                                @can('Show Admin')
                                                                                    <a href="{{ route('admin.admins.show', $admin->id) }}"
                                                                                        class="btn btn-success glow mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-light">{{ trans('main_translation.Show') }}</a>
                                                                                @endcan
                                                                                @can('Update Admin')
                                                                                    <a href="{{ route('admin.admins.edit', $admin->id) }}"
                                                                                        class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-light">{{ trans('main_translation.Edit') }}</a>
                                                                                @endcan
                                                                                @if ($admin->id != Auth::guard('admin')->user()->id)
                                                                                    @can('Delete Admin')
                                                                                        <form class="form-inline" method="post"
                                                                                            action="{{ route('admin.admins.destroy', $admin->id) }}">
                                                                                            @csrf
                                                                                            @method ('delete')
                                                                                            <button type="submit"
                                                                                                class="btn btn-danger glow mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-light show_confirm">{{ trans('main_translation.Delete') }}</button>
                                                                                        </form>
                                                                                    @endcan
                                                                                @endif
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @empty
                                                                    <td class="text-center text-muted"
                                                                        style="font-size: 25px" colspan="5">
                                                                        {{ trans('main_translation.NoAdmins') }}
                                                                    </td>
                                                                @endforelse
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                {{ $admins->links('admin.layouts.pagination') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Admins List table -->

            </div>
        </div>
    </div>
@endsection
