@extends('admin.layouts.layout')
@section('page_title', 'Sliders List')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">{{ trans('main_translation.Sliders') }}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">
                                        {{ trans('main_translation.SlidersList') }}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        @can('Add Slider')
                            <a href="{{ route('admin.sliders.create') }}" id="addRow"
                                class="btn btn-primary  waves-effect waves-light">
                                <i class="feather icon-plus"></i>{{ trans('main_translation.AddSlider') }}</a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Sliders List table -->
                <section id="add-row">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{ trans('main_translation.SlidersList') }}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table
                                                            class="table table-striped dataex-html5-selectors dataTable table-hover-animation"
                                                            id="DataTables_Table_3" role="grid"
                                                            aria-describedby="DataTables_Table_3_info">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">{{ trans('main_translation.Image') }}
                                                                    </th>
                                                                    <th scope="col">
                                                                        {{ trans('main_translation.SliderTitle') }}
                                                                    </th>
                                                                    <th scope="col">
                                                                        {{ trans('main_translation.Status') }}</th>
                                                                    <th scope="col">
                                                                        {{ trans('main_translation.CreatedAt') }}</th>
                                                                    <th scope="col">
                                                                        {{ trans('main_translation.Actions') }}</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                @foreach ($sliders as $slider)
                                                                    <tr role="row" class="odd">
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td><img src="{{ url('storage/' . $slider->image) }}"
                                                                                alt="" height="60"
                                                                                width="60"></td>
                                                                        <td class="text-success fw-bold">
                                                                            {{ $slider->title }}</td>
                                                                        <td>
                                                                            @if ($slider->status === 'show')
                                                                                {{ trans('main_translation.Show') }}
                                                                            @else
                                                                                {{ trans('main_translation.Hide') }}
                                                                            @endif
                                                                        </td>
                                                                        <td>{{ $slider->created_at?->translatedFormat('l , j F Y') ?? 'N/A' }}
                                                                        </td>
                                                                        <td>
                                                                            <div class="d-flex justify-content-start">
                                                                                @can('Show Slider')
                                                                                    <a href="{{ route('admin.sliders.show', $slider->id) }}"
                                                                                        class="btn btn-success glow mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-light">{{ trans('main_translation.Show') }}</a>
                                                                                @endcan
                                                                                @can('Update Slider')
                                                                                    <a href="{{ route('admin.sliders.edit', $slider->id) }}"
                                                                                        class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-light">{{ trans('main_translation.Edit') }}</a>
                                                                                @endcan
                                                                                @can('Delete Slider')
                                                                                    <form class="form-inline" method="post"
                                                                                        action="{{ route('admin.sliders.destroy', $slider->id) }}">
                                                                                        @csrf
                                                                                        @method ('delete')
                                                                                        <button type="submit"
                                                                                            class="btn btn-danger glow mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-light show_confirm">{{ trans('main_translation.Delete') }}</button>
                                                                                    </form>
                                                                                @endcan

                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Sliders List table -->

            </div>
        </div>
    </div>
@endsection
