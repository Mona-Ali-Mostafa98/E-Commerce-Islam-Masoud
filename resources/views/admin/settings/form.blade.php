<div class="tab-content pt-1">
    {{-- Start of tab of general settings --}}
    <div class="tab-pane active" id="general-settings" role="tabpanel" aria-labelledby="general-settings-tab-justified">
        <fieldset>
            <div class="row">
                @foreach (LaravelLocalization::getSupportedLocales() as $language => $value)
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="website_name">{{ trans('main_translation.WebsiteName_' . $language) }}</label>
                            <div class="controls">
                                <input type="text" name="website_name[{{ $language }}]" id="website_name"
                                    class="form-control @error("website_name.$language") is-invalid @enderror"
                                    placeholder="{{ trans('main_translation.EnterWebsiteName_' . $language) }}"
                                    value="{{ old("website_name.$language", $website_name[$language] ?? '') }}">
                            </div>
                            @error("website_name.$language")
                                <p class="danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                @endforeach
            </div>


            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="email">{{ trans('main_translation.Email') }}</label>
                        <input name="email" type="email" id="email"
                            placeholder="{{ trans('main_translation.EnterEmail') }}"
                            value="{{ old('email', $setting->email) }}"
                            class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <p class="danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="mobile_number">{{ trans('main_translation.MobileNumber') }}</label>
                        <input name="mobile_number" type="text" id="mobile_number"
                            placeholder="{{ trans('main_translation.EnterMobileNumber') }}"
                            value="{{ old('mobile_number', $setting->mobile_number) }}"
                            class="form-control @error('mobile_number') is-invalid @enderror">
                        @error('mobile_number')
                            <p class="danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach (LaravelLocalization::getSupportedLocales() as $language => $value)
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label
                                for="currency_code">{{ trans('main_translation.CurrencyCode_' . $language) }}</label>
                            <div class="controls">
                                <input type="text" name="currency_code[{{ $language }}]" id="currency_code"
                                    class="form-control @error("currency_code.$language") is-invalid @enderror"
                                    placeholder="{{ trans('main_translation.EnterCurrencyCode_' . $language) }}"
                                    value="{{ old("currency_code.$language", $currency_code[$language] ?? '') }}">
                            </div>
                            @error("currency_code.$language")
                                <p class="danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                @foreach (LaravelLocalization::getSupportedLocales() as $language => $value)
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label
                                for="copy_footer_text">{{ trans('main_translation.CopyFooterText_' . $language) }}</label>
                            <fieldset class="form-group">
                                <textarea name="copy_footer_text[{{ $language }}]" id="copy_footer_text"
                                    class="form-control @error("copy_footer_text.$language") is-invalid @enderror" rows="2"
                                    placeholder="{{ trans('main_translation.EnterCopyFooterText_' . $language) }}">{{ old("copy_footer_text.$language", $copy_footer_text[$language] ?? '') }}</textarea>
                            </fieldset>
                            @error("copy_footer_text.$language")
                                <p class="danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <fieldset class="form-group">
                        <label for="website_logo">{{ trans('main_translation.WebsiteLogo') }}</label>
                        <div class="custom-file mb-1">
                            <input type="file" name="website_logo" id="website_logo"
                                class="custom-file-input @error('website_logo') is-invalid @enderror"
                                id="inputGroupFile01"
                                onchange="document.getElementById('logo').src = window.URL.createObjectURL(this.files[0])">
                            <label class="custom-file-label"
                                for="inputGroupFile01">{{ trans('main_translation.WebsiteLogo') }}</label>
                            @error('website_logo')
                                <p class="danger mt-1">{{ $message }}
                                </p>
                            @enderror
                        </div>
                        <img id="logo" src="{{ asset('storage/' . $setting->website_logo) }}"
                            style="height: 80px; width: 100px;" alt="no website logo uploaded">
                    </fieldset>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="tax">{{ trans('main_translation.Tax') }}</label>
                        <input name="tax" type="text" id="tax"
                            placeholder="{{ trans('main_translation.EnterTax') }}"
                            value="{{ old('tax', $setting->tax) }}"
                            class="form-control @error('tax') is-invalid @enderror">
                        @error('tax')
                            <p class="danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </fieldset>
        <div class="row">
            <div class="col-12">
                <button type="submit"
                    class="btn btn-primary mr-1 mb-1  ">{{ trans('main_translation.Save') }}</button>
            </div>
        </div>
    </div>
    {{-- End of tab of general settings --}}

    {{-- Start of tab of social links --}}
    <div class="tab-pane" id="social-links" role="tabpanel" aria-labelledby="social-links-tab-justified">
        <fieldset>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="facebook_url">{{ trans('main_translation.FacebookUrl') }}</label>
                        <input name="facebook_url" type="text" id="facebook_url"
                            placeholder="{{ trans('main_translation.EnterTax') }}"
                            value="{{ old('facebook_url', $setting->facebook_url) }}"
                            class="form-control @error('facebook_url') is-invalid @enderror">
                        @error('facebook_url')
                            <p class="danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="twitter_url">{{ trans('main_translation.TwitterUrl') }}</label>
                        <input name="twitter_url" type="text" id="twitter_url"
                            placeholder="{{ trans('main_translation.EnterTax') }}"
                            value="{{ old('twitter_url', $setting->twitter_url) }}"
                            class="form-control @error('twitter_url') is-invalid @enderror">
                        @error('twitter_url')
                            <p class="danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="instagram_url">{{ trans('main_translation.InstagramUrl') }}</label>
                        <input name="instagram_url" type="text" id="instagram_url"
                            placeholder="{{ trans('main_translation.EnterTax') }}"
                            value="{{ old('instagram_url', $setting->instagram_url) }}"
                            class="form-control @error('instagram_url') is-invalid @enderror">
                        @error('instagram_url')
                            <p class="danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="linkedin_url">{{ trans('main_translation.LinkedinUrl') }}</label>
                        <input name="linkedin_url" type="text" id="linkedin_url"
                            placeholder="{{ trans('main_translation.EnterTax') }}"
                            value="{{ old('linkedin_url', $setting->linkedin_url) }}"
                            class="form-control @error('linkedin_url') is-invalid @enderror">
                        @error('linkedin_url')
                            <p class="danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="whatsapp_number">{{ trans('main_translation.WhatsappNumber') }}</label>
                        <input name="whatsapp_number" type="text" id="whatsapp_number"
                            placeholder="{{ trans('main_translation.EnterTax') }}"
                            value="{{ old('whatsapp_number', $setting->whatsapp_number) }}"
                            class="form-control @error('whatsapp_number') is-invalid @enderror">
                        @error('whatsapp_number')
                            <p class="danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </fieldset>
        <div class="row">
            <div class="col-12">
                <button type="submit"
                    class="btn btn-primary mr-1 mb-1  ">{{ trans('main_translation.Save') }}</button>
            </div>
        </div>
    </div>
    {{-- End of tab of social links --}}

    {{-- Start of tab of Services --}}
    <div class="tab-pane" id="services" role="tabpanel" aria-labelledby="services-tab-justified">
        <fieldset>
            <div class="row">
                @foreach (LaravelLocalization::getSupportedLocales() as $language => $value)
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label
                                for="about_services">{{ trans('main_translation.AboutServices_' . $language) }}</label>
                            <textarea name="about_services[{{ $language }}]" id="about_services" class="summernote form-control">
                                {{ old("about_services.$language", $about_services[$language] ?? '') }}
                            </textarea>
                        </div>
                        @error("about_services.$language")
                            <p class="danger mt-1">{{ $message }}
                            </p>
                        @enderror
                    </div>
                @endforeach
            </div>
        </fieldset>
        <div class="row">
            <div class="col-12">
                <button type="submit"
                    class="btn btn-primary mr-1 mb-1  ">{{ trans('main_translation.Save') }}</button>
            </div>
        </div>
    </div>
    {{-- End of tab of Services --}}

    {{-- Start of tab of offers --}}
    <div class="tab-pane" id="offers" role="tabpanel" aria-labelledby="offers-tab-justified">
        <fieldset>
            <div class="row">
                @foreach (LaravelLocalization::getSupportedLocales() as $language => $value)
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="about_offers">{{ trans('main_translation.AboutOffers_' . $language) }}</label>
                            <textarea name="about_offers[{{ $language }}]" id="about_offers" class="summernote form-control">
                                {{ old("about_offers.$language", $about_offers[$language] ?? '') }}
                            </textarea>
                            @error("about_offers.$language")
                                <p class="danger mt-1">{{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                @endforeach
            </div>
        </fieldset>
        <div class="row">
            <div class="col-12">
                <button type="submit"
                    class="btn btn-primary mr-1 mb-1  ">{{ trans('main_translation.Save') }}</button>
            </div>
        </div>
    </div>
    {{-- End of tab of offers --}}

    {{-- Start of tab of policy --}}
    <div class="tab-pane" id="policy" role="tabpanel" aria-labelledby="policy-tab-justified">
        <fieldset>
            <div class="row">
                @foreach (LaravelLocalization::getSupportedLocales() as $language => $value)
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label
                                for="privacy_policy">{{ trans('main_translation.PrivacyPolicy_' . $language) }}</label>
                            <textarea name="privacy_policy[{{ $language }}]" id="privacy_policy" class="summernote form-control ">
                                {{ old("privacy_policy.$language", $privacy_policy[$language] ?? '') }}
                            </textarea>
                            @error("privacy_policy.$language")
                                <p class="danger mt-1">{{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                @endforeach
            </div>
        </fieldset>
        <div class="row">
            <div class="col-12">
                <button type="submit"
                    class="btn btn-primary mr-1 mb-1  ">{{ trans('main_translation.Save') }}</button>
            </div>
        </div>
    </div>
    {{-- End of tab of policy --}}

    {{-- Start of tab of about-us --}}
    <div class="tab-pane" id="about-us" role="tabpanel" aria-labelledby="about-us-tab-justified">
        <fieldset>
            <div class="row">
                @foreach (LaravelLocalization::getSupportedLocales() as $language => $value)
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label
                                for="about_us_description">{{ trans('main_translation.AboutUsDescription_' . $language) }}</label>
                            <textarea name="about_us_description[{{ $language }}]" id="about_us_description"
                                class="summernote form-control">
                                {{ old("about_us_description.$language", $about_us_description[$language] ?? '') }}
                            </textarea>
                            @error("about_us_description.$language")
                                <p class="danger mt-1">{{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                @endforeach

                @foreach (LaravelLocalization::getSupportedLocales() as $language => $value)
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="our_vision">{{ trans('main_translation.OurVision_' . $language) }}</label>
                            <textarea name="our_vision[{{ $language }}]" id="our_vision" class="summernote form-control ">
                                {{ old("our_vision.$language", $our_vision[$language] ?? '') }}
                            </textarea>
                            @error("our_vision.$language")
                                <p class="danger mt-1">{{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                @endforeach

                @foreach (LaravelLocalization::getSupportedLocales() as $language => $value)
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="our_message">{{ trans('main_translation.OurMessage_' . $language) }}</label>
                            <textarea name="our_message[{{ $language }}]" id="our_message" class="summernote form-control ">
                                {{ old("our_message.$language", $our_message[$language] ?? '') }}
                            </textarea>
                            @error("our_message.$language")
                                <p class="danger mt-1">{{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                @endforeach

                @foreach (LaravelLocalization::getSupportedLocales() as $language => $value)
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="our_goals">{{ trans('main_translation.OurGoals_' . $language) }}</label>
                            <textarea name="our_goals[{{ $language }}]" id="our_goals" class="summernote form-control ">
                                {{ old("our_goals.$language", $our_goals[$language] ?? '') }}
                            </textarea>
                            @error("our_goals.$language")
                                <p class="danger mt-1">{{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                @endforeach

                <div class="col-sm-6">
                    <fieldset class="form-group">
                        <label for="about_us_image">{{ trans('main_translation.AboutUsImage') }}</label>
                        <div class="custom-file mb-1">
                            <input type="file" name="about_us_image" id="about_us_image"
                                class="custom-file-input @error('about_us_image') is-invalid @enderror"
                                id="inputGroupFile01"
                                onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                            <label class="custom-file-label"
                                for="inputGroupFile01">{{ trans('main_translation.AboutUsImage') }}</label>
                            @error('about_us_image')
                                <p class="danger mt-1">{{ $message }}
                                </p>
                            @enderror
                        </div>
                        <img id="image" src="{{ asset('storage/' . $setting->about_us_image) }}"
                            style="height: 80px; width: 100px;" alt="no about us image uploaded">
                    </fieldset>
                </div>
            </div>
        </fieldset>
        <div class="row">
            <div class="col-12">
                <button type="submit"
                    class="btn btn-primary mr-1 mb-1  ">{{ trans('main_translation.Save') }}</button>
            </div>
        </div>
    </div>
    {{-- End of tab of general settings --}}

</div>
