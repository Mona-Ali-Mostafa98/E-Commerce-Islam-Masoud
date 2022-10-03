<div class="form-body">
    <div class="row">
        @foreach (LaravelLocalization::getSupportedLocales() as $language => $value)
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="title">{{ trans('main_translation.ImageTitle_' . $language) }}</label>
                    <div class="controls">
                        <input type="text" name="title[{{ $language }}]" id="title"
                            class="form-control @error("title.$language") is-invalid @enderror"
                            placeholder="{{ trans('main_translation.EnterImageTitle_' . $language) }}"
                            value="{{ old("title.$language", $title[$language] ?? '') }}">
                    </div>
                    @error("title.$language")
                        <p class="danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        @endforeach

        <div class="col-lg-6 col-md-12">
            <fieldset class="form-group">
                <label for="image_input">{{ trans('main_translation.UploadImage') }}</label>
                <div class="custom-file mb-1">
                    <input type="file" name="image" id="image_input"
                        class="custom-file-input @error('image') is-invalid @enderror" id="inputGroupFile01"
                        onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                    <label class="custom-file-label"
                        for="inputGroupFile01">{{ trans('main_translation.UploadImage') }}</label>
                    @error('image')
                        <p class="danger">{{ $message }}
                        </p>
                    @enderror
                </div>
                <img id="image" src="{{ url('storage/' . $gallery->image) }}" style="height: 80px; width: 100px;"
                    alt="no image uploaded">
            </fieldset>
        </div>

        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="first-name-column">{{ trans('main_translation.Status') }}</label>
                <fieldset id="status" class="form-group">
                    <select name="status" class="form-control @error('status') is-invalid @enderror" id="basicSelect">
                        <option value="show" @if ($gallery->status == 'show' or old('status') == 'show') selected @endif>
                            {{ trans('main_translation.Show') }}
                        </option>
                        <option value="hide" @if ($gallery->status == 'hide' or old('status') == 'hide') selected @endif>
                            {{ trans('main_translation.Hide') }}
                        </option>
                    </select>
                </fieldset>
            </div>
            @error('status')
                <p class="danger">{{ $message }}
                </p>
            @enderror
        </div>

        <div class="row">
            <div class="col-12">
                <button type="submit"
                    class="btn btn-primary mr-1 mb-1  ">{{ trans('main_translation.Save') }}</button>
            </div>
        </div>

    </div>
