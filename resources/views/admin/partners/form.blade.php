<div class="form-body">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="partner_name">{{ trans('main_translation.PartnerName') }}</label>
                <div class="controls">
                    <input name="partner_name" type="partner_name" id="partner_name"
                        placeholder="{{ trans('main_translation.EnterPartnerName') }}"
                        value="{{ old('partner_name', $partner->partner_name) }}"
                        class="form-control @error('partner_name') is-invalid @enderror">
                    @error('partner_name')
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
                        <option value="show" @if ($partner->status == 'show' or old('status') == 'show') selected @endif>
                            {{ trans('main_translation.Show') }}
                        </option>
                        <option value="hide" @if ($partner->status == 'hide' or old('status') == 'hide') selected @endif>
                            {{ trans('main_translation.Hide') }}
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
        <div class="col-lg-6 col-md-12">
            <fieldset class="form-group">
                <label for="partner_image">{{ trans('main_translation.UploadImage') }}</label>
                <div class="custom-file mb-1">
                    <input type="file" name="partner_image" id="partner_image"
                        class="custom-file-input @error('partner_image') is-invalid @enderror" id="inputGroupFile01"
                        onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                    <label class="custom-file-label"
                        for="inputGroupFile01">{{ trans('main_translation.UploadImage') }}</label>
                    @error('partner_image')
                        <p class="danger">{{ $message }}
                        </p>
                    @enderror
                </div>
                <img id="image" src="{{ url('storage/' . $partner->partner_image) }}"
                    style="height: 80px; width: 100px;" alt="no partner image uploaded">
            </fieldset>
        </div>
    </div>



    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary mr-1 mb-1  ">{{ trans('main_translation.Save') }}</button>
        </div>
    </div>
