<div class="form-body">
    <div class="row">
        @foreach (LaravelLocalization::getSupportedLocales() as $language => $value)
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="title">{{ trans('main_translation.ServiceTitle_' . $language) }}</label>
                    <div class="controls">
                        <input type="text" name="title[{{ $language }}]" id="title"
                            class="form-control @error("title.$language") is-invalid @enderror"
                            placeholder="{{ trans('main_translation.EnterServiceTitle_' . $language) }}"
                            value="{{ old("title.$language", $title[$language] ?? '') }}">
                    </div>
                    @error("title.$language")
                        <p class="danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        @endforeach

        @foreach (LaravelLocalization::getSupportedLocales() as $language => $value)
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="sup_title">{{ trans('main_translation.ServiceSupTitle_' . $language) }}</label>
                    <div class="controls">
                        <input type="text" name="sup_title[{{ $language }}]" id="sup_title"
                            class="form-control @error("sup_title.$language") is-invalid @enderror"
                            placeholder="{{ trans('main_translation.EnterServiceSupTitle_' . $language) }}"
                            value="{{ old("sup_title.$language", $sup_title[$language] ?? '') }}">
                    </div>
                    @error("sup_title.$language")
                        <p class="danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        @endforeach

        @foreach (LaravelLocalization::getSupportedLocales() as $language => $value)
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="description">{{ trans('main_translation.ServiceDescription_' . $language) }}</label>
                    <fieldset class="form-group">
                        <textarea name="description[{{ $language }}]" id="description"
                            class="form-control @error("description.$language") is-invalid @enderror" rows="3"
                            placeholder="{{ trans('main_translation.EnterServiceDescription_' . $language) }}">{{ old("description.$language", $description[$language] ?? '') }}</textarea>
                    </fieldset>
                    @error("description.$language")
                        <p class="danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        @endforeach

        <div class="col-lg-6 col-md-12">
            <fieldset class="form-group">
                <label for="service_image">{{ trans('main_translation.UploadIcon') }}</label>
                <input name="image" type="text" id="image"
                    placeholder="{{ trans('main_translation.EnterIcon') }}"
                    value="{{ old('image', $service->image) }}"
                    class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <p class="danger mt-1">{{ $message }}</p>
                @enderror

            </fieldset>
        </div>

        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="first-name-column">{{ trans('main_translation.Status') }}</label>
                <fieldset id="status" class="form-group">
                    <select name="status" class="form-control @error('status') is-invalid @enderror" id="basicSelect">
                        <option value="show" @if ($service->status == 'show' or old('status') == 'show') selected @endif>
                            {{ trans('main_translation.Show') }}
                        </option>
                        <option value="hide" @if ($service->status == 'hide' or old('status') == 'hide') selected @endif>
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
