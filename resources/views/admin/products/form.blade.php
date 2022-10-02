<div class="form-body">
    <div class="row">
        @foreach (LaravelLocalization::getSupportedLocales() as $language => $value)
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="product_name">{{ trans('main_translation.ProductName_' . $language) }}</label>
                    <div class="controls">
                        <input type="text" name="product_name[{{ $language }}]" id="product_name"
                            class="form-control @error("product_name.$language") is-invalid @enderror"
                            placeholder="{{ trans('main_translation.EnterProductName_' . $language) }}"
                            value="{{ old("product_name.$language", $product_name[$language] ?? '') }}">
                    </div>
                    @error("product_name.$language")
                        <p class="danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        @endforeach

        @foreach (LaravelLocalization::getSupportedLocales() as $language => $value)
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="product_model">{{ trans('main_translation.ProductModel_' . $language) }}</label>
                    <div class="controls">
                        <input type="text" name="product_model[{{ $language }}]" id="product_model"
                            class="form-control @error("product_model.$language") is-invalid @enderror"
                            placeholder="{{ trans('main_translation.EnterProductModel_' . $language) }}"
                            value="{{ old("product_model.$language", $product_model[$language] ?? '') }}">
                    </div>
                    @error("product_model.$language")
                        <p class="danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        @endforeach


        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="product_price">{{ trans('main_translation.ProductPrice') }}</label>
                <div class="controls">
                    <input name="product_price" type="integer" id="product_price"
                        placeholder="{{ trans('main_translation.ProductPrice') }}"
                        value="{{ old('product_price', $product->product_price) }}"
                        class="form-control @error('product_price') is-invalid @enderror">
                    @error('product_price')
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
                        <option value="active" @if ($product->status == 'active' or old('status') == 'active') selected @endif>
                            {{ trans('main_translation.ActiveProduct') }}
                        </option>
                        <option value="draft" @if ($product->status == 'draft' or old('status') == 'draft') selected @endif>
                            {{ trans('main_translation.Draft') }}
                        </option>
                        <option value="archived" @if ($product->status == 'archived' or old('status') == 'archived') selected @endif>
                            {{ trans('main_translation.Archived') }}
                        </option>
                    </select>
                </fieldset>
            </div>
            @error('status')
                <p class="danger">{{ $message }}
                </p>
            @enderror
        </div>


        @foreach (LaravelLocalization::getSupportedLocales() as $language => $value)
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="product_details">{{ trans('main_translation.ProductDetails_' . $language) }}</label>
                    <fieldset class="form-group">
                        <textarea name="product_details[{{ $language }}]" id="product_details"
                            class="form-control @error("product_details.$language") is-invalid @enderror" rows="3"
                            placeholder="{{ trans('main_translation.EnterProductDetails_' . $language) }}">{{ old("product_details.$language", $product_details[$language] ?? '') }}</textarea>
                    </fieldset>
                    @error("product_details.$language")
                        <p class="danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        @endforeach


        <div class="col-lg-6 col-md-12">
            <fieldset class="form-group">
                <label for="fileupload">{{ trans('main_translation.ProductImage') }}</label>
                <div class="custom-file mb-1">
                    <input type="file" name="product_image[]" id="fileupload" accept="image/*"
                        class="custom-file-input @error('product_image.*') is-invalid @enderror" multiple>
                    <label class="custom-file-label"
                        for="inputGroupFile01">{{ trans('main_translation.ProductImage') }}</label>
                    @error('product_image.*')
                        <p class="danger">{{ $message }}
                        </p>
                    @enderror
                </div>
                @foreach ($product->images as $value)
                    <img src="{{ $value->product_image_url }}" style="height: 80px; width: 100px;">
                @endforeach
                {{-- this div for show image uploaded --}}
                <div id="product_images">
                </div>
            </fieldset>
        </div>

        <div class="col-md-6 col-12">
            <fieldset>
                <label for="best_selling"></label>
                <div class="vs-checkbox-con vs-checkbox-primary">
                    <input type="checkbox" name="best_selling" value="1"
                        @if (old('best_selling', $product->best_selling) == 1) checked @endif>
                    <span class="vs-checkbox">
                        <span class="vs-checkbox--check">
                            <i class="vs-icon feather icon-check"></i>
                        </span>
                    </span>
                    <span class="">{{ trans('main_translation.BestSelling') }}</span>
                </div>
            </fieldset>
            @error('best_selling')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <fieldset>
        <div class="row">
            @foreach (LaravelLocalization::getSupportedLocales() as $language => $value)
                <div class="col-sm-12">
                    <div class="form-group">
                        <label
                            for="product_description">{{ trans('main_translation.ProductDescription_' . $language) }}</label>
                        <textarea name="product_description[{{ $language }}]" id="product_description" class="summernote form-control">
                                {{ old("product_description.$language", $product_description[$language] ?? '') }}
                            </textarea>
                    </div>
                    @error("product_description.$language")
                        <p class="danger mt-1">{{ $message }}
                        </p>
                    @enderror
                </div>
            @endforeach
        </div>
    </fieldset>

    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary mr-1 mb-1  ">{{ trans('main_translation.Save') }}</button>
        </div>
    </div>

</div>
