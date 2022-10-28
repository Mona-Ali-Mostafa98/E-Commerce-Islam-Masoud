<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-floating footer-static  "
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                    class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                        class="ficon feather icon-menu"></i></a></li>
                        </ul>

                    </div>


                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link"
                                id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span class="selected-language">
                                    @if (App::getLocale() == 'ar')
                                        <i class="flag-icon flag-icon-eg"></i>
                                        Arabic
                                    @elseif(App::getLocale() == 'en')
                                        <i class="flag-icon flag-icon-us"></i>
                                        English
                                    @endif
                                </span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <a class="dropdown-item"
                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                        hreflang="{{ $localeCode }}">
                                        {{ $properties['native'] }}
                                    </a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i
                                    class="ficon feather icon-maximize"></i></a></li>
                        {{-- <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i
                                    class="ficon feather icon-search"></i></a>
                            <div class="search-input">
                                <div class="search-input-icon"><i class="feather icon-search primary"></i></div>
                                <input class="input" type="text" placeholder="Explore Vuexy..." tabindex="-1"
                                    data-search="template-list">
                                <div class="search-input-close"><i class="feather icon-x"></i></div>
                                <ul class="search-list search-list-main"></ul>
                            </div>
                        </li> --}}

                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label"
                                href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i><span
                                    class="badge badge-pill badge-primary badge-up">{{ Auth::guard('admin')->user()->unreadNotifications->count() }}</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header m-0 p-2">
                                        <h3 class="white">
                                            {{ Auth::guard('admin')->user()->unreadNotifications->count() }}
                                            {{ trans('main_translation.Notification') }}
                                        </h3><span class="notification-title">{{ trans('main_translation.New') }}</span>
                                    </div>
                                </li>
                                <li class="scrollable-container media-list">
                                    @forelse (Auth::guard('admin')->user()->unreadNotifications as $notification)
                                        @if ($notification->type == 'App\Notifications\ContactUsNotification')
                                            <a class="d-flex justify-content-between" href="javascript:void(0)">
                                                <div class="media d-flex align-items-start">
                                                    <div class="media-left"><i
                                                            class="feather icon-plus-square font-medium-5 primary"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="primary media-heading">
                                                            {{ $notification->data['title'] }}
                                                            {{ $notification->data['name'] }}
                                                        </h6><small
                                                            class="notification-text">{{ $notification->data['email'] }}</small>
                                                    </div><small>
                                                        <time class="media-meta"
                                                            datetime="2015-06-11T18:29:20+08:00">{{ $notification->created_at->diffForHumans(now()) }}</time></small>
                                                </div>
                                            </a>
                                        @elseif($notification->type == 'App\Notifications\OrderCreatedNotification')
                                            <a class="d-flex justify-content-between" href="javascript:void(0)">
                                                <div class="media d-flex align-items-start">
                                                    <div class="media-left"><i
                                                            class="feather icon-plus-square font-medium-5 primary"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="primary media-heading">
                                                            {{ $notification->data['title'] }}
                                                            {{ \App\Models\User::where('id', $notification->data['user_id'])->first()->full_name }}
                                                        </h6><small
                                                            class="notification-text">{{ trans('main_translation.OrderPrice') }}{{ $notification->data['total_price'] }}
                                                            {{ $settings->currency_code }}</small>
                                                    </div><small>
                                                        <time class="media-meta"
                                                            datetime="2015-06-11T18:29:20+08:00">{{ $notification->created_at->diffForHumans(now()) }}</time></small>
                                                </div>
                                            </a>
                                        @endif
                                    @empty
                                        <div class="media d-flex justify-content-center">
                                            {{ trans('main_translation.NoNotification') }}
                                        </div>
                                    @endforelse
                                </li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center"
                                        href="#">{{ trans('main_translation.ViewAllNotifications') }}</a>
                                </li>
                                {{-- {{ route('admin.notifications') }} --}}
                            </ul>
                        </li>

                        <li class="dropdown dropdown-user nav-item"><a
                                class="dropdown-toggle nav-link dropdown-user-link" href="#"
                                data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none">
                                    <span class="user-name text-bold-600">
                                        {{ Auth::guard('admin')->user()->name }}
                                    </span>
                                </div>
                                <span>
                                    <img class="round" src="{{ Auth::guard('admin')->user()->image_url }}"
                                        alt="avatar" height="40" width="40">
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item"
                                    href="{{ route('admin.admins.edit', Auth::guard('admin')->user()->id) }}"><i
                                        class="feather icon-user"></i> {{ trans('main_translation.EditProfile') }} </a>
                                <div class="dropdown-divider"></div><a class="dropdown-item"
                                    href="{{ route('admin.logout') }}"><i class="feather icon-power"></i>
                                    {{ trans('main_translation.Logout') }}</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->
