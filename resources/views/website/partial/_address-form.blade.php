    <!-- المدينة -->
    <div class="col-12 col-sm-6 col-md-12 col-lg-6">
        <label>{{ trans('main_translation.City') }}</label>
        <input name="city" class="form-control" type="text" value="{{ old('city') }}">
        @error('city')
            <strong class="text-danger">{{ $message }}</strong>
        @enderror
    </div>
    <!-- المحافظة -->
    <div class="col-12 col-sm-6 col-md-12 col-lg-6">
        <label>{{ trans('main_translation.Region') }}</label>
        <input name="state" class="form-control" type="text" value="{{ old('state') }}">
        @error('state')
            <strong class="text-danger">{{ $message }}</strong>
        @enderror
    </div>
    <!-- العنوان -->
    <div class="col-12">
        <label>{{ trans('main_translation.FullAddress') }}</label>
        <input name="full_address" class="form-control" type="text" value="{{ old('full_address') }}">
        @error('full_address')
            <strong class="text-danger">{{ $message }}</strong>
        @enderror
    </div>
