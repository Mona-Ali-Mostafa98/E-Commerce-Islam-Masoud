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

                <div class="personal-title rounded-3  d-flex align-items-center">
                    <div class="profile-pic position-relative bg-light">
                        <img class="w-100 h-100" src="{{ $user->image_url }}" alt="" id="photo">
                        <div class="profile-pic-icon">
                            <i class="bi bi-camera-fill"></i>
                        </div>
                        <input type="file" id="file" name="profile_image" accept="image/*"
                            onchange="document.getElementById('photo').src = window.URL.createObjectURL(this.files[0])">
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
                        <div class="tab-pane fade show active" id="v-pills-info" role="tabpanel"
                            aria-labelledby="v-pills-info-tab">
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
                        <div class="tab-pane fade" id="v-pills-addr" role="tabpanel" aria-labelledby="v-pills-addr-tab">
                            <!-- form addr -->
                            <form action="{{ route('website.add_address_for_user') }}" method="post">
                                @csrf
                                <input name="user_id" type="text" value="{{ Auth::guard('web')->user()?->id }}"
                                    hidden>
                                <!-- profile-addr -->
                                <div class="mb-5">
                                    @if ($user)
                                        @foreach ($user->addresses as $address)
                                            <div class="profile-addr bg-light position-relative p-3 mb-2 rounded-3">
                                                <div class="user-addr">
                                                    <input type="radio" class="ms-2" name="personal-addr"
                                                        value="{{ $address->id }}" checked>
                                                    <label for="html"
                                                        class="text-muted w-75">{{ $address->full_address }} ,
                                                        {{ $address->city }} , {{ $address->state }}</label>
                                                </div>
                                                <a href="{{ route('website.user_address_form', $address->id) }}">
                                                    <i class="bi bi-pencil-fill "></i>
                                                </a>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <button type="button"
                                    class="btn custom-btn rounded mb-4">{{ trans('main_translation.AddAddress') }}</button>
                                <div class="row gy-4">

                                    @include('website.partial._address-form')

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
                            @foreach ($orders as $order)
                            <div class="shipment-progress-container">
                                <div class="shipment-progress" data-bs-toggle="collapse" data-bs-target="#collapseExample{{$order->id}}" aria-expanded="false" aria-controls="collapseExample">
                                    <div class="bar">
                                        <div class="d-none"></div>
                                        <div class="@if($order->status == "charged") w-50 @else d-none @endif"></div>
                                        <div class="@if($order->status == "delivering") w-100 @else d-none @endif"></div>
                                    </div>
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
                                    <button class="btn" type="button">
                                      <i class="bi bi-caret-down-fill"></i>
                                    </button>
                                </div>

                                <div class="updates collapse" id="collapseExample{{$order->id}}">
                                    <h5>: {{ trans('main_translation.Updates') }}</h5>
                                    <table>
                                        <tr>
                                            <th>{{ trans('main_translation.Date') }}</th>
                                            <th>{{ trans('main_translation.OrderNumber') }}</th>
                                            <th>{{ trans('main_translation.Status') }}</th>
                                        </tr>
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
                                    </table>

                                    <a class="mb-4"
                                        href="{{ route('website.order_details') }}">{{ trans('main_translation.InvoicePage') }}</a>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
