<div class="form-body">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="full_name">{{ trans('main_translation.FullName') }}</label>
                <div class="controls">
                    <input name="full_name" type="full_name" id="full_name"
                        placeholder="{{ trans('main_translation.EnterFullName') }}"
                        value="{{ old('full_name', $user->full_name) }}"
                        class="form-control @error('full_name') is-invalid @enderror">
                    @error('full_name')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="email">{{ trans('main_translation.Email') }}</label>
                <div class="controls">
                    <input name="email" type="email" id="email"
                        placeholder="{{ trans('main_translation.EnterFullName') }}"
                        value="{{ old('email', $user->email) }}"
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="mobile_number">{{ trans('main_translation.MobileNumber') }}</label>
                <div class="controls">
                    <input name="mobile_number" type="mobile_number" id="mobile_number"
                        placeholder="{{ trans('main_translation.EnterMobileNumber') }}"
                        value="{{ old('mobile_number', $user->mobile_number) }}"
                        class="form-control @error('mobile_number') is-invalid @enderror">
                    @error('mobile_number')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="first-name-column">{{ trans('main_translation.Status') }}</label>
                <fieldset id="status" class="form-group">
                    <select name="status" class="form-control @error('status') is-invalid @enderror" id="basicSelect">
                        <option value="active" @if ($user->status == 'active' or old('status') == 'active') selected @endif>
                            {{ trans('main_translation.Active') }}
                        </option>
                        <option value="inactive" @if ($user->status == 'inactive' or old('status') == 'inactive') selected @endif>
                            {{ trans('main_translation.Inactive') }}
                        </option>
                    </select>
                </fieldset>
            </div>
            @error('status')
                <p class="invalid-feedback">{{ $message }}
                </p>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="password">{{ trans('main_translation.Password') }}</label>
                <div class="controls">
                    <input name="password" type="password" id="password"
                        placeholder="{{ trans('main_translation.EnterPassword') }}"
                        class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="password_confirmation">{{ trans('main_translation.PasswordConfirmation') }}</label>
                <div class="controls">
                    <input name="password_confirmation" type="password" id="password_confirmation"
                        placeholder="{{ trans('main_translation.EnterPasswordConfirmation') }}"
                        class="form-control @error('password_confirmation') is-invalid @enderror">
                    @error('password_confirmation')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-12">
            <fieldset class="form-group">
                <label for="profile_image">{{ trans('main_translation.UploadImage') }}</label>
                <div class="custom-file mb-1">
                    <input type="file" name="profile_image" id="profile_image"
                        class="custom-file-input @error('profile_image') is-invalid @enderror" id="inputGroupFile01"
                        onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                    <label class="custom-file-label"
                        for="inputGroupFile01">{{ trans('main_translation.UploadImage') }}</label>
                    @error('profile_image')
                        <p class="danger">{{ $message }}
                        </p>
                    @enderror
                </div>
                <img id="image" src="{{ url('storage/' . $user->profile_image) }}"
                    style="height: 80px; width: 100px;" alt="no user image uploaded">
            </fieldset>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary mr-1 mb-1  ">{{ trans('main_translation.Save') }}</button>
        </div>
    </div>
