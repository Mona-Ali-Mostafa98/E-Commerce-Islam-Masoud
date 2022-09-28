<div class="form-body">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="name">{{ trans('main_translation.FullName') }}</label>
                <div class="controls">
                    <input name="name" type="name" id="name"
                        placeholder="{{ trans('main_translation.EnterFullName') }}"
                        value="{{ old('name', $admin->name) }}"
                        class="form-control @error('name') is-invalid @enderror">
                    @error('name')
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
                        value="{{ old('email', $admin->email) }}"
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
                <label for="mobile">{{ trans('main_translation.MobileNumber') }}</label>
                <div class="controls">
                    <input name="mobile" type="mobile" id="mobile"
                        placeholder="{{ trans('main_translation.EnterMobileNumber') }}"
                        value="{{ old('mobile', $admin->mobile) }}"
                        class="form-control @error('mobile') is-invalid @enderror">
                    @error('mobile')
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
                        <option value="active" @if ($admin->status == 'active' or old('status') == 'active') selected @endif>
                            {{ trans('main_translation.Active') }}
                        </option>
                        <option value="inactive" @if ($admin->status == 'inactive' or old('status') == 'inactive') selected @endif>
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
                <label for="image">{{ trans('main_translation.UploadImage') }}</label>
                <div class="custom-file mb-1">
                    <input type="file" name="image" id="image"
                        class="custom-file-input @error('image') is-invalid @enderror" id="inputGroupFile01"
                        onchange="document.getElementById('admin_image').src = window.URL.createObjectURL(this.files[0])">
                    <label class="custom-file-label"
                        for="inputGroupFile01">{{ trans('main_translation.UploadImage') }}</label>
                    @error('image')
                        <p class="danger">{{ $message }}
                        </p>
                    @enderror
                </div>
                <img id="admin_image" src="{{ asset('storage/' . $admin->image) }}" style="height: 80px; width: 100px;"
                    alt="no admin image uploaded">
            </fieldset>
        </div>

        <div class="col-lg-6 col-md-12">
            <fieldset class="form-group">
                <label for="rolesSelect">{{ trans('main_translation.AdminRoles') }}</label>
                @foreach ($roles as $key => $role)
                    <select name="roles_name[{{ $key }}]"
                        class="form-control @error("roles_name.$key") is-invalid @enderror" id="rolesSelect"
                        size="2" multiple="multiple">
                        <option value="{{ $role->name }}" @if (old("roles_name.$key", isset($admin->roles_name[$key]))) selected @endif>
                            {{ $role->name }}</option>
                    </select>
                @endforeach

                @error('roles_name.*')
                    <p class="danger">{{ $message }}</p>
                @enderror
            </fieldset>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary mr-1 mb-1  ">{{ trans('main_translation.Save') }}</button>
        </div>
    </div>
