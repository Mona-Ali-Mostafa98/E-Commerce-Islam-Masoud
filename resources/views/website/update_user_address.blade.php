@extends('website.layouts.layout')
@section('page_title', 'Profile')
@section('content')

    <!------------- start of breadcrumb -------------->
    <div class="bg-white">
        <div class="container">
            <div class="d-flex align-items-center py-4 breadcrumb">
                <a href="{{ route('website.index') }}" class="text-muted">{{ trans('main_translation.HomePage') }}</a>
                <i class="bi bi-chevron-left mx-2"></i>
                <h6> {{ trans('main_translation.Profile') }}</h6>
            </div>
        </div>
    </div>
    <!------------- end of breadcrumb -------------->

    <!------------- profile -------------->
    <section class="profile py-5">
        <div class="container">
            <div class="row d-flex justify-content-between align-items-start">
                <!-- profile nav-sm -->
                <div class="profile-nav-sm rounded-3">
                    <p class="m-0">{{ trans('main_translation.Profile') }}</p>
                    <img src="{{ url('website/images/Group 67653.png') }}" class="btn" type="button"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"
                        alt="">
                    <!-- nav-items -->
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                        aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <!-- title -->
                            <h5 id="offcanvasRightLabel">{{ trans('main_translation.Profile') }}</h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            @include('website.partial._profile-sidebar')
                        </div>
                    </div>
                </div>

                {{-- image header , name and email --}}
                <div class="personal-title rounded-3  d-flex align-items-center">
                    <div class="profile-pic position-relative bg-light">
                        <img class="w-100 h-100" src="{{ $user->image_url }}" alt="" id="photo">
                        <div class="profile-pic-icon">
                            <i class="bi bi-camera-fill"></i>
                        </div>
                        <input type="file" id="file" name="profile_image" accept="image/*">
                    </div>
                    <div class="user-info">
                        <h5>{{ $user->full_name }}</h5>
                        <p>{{ $user->email }}</p>
                    </div>
                    <button><i class="bi bi-pen-fill"></i> {{ trans('main_translation.UpdateProfile') }}</button>
                </div>
                <!-- profile nav-lg col -->
                <div class="profile-nav col col-md-5 col-lg-3">
                    @include('website.partial._profile-sidebar')
                </div>

                <!-- profile data col -->
                <div class="profile-data col col-md-7 col-lg-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <!-- المعلومات الشخصية -->
                        <div class="tab-pane fade" id="v-pills-info" role="tabpanel" aria-labelledby="v-pills-info-tab">
                            <form action="{{ route('website.update.profile', $user->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <!-- profile-picture -->
                                <div class="row align-items-end gy-3">
                                    <!-- الاسم -->
                                    <div class="col-12 col-lg-12">
                                        <label>{{ trans('main_translation.Name') }}</label>
                                        <input name="full_name" value="{{ old('full_name', $user->full_name) }}"
                                            class="form-control" type="text">
                                        @error('full_name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <!-- البريد الالكتروني -->
                                    <div class="col-12 col-lg-12">
                                        <label>{{ trans('main_translation.Email') }}</label>
                                        <input name="email" value="{{ old('email', $user->email) }}" class="form-control"
                                            type="email">
                                        @error('email')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <!-- رقم الجوال -->
                                    <div class="col-12 col-lg-12">
                                        <label>{{ trans('main_translation.MobileNumber') }}</label>
                                        <input name="mobile_number"
                                            value="{{ old('mobile_number', $user->mobile_number) }}" class="form-control"
                                            type="text">
                                        @error('mobile_number')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <!-- الرقم السري -->
                                    <div class="col col">
                                        <label>{{ trans('main_translation.Password') }}</label>
                                        <input name="password" class="form-control" type="text" placeholder="********"
                                            disabled>
                                    </div>
                                    <div class="edit-profileData col-auto">
                                        <button type="button" class="btn custom-btn rounded m-0" data-bs-toggle="modal"
                                            data-bs-target="#changePassModal"
                                            style="background:#D8D8D8 ; color: black;">{{ trans('main_translation.Edit') }}</button>
                                    </div>
                                    <!-- تلقى الاشعارات -->
                                    <div class="col-12 col-lg-12">
                                        <label>{{ trans('main_translation.Notifications') }}</label>
                                        <div class="position-relative">
                                            <div class="form-check form-switch">
                                                <input name="receive_notifications" class="form-check-input" type="checkbox"
                                                    value="1" @if (old('receive_notifications', $user->receive_notifications) == 1) checked @endif
                                                    role="switch" id="flexSwitchCheckChecked">
                                                <label class="form-check-label" for="flexSwitchCheckChecked">
                                                    {{ trans('main_translation.ReceiveNotifications') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- تغيير صورة البروفايل -->
                                    <div class="col-12 col-lg-12 ">
                                        <label>{{ trans('main_translation.ProfileImage') }}</label>
                                        <div class="profile-pic position-relative bg-light">
                                            <img class="w-100 h-100" src="{{ $user->image_url }}" alt=""
                                                id="profile_image">
                                            <div class="profile-pic-icon">
                                                <i class="bi bi-camera-fill"></i>
                                            </div>
                                            <input type="file" id="file" name="profile_image" accept="image/*"
                                                onchange="document.getElementById('profile_image').src = window.URL.createObjectURL(this.files[0])">
                                        </div>
                                        @error('profile_image')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>

                                </div>

                                <button type="submit"
                                    class="btn custom-btn rounded mt-5">{{ trans('main_translation.Save') }}</button>
                            </form>
                        </div>


                        <!-- العنوان -->
                        <div class="tab-pane fade active show" id="v-pills-addr" role="tabpanel"
                            aria-labelledby="v-pills-addr-tab">
                            <!-- form addr -->
                            <form action="{{ route('website.update_user_address', $user_address->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <input name="user_id" type="text" value="{{ Auth::guard('web')->user()?->id }}"
                                    hidden>
                                <!-- profile-addr -->
                                <button type="button"
                                    class="btn custom-btn rounded mb-4">{{ trans('main_translation.UpdateAddress') }}</button>
                                <div class="row gy-4">

                                    <!-- المدينة -->
                                    <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                                        <label>{{ trans('main_translation.City') }}</label>
                                        <input name="city" class="form-control" type="text"
                                            value="{{ old('city', $user_address->city) }}">
                                        @error('city')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <!-- المحافظة -->
                                    <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                                        <label>{{ trans('main_translation.Region') }}</label>
                                        <input name="state" class="form-control" type="text"
                                            value="{{ old('state', $user_address->state) }}">
                                        @error('state')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <!-- العنوان -->
                                    <div class="col-12">
                                        <label>{{ trans('main_translation.FullAddress') }}</label>
                                        <input name="full_address" class="form-control" type="text"
                                            value="{{ old('full_address', $user_address->full_address) }}">
                                        @error('full_address')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>

                                </div>
                                <button type="submit"
                                    class="btn custom-btn rounded mt-5">{{ trans('main_translation.Save') }}</button>
                            </form>
                        </div>


                        <!-- طلباتي -->
                        <div class="tab-pane fade" id="v-pills-fav" role="tabpanel" aria-labelledby="v-pills-fav-tab">
                            <!-- products section -->
                            <section class="products">
                                <div class="row gy-3">
                                    @foreach ($orders as $order)
                                        @foreach ($order->products as $product)
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                @include('website.partial._product-card')
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                            </section>
                            <!-- products section ends -->
                        </div>

                        <!-- تتبع الشحنة -->
                        <div class="tab-pane fade" id="v-pills-trace" role="tabpanel"
                            aria-labelledby="v-pills-trace-tab">
                            <div class="shipment-progress">
                                <div class="bar">
                                    <div class="d-none"></div>
                                    <div class="w-50"></div>
                                    <div class="w-100 d-none"></div>
                                </div>
                                @foreach ($orders as $order)
                                    @if ($loop->last)
                                        <div class="phases">
                                            <div class="phase">
                                                <p>{{ trans('main_translation.Pending') }}</p>
                                                <p>{{ $order->created_at->format('d/m/Y') }}</p>
                                            </div>
                                            <div class="phase">
                                                <p>{{ trans('main_translation.Charged') }}</p>
                                                @foreach (Auth::guard('web')->user()->Notifications as $notification)
                                                    @if ($notification->type == 'App\Notifications\OrderUpdatedNotification')
                                                        @if ($notification->data['status'] == 'charged')
                                                            <p>{{ $notification->created_at->format('d/m/Y') }}</p>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </div>

                                            <div class="phase">
                                                <p>{{ trans('main_translation.Delivering') }}</p>
                                                @foreach (Auth::guard('web')->user()->Notifications as $notification)
                                                    @if ($notification->type == 'App\Notifications\OrderUpdatedNotification')
                                                        @if ($notification->data['status'] == 'delivering')
                                                            <p>{{ $notification->created_at->format('d/m/Y') ?? '' }}</p>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>

                            <div class="updates">
                                <h5>: {{ trans('main_translation.Updates') }}</h5>
                                <table>
                                    <tr>
                                        <th>{{ trans('main_translation.Date') }}</th>
                                        <th>{{ trans('main_translation.OrderNumber') }}</th>
                                        <th>{{ trans('main_translation.Status') }}</th>
                                    </tr>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                            <td>{{ $order->order_number }}</td>
                                            <td>
                                                @if ($order->status == 'pending')
                                                    {{ trans('main_translation.Pending') }}
                                                @elseif ($order->status == 'charged')
                                                    {{ trans('main_translation.Charged') }}
                                                @else
                                                    {{ trans('main_translation.Delivering') }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>

                                <a
                                    href="{{ route('website.order_details') }}">{{ trans('main_translation.InvoicePage') }}</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('model')
    <div class="modal fade" id="changePassModal" tabindex="-1" aria-labelledby="changePassModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0 bg-light">
                    <h5 class="modal-title" id="changePassModalLabel">{{ trans('main_translation.ChangePassword') }}</h5>
                    <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('website.change_password') }}" method="POST">
                        @csrf
                        <div class="profile row align-items-end gy-3">
                            <!-- الرقم السري -->
                            <div class="col-12">
                                <label>{{ trans('main_translation.CurrentPassword') }}</label>
                                <div class="position-relative">
                                    <input name="current_password" class="form-control" type="password"
                                        placeholder="********">
                                </div>
                            </div>
                            <!-- الرقم السري الجديد -->
                            <div class="col-12">
                                <label>{{ trans('main_translation.NewPassword') }}</label>
                                <div class="position-relative">
                                    <input name="password" class="form-control" type="password" placeholder="********">
                                </div>
                            </div>
                            <!-- تاكيد الرقم السري -->
                            <div class="col-12">
                                <label>{{ trans('main_translation.NewPasswordConfirmation') }}</label>
                                <div class="position-relative">
                                    <input name="password_confirmation" class="form-control" type="password"
                                        placeholder="********">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit"
                                    class="btn custom-btn rounded w-100 my-3">{{ trans('main_translation.Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endpush
