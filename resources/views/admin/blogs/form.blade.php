<div class="form-body">
    <input type="text" name="admin_id" value="{{ Auth::guard('admin')->user()->id }}" hidden>

    <div class="row">
        @foreach (LaravelLocalization::getSupportedLocales() as $language => $value)
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="title">{{ trans('main_translation.BlogTitle_' . $language) }}</label>
                    <div class="controls">
                        <input type="text" name="title[{{ $language }}]" id="title"
                            class="form-control @error("title.$language") is-invalid @enderror"
                            placeholder="{{ trans('main_translation.EnterBlogTitle_' . $language) }}"
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
                    <label for="brief_about_blog">{{ trans('main_translation.BriefAboutBlog_' . $language) }}</label>
                    <fieldset class="form-group">
                        <textarea name="brief_about_blog[{{ $language }}]" id="brief_about_blog"
                            class="form-control @error("brief_about_blog.$language") is-invalid @enderror" rows="3"
                            placeholder="{{ trans('main_translation.EnterBriefAboutBlog_' . $language) }}">{{ old("brief_about_blog.$language", $brief_about_blog[$language] ?? '') }}</textarea>
                    </fieldset>
                    @error("brief_about_blog.$language")
                        <p class="danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        @endforeach

        @foreach (LaravelLocalization::getSupportedLocales() as $language => $value)
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="description">{{ trans('main_translation.BlogDescription_' . $language) }}</label>
                    <textarea name="description[{{ $language }}]" id="description"
                        class="summernote form-control @error("description.$language") is-invalid @enderror">
                        {{ old("description.$language", $description[$language] ?? '') }}
                    </textarea>
                    @error("description.$language")
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        @endforeach


        <div class="col-lg-6 col-md-12">
            <fieldset class="form-group">
                <label for="cover_image">{{ trans('main_translation.CoverImage') }}</label>
                <div class="custom-file mb-1">
                    <input type="file" name="cover_image" id="cover_image"
                        class="custom-file-input @error('cover_image') is-invalid @enderror"
                        onchange="document.getElementById('show_cover_image').src = window.URL.createObjectURL(this.files[0])">
                    <label class="custom-file-label"
                        for="inputGroupFile01">{{ trans('main_translation.CoverImage') }}</label>
                    @error('cover_image')
                        <p class="danger">{{ $message }}
                        </p>
                    @enderror
                </div>
                <img id="show_cover_image" src="{{ url('storage/' . $blog->cover_image) }}"
                    style="height: 80px; width: 100px;" alt="{{ trans('main_translation.NoCoverImage') }}">
            </fieldset>
        </div>

        <div class="col-lg-6 col-md-12">
            <fieldset class="form-group">
                <label for="blog_image">{{ trans('main_translation.BlogImage') }}</label>
                <div class="custom-file mb-1">
                    <input type="file" name="image" id="blog_image"
                        class="custom-file-input @error('image') is-invalid @enderror"
                        onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                    <label class="custom-file-label"
                        for="inputGroupFile01">{{ trans('main_translation.BlogImage') }}</label>
                    @error('image')
                        <p class="danger">{{ $message }}
                        </p>
                    @enderror
                </div>
                <img id="image" src="{{ url('storage/' . $blog->image) }}" style="height: 80px; width: 100px;"
                    alt="{{ trans('main_translation.NoImage') }}">
            </fieldset>
        </div>


        <div class="row">
            <div class="col-12">
                <button type="submit"
                    class="btn btn-primary mr-1 mb-1  ">{{ trans('main_translation.Save') }}</button>
            </div>
        </div>

    </div>
