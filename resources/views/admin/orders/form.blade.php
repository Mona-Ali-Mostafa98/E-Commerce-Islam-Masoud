<div class="form-body">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="first-name-column">{{ trans('main_translation.OrderStatus') }}</label>
                <fieldset id="status" class="form-group">
                    <select name="status" class="form-control @error('status') is-invalid @enderror" id="basicSelect">
                        <option value="pending" @if ($order->status == 'pending' or old('status') == 'pending') selected @endif>
                            {{ trans('main_translation.Pending') }}
                        </option>
                        <option value="charged" @if ($order->status == 'charged' or old('status') == 'charged') selected @endif>
                            {{ trans('main_translation.Charged') }}
                        </option>
                        <option value="delivering" @if ($order->status == 'delivering' or old('status') == 'delivering') selected @endif>
                            {{ trans('main_translation.Delivering') }}
                        </option>s
                    </select>
                </fieldset>
            </div>
            @error('status')
                <p class="danger">{{ $message }}
                </p>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary mr-1 mb-1  ">{{ trans('main_translation.Save') }}</button>
        </div>
    </div>

</div>
