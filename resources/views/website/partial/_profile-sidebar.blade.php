<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <!-- الملف الشخصي -->
    <button class="{{ Request::is('*website/profile*') ? 'nav-link active' : 'nav-link' }}" id="v-pills-info-tab"
        data-bs-toggle="pill" data-bs-target="#v-pills-info" type="button" role="tab" aria-controls="v-pills-info"
        aria-selected="true">{{ trans('main_translation.Profile') }}
        <i class="bi bi-person"></i>
    </button>

    <!-- طلباتي -->
    <button class="nav-link" id="v-pills-fav-tab" data-bs-toggle="pill" data-bs-target="#v-pills-fav" type="button"
        role="tab" aria-controls="v-pills-fav" aria-selected="false">{{ trans('main_translation.MyOrders') }}
        <i class="bi bi-heart"></i>
    </button>

    <!-- العنوان -->
    <button class="{{ Request::is('*website/user_address_form/*') ? 'nav-link active' : 'nav-link' }}"
        id="v-pills-addr-tab" data-bs-toggle="pill" data-bs-target="#v-pills-addr" type="button" role="tab"
        aria-controls="v-pills-addr" aria-selected="false">{{ trans('main_translation.Address') }}
        <i class="bi bi-geo-alt"></i>
    </button>

    <!-- تتبع الشحنة -->
    <button class="nav-link" id="v-pills-trace-tab" data-bs-toggle="pill" data-bs-target="#v-pills-trace" type="button"
        role="tab" aria-controls="v-pills-trace" aria-selected="false">{{ trans('main_translation.TrackOrder') }}
        <i class="bi bi-truck"></i>
    </button>
</div>
