<div class="form-body">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="name">{{ trans('main_translation.RoleName') }}</label>
                <div class="controls">
                    <input name="name" type="name" id="name"
                        placeholder="{{ trans('main_translation.EnterRoleName') }}"
                        value="{{ old('name', $role->name) }}" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="permission">{{ trans('main_translation.Status') }}</label>
                @foreach ($permissions as $permission)
                    <fieldset>
                        <div class="vs-checkbox-con vs-checkbox-primary">
                            <input type="checkbox" name="permission[{{ $permission->id }}]"
                                value="{{ $permission->id }}"
                                {{ (is_array(old('permission')) && in_array($permission->id, old('permission'))) || in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                            <span class="vs-checkbox">
                                <span class="vs-checkbox--check">
                                    <i class="vs-icon feather icon-check"></i>
                                </span>
                            </span>
                            <span class="">{{ $permission->name }}</span>
                        </div>
                    </fieldset>
                @endforeach
                @error('permission.*')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary mr-1 mb-1  ">{{ trans('main_translation.Save') }}</button>
        </div>
    </div>
