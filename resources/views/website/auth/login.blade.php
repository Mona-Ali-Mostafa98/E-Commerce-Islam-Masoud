@extends('website.auth.layout')
@section('page_title', 'Register')
@section('content')

    <section class="register-login bg-white">
        <div class="container py-5">
            <div class="row align-items-center py-5">
                <div class="col-md-7 col-12">
                    <form action="{{ route('website.login') }}" method="POST" class="register-login-form">
                        @csrf
                        <div class="mb-3">
                            <a href="" class="register-login-by-facebook"> <i class="fa-brands fa-facebook-f"></i>
                                {{ trans('main_translation.LoginWithFaceboook') }} </a>
                        </div>
                        <div class="mb-3">
                            <a href="" class="register-login-by-google"> <img
                                    src="{{ url('website/images/google.png') }}" alt="">
                                {{ trans('main_translation.LoginWithGoogle') }} </a>
                        </div>
                        <div class="mb-3 text-center">
                            <h5>{{ trans('main_translation.OR') }}</h5>
                        </div>
                        <div class="mb-3">
                            <label for="mobile_number"
                                class="form-label">{{ trans('main_translation.MobileNumber') }}</label>
                            <input name="mobile_number" type="tel" class="form-control"
                                value="{{ old('mobile_number') }}" id="mobile_number" required>
                            @error('mobile_number')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label"> {{ trans('main_translation.Password') }}</label>
                            <input name="password" type="password" class="form-control" id="password" required>
                        </div>
                        <button type="submit">{{ trans('main_translation.Login') }}</button>

                        <div class="remember-me mb-4">
                            <a href="remember-me.html">{{ trans('main_translation.RemeberMe') }}</a>
                            <a href="change-pass.html">{{ trans('main_translation.ForgetPassword') }}</a>
                        </div>

                        <div class="text-center">
                            <p>{{ trans('main_translation.DontHaveAccount') }} <a
                                    href="{{ route('website.show_register_form') }}">
                                    {{ trans('main_translation.CreateNewAccount') }}</a>
                            </p>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 col-12">
                    <div class="logo m-auto mb-5">
                        <img src="{{ url('storage/' . $settings->website_logo) }}" alt="...">
                    </div>
                    <img src="{{ url('website/images/login_register/Tablet login-pana.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>


@endsection
