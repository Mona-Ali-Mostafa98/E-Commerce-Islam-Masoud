@extends('website.auth.layout')
@section('page_title', 'Register')
@section('content')

    <section class="register-login bg-white">
        <div class="container py-5">
            <div class="row align-items-center py-5">
                <div class="col-md-7 col-12">
                    <form action="{{ route('website.register') }}" method="post" class="register-login-form">
                        @csrf
                        <div class="mb-3">
                            <a href="" class="register-login-by-facebook"> <i class="fa-brands fa-facebook-f"></i>
                                {{ trans('main_translation.LoginWithFacebook') }} </a>
                        </div>
                        <div class="mb-3">
                            <a href="" class="register-login-by-google"> <img src="images/google.png" alt="">
                                {{ trans('main_translation.LoginWithGoogle') }} </a>
                        </div>
                        <div class="mb-3 text-center">
                            <h5>او</h5>
                        </div>

                        <div class="mb-3">
                            <label for="full_name" class="form-label">{{ trans('main_translation.Name') }}</label>
                            <input name="full_name" type="text" class="form-control" id="full_name"
                                value="{{ old('full_name') }}">
                            @error('full_name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="mobile_number"
                                class="form-label">{{ trans('main_translation.MobileNumber') }}</label>
                            <input name="mobile_number" type="tel" class="form-control" id="mobile_number"
                                value="{{ old('mobile_number') }}">
                            @error('mobile_number')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label"> {{ trans('main_translation.Password') }}</label>
                            <input name="password" type="password" class="form-control" id="">
                            @error('password')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for=""
                                class="form-label">{{ trans('main_translation.PasswordConfirmation') }}</label>
                            <input name="password_confirmation" type="password" class="form-control" id="">
                            @error('password_confirmation')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <button type="submit">{{ trans('main_translation.Login') }}</button>
                        <div class="remember-me mb-4">
                            <a href="remember-me.html">{{ trans('main_translation.RememberMe') }}</a>
                            <a href="change-pass.html">{{ trans('main_translation.ForgetPassword') }}</a>
                        </div>
                        <div class="text-center">
                            <p> {{ trans('main_translation.HaveAccount') }} <a
                                    href="{{ route('website.show_login_form') }}">
                                    {{ trans('main_translation.Login') }}</a></p>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 col-12">
                    <div class="logo m-auto mb-5">
                        <img src="{{ url('storage/' . $settings->website_logo) }}" alt="">
                    </div>
                    <img src="{{ url('website/images/login_register/Tablet login-pana.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>

@endsection
