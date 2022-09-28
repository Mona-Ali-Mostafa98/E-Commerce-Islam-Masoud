@extends('admin.layouts.layout')
@section('page_title', 'Users List')
@section('content')
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
                                        {{ trans('main_translation.UsersList') }}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        @can('Add User')
                            <a href="{{ route('admin.users.create') }}" id="addRow"
                                class="btn btn-primary  waves-effect waves-light">
                                </i>{{ trans('main_translation.AddUser') }}</a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Users List table -->
                <section id="add-row">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{ trans('main_translation.UsersList') }}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div
                                                            class="ag-grid-btns d-flex justify-content-between flex-wrap mb-1">
                                                            <form action="{{ route('admin.users.index') }}"
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
                                                                        {{ trans('main_translation.UserImage') }}
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
                                                                @forelse ($users as $user)
                                                                    <tr role="row" class="odd">
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td><img src="{{ $user->image_url }}"
                                                                                alt="" height="60"
                                                                                width="60"></td>
                                                                        <td class="text-success fw-bold">
                                                                            {{ $user->full_name }}</td>
                                                                        <td>
                                                                            @if ($user->status === 'active')
                                                                                {{ trans('main_translation.Active') }}
                                                                            @else
                                                                                {{ trans('main_translation.Inactive') }}
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            <div class="d-flex justify-content-start">
                                                                                @can('Show User')
                                                                                    <a href="{{ route('admin.users.show', $user->id) }}"
                                                                                        class="btn btn-success glow mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-light">{{ trans('main_translation.Show') }}</a>
                                                                                @endcan
                                                                                @can('Update User')
                                                                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                                                                        class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-light">{{ trans('main_translation.Edit') }}</a>
                                                                                @endcan
                                                                                @can('Delete User')
                                                                                    <form class="form-inline" method="post"
                                                                                        action="{{ route('admin.users.destroy', $user->id) }}">
                                                                                        @csrf
                                                                                        @method ('delete')
                                                                                        <button type="submit"
                                                                                            class="btn btn-danger glow mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-light show_confirm">{{ trans('main_translation.Delete') }}</button>
                                                                                    </form>
                                                                                @endcan

                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @empty
                                                                    <td class="text-center text-muted"
                                                                        style="font-size: 25px" colspan="5">
                                                                        {{ trans('main_translation.NoUsers') }}
                                                                    </td>
                                                                @endforelse
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                {{ $users->links('admin.layouts.pagination') }}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Users List table -->

            </div>
        </div>
    </div>
@endsection
