@extends('admin.layouts.layout')
@section('page_title', 'Contact Us List')
@section('content')
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
                                        {{ trans('main_translation.ContactUsList') }}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Contact Us List table -->
                <section id="add-row">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{ trans('main_translation.ContactUsList') }}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div
                                                            class="ag-grid-btns d-flex justify-content-between flex-wrap mb-1">
                                                            <form action="{{ route('admin.contacts.index') }}"
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
                                                        <table class="table table-striped dataex-html5-selectors dataTable"
                                                            id="DataTables_Table_3" role="grid"
                                                            aria-describedby="DataTables_Table_3_info">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">
                                                                        {{ trans('main_translation.FullName') }}
                                                                    </th>
                                                                    <th scope="col">
                                                                        {{ trans('main_translation.Email') }}
                                                                    </th>
                                                                    <th scope="col">
                                                                        {{ trans('main_translation.MobileNumber') }}
                                                                    </th>
                                                                    <th scope="col">
                                                                        {{ trans('main_translation.SendAt') }}</th>
                                                                    <th scope="col">
                                                                        {{ trans('main_translation.Actions') }}</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                @forelse($contacts as $contact)
                                                                    <tr role="row" class="odd">
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td class="text-success fw-bold">
                                                                            {{ $contact->full_name }}</td>
                                                                        <td>
                                                                            {{ $contact->email }}</td>
                                                                        <td>
                                                                            {{ $contact->mobile_number }}</td>
                                                                        <td>{{ $contact->created_at?->translatedFormat('l , j F Y') ?? 'N/A' }}
                                                                        </td>
                                                                        <td>
                                                                            <div class="d-flex justify-content-start">
                                                                                @can('Show Contact Us')
                                                                                    <a href="{{ route('admin.contacts.show', $contact->id) }}"
                                                                                        class="btn btn-success glow mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-light">{{ trans('main_translation.Show') }}</a>
                                                                                @endcan

                                                                                @can('Delete Contact Us')
                                                                                    <form class="form-inline" method="post"
                                                                                        action="{{ route('admin.contacts.destroy', $contact->id) }}">
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
                                                                        {{ trans('main_translation.NoContactUs') }}
                                                                    </td>
                                                                @endforelse
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                {{ $contacts->links('admin.layouts.pagination') }}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Contact Us List table -->

            </div>
        </div>
    </div>
@endsection
