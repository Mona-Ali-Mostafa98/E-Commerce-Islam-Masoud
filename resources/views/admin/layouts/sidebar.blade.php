    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="">
                        {{-- <div class="brand-logo"></div> --}}
                        <h2 class="brand-text mb-0">{{ $settings->website_name }}</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                            class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i
                            class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block"
                            data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="{{ Request::is('*admin/dashboard*') ? 'nav-item active' : 'nav-item' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="feather icon-home"></i>
                        <span class="menu-title" data-i18n="Dashboard">{{ trans('main_translation.Dashboard') }}</span>
                        {{-- <span class="badge badge badge-warning badge-pill float-right mr-2">2</span> --}}
                    </a>
                </li>

                <li class="{{ Request::is('*admin/settings*') ? 'nav-item active' : 'nav-item' }}">
                    <a href="{{ route('admin.settings.edit') }}">
                        <i class="feather icon-settings"></i>
                        <span class="menu-title" data-i18n="Dashboard">{{ trans('main_translation.Settings') }}</span>
                    </a>
                </li>


                <li
                    class="{{ Request::is('*admin/orders*') ? 'nav-item has-sub sidebar-group-active open' : 'nav-item has-sub' }}">
                    <a href="#"><i class="feather icon-shopping-cart"></i><span
                            class="menu-title">{{ trans('main_translation.Orders') }}</span></a>
                    <ul class="menu-content" style="">
                        <li class="{{ Request::is('*admin/orders') ? 'active' : '' }}">
                            <a href="{{ route('admin.orders.index') }}"><i class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="List">{{ trans('main_translation.OrdersList') }}</span></a>
                        </li>
                    </ul>
                </li>


                <li
                    class="{{ Request::is('*admin/sliders*') ? 'nav-item has-sub sidebar-group-active open' : 'nav-item has-sub' }}">
                    <a href="#"><i class="fa fa-picture-o"></i><span
                            class="menu-title">{{ trans('main_translation.Sliders') }}</span></a>
                    <ul class="menu-content" style="">
                        <li class="{{ Request::is('*admin/sliders') ? 'active' : '' }}">
                            <a href="{{ route('admin.sliders.index') }}"><i class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="List">{{ trans('main_translation.SlidersList') }}</span></a>
                        </li>
                        {{-- <li class="{{ Request::is('*admin/sliders/create') ? 'active' : '' }}">
                            <a href="{{ route('admin.sliders.create') }}"><i class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="Edit">{{ trans('main_translation.AddSlider') }}</span></a>
                        </li> --}}
                    </ul>
                </li>



                <li
                    class="{{ Request::is('*admin/partners*') ? 'nav-item has-sub sidebar-group-active open' : 'nav-item has-sub' }}">
                    <a href="#"><i class="feather icon-users"></i><span
                            class="menu-title">{{ trans('main_translation.Partners') }}</span></a>
                    <ul class="menu-content" style="">
                        <li class="{{ Request::is('*admin/partners') ? 'active' : '' }}">
                            <a href="{{ route('admin.partners.index') }}"><i class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="List">{{ trans('main_translation.PartnersList') }}</span></a>
                        </li>
                        <li class="{{ Request::is('*admin/partners/create') ? 'active' : '' }}">
                            <a href="{{ route('admin.partners.create') }}"><i class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="Edit">{{ trans('main_translation.AddPartner') }}</span></a>
                        </li>
                    </ul>
                </li>


                <li
                    class="{{ Request::is('*admin/services*') ? 'nav-item has-sub sidebar-group-active open' : 'nav-item has-sub' }}">
                    <a href="#"><i class="feather icon-list"></i><span
                            class="menu-title">{{ trans('main_translation.Services') }}</span></a>
                    <ul class="menu-content" style="">
                        <li class="{{ Request::is('*admin/services') ? 'active' : '' }}">
                            <a href="{{ route('admin.services.index') }}"><i class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="List">{{ trans('main_translation.ServicesList') }}</span></a>
                        </li>
                        <li class="{{ Request::is('*admin/services/create') ? 'active' : '' }}">
                            <a href="{{ route('admin.services.create') }}"><i class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="Edit">{{ trans('main_translation.AddService') }}</span></a>
                        </li>
                    </ul>
                </li>


                <li
                    class="{{ Request::is('*admin/blogs*') ? 'nav-item has-sub sidebar-group-active open' : 'nav-item has-sub' }}">
                    <a href="#"><i class="feather icon-file-text"></i><span
                            class="menu-title">{{ trans('main_translation.Blogs') }}</span></a>
                    <ul class="menu-content" style="">
                        <li class="{{ Request::is('*admin/blogs') ? 'active' : '' }}">
                            <a href="{{ route('admin.blogs.index') }}"><i class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="List">{{ trans('main_translation.BlogsList') }}</span></a>
                        </li>
                        <li class="{{ Request::is('*admin/blogs/create') ? 'active' : '' }}">
                            <a href="{{ route('admin.blogs.create') }}"><i class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="Edit">{{ trans('main_translation.AddBlog') }}</span></a>
                        </li>
                    </ul>
                </li>


                <li
                    class="{{ Request::is('*admin/products*') ? 'nav-item has-sub sidebar-group-active open' : 'nav-item has-sub' }}">
                    <a href="#"><i class="feather icon-grid"></i><span
                            class="menu-title">{{ trans('main_translation.Products') }}</span></a>
                    <ul class="menu-content" style="">
                        <li class="{{ Request::is('*admin/products') ? 'active' : '' }}">
                            <a href="{{ route('admin.products.index') }}"><i class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="List">{{ trans('main_translation.ProductsList') }}</span></a>
                        </li>
                        <li class="{{ Request::is('*admin/products/create') ? 'active' : '' }}">
                            <a href="{{ route('admin.products.create') }}"><i class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="Edit">{{ trans('main_translation.AddProduct') }}</span></a>
                        </li>
                    </ul>
                </li>

                <li
                    class="{{ Request::is('*admin/users*') ? 'nav-item has-sub sidebar-group-active open' : 'nav-item has-sub' }}">
                    <a href="#"><i class="fa fa-users"></i><span
                            class="menu-title">{{ trans('main_translation.Users') }}</span></a>
                    <ul class="menu-content" style="">
                        <li class="{{ Request::is('*admin/users') ? 'active' : '' }}">
                            <a href="{{ route('admin.users.index') }}"><i class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="List">{{ trans('main_translation.UsersList') }}</span></a>
                        </li>
                        <li class="{{ Request::is('*admin/users/create') ? 'active' : '' }}">
                            <a href="{{ route('admin.users.create') }}"><i class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="Edit">{{ trans('main_translation.AddUser') }}</span></a>
                        </li>
                    </ul>
                </li>


                <li
                    class="{{ Request::is('*admin/roles*') ? 'nav-item has-sub sidebar-group-active open' : 'nav-item has-sub' }}">
                    <a href="#"><i class="feather icon-info"></i><span
                            class="menu-title">{{ trans('main_translation.Roles') }}</span></a>
                    <ul class="menu-content" style="">
                        <li class="{{ Request::is('*admin/roles') ? 'active' : '' }}">
                            <a href="{{ route('admin.roles.index') }}"><i class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="List">{{ trans('main_translation.RolesList') }}</span></a>
                        </li>
                        <li class="{{ Request::is('*admin/roles/create') ? 'active' : '' }}">
                            <a href="{{ route('admin.roles.create') }}"><i class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="Edit">{{ trans('main_translation.AddRole') }}</span></a>
                        </li>
                    </ul>
                </li>


                <li
                    class="{{ Request::is('*admin/admins*') ? 'nav-item has-sub sidebar-group-active open' : 'nav-item has-sub' }}">
                    <a href="#"><i class="feather icon-user-check"></i><span
                            class="menu-title">{{ trans('main_translation.Admins') }}</span></a>
                    <ul class="menu-content" style="">
                        <li class="{{ Request::is('*admin/admins') ? 'active' : '' }}">
                            <a href="{{ route('admin.admins.index') }}"><i class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="List">{{ trans('main_translation.AdminsList') }}</span></a>
                        </li>
                        <li class="{{ Request::is('*admin/admins/create') ? 'active' : '' }}">
                            <a href="{{ route('admin.admins.create') }}"><i class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="Edit">{{ trans('main_translation.AddAdmin') }}</span></a>
                        </li>
                    </ul>
                </li>


                <li
                    class="{{ Request::is('*admin/galleries*') ? 'nav-item has-sub sidebar-group-active open' : 'nav-item has-sub' }}">
                    <a href="#"><i class="fa fa-file-image-o"></i><span
                            class="menu-title">{{ trans('main_translation.Images') }}</span></a>
                    <ul class="menu-content" style="">
                        <li class="{{ Request::is('*admin/galleries') ? 'active' : '' }}">
                            <a href="{{ route('admin.galleries.index') }}"><i class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="List">{{ trans('main_translation.ImagesList') }}</span></a>
                        </li>
                        <li class="{{ Request::is('*admin/galleries/create') ? 'active' : '' }}">
                            <a href="{{ route('admin.galleries.create') }}"><i class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="Edit">{{ trans('main_translation.AddImage') }}</span></a>
                        </li>
                    </ul>
                </li>


                <li
                    class="{{ Request::is('*admin/subscribes*') ? 'nav-item has-sub sidebar-group-active open' : 'nav-item has-sub' }}">
                    <a href="#"><i class="fa fa-envelope-o"></i><span
                            class="menu-title">{{ trans('main_translation.Subscribes') }}</span></a>
                    <ul class="menu-content" style="">
                        <li class="{{ Request::is('*admin/subscribes') ? 'active' : '' }}">
                            <a href="{{ route('admin.subscribes.index') }}"><i class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="List">{{ trans('main_translation.SubscribesList') }}</span></a>
                        </li>
                    </ul>
                </li>


                <li
                    class="{{ Request::is('*admin/contacts*') ? 'nav-item has-sub sidebar-group-active open' : 'nav-item has-sub' }}">
                    <a href="#"><i class="feather icon-message-square"></i><span
                            class="menu-title">{{ trans('main_translation.ContactUs') }}</span></a>
                    <ul class="menu-content" style="">
                        <li class="{{ Request::is('*admin/contacts') ? 'active' : '' }}">
                            <a href="{{ route('admin.contacts.index') }}"><i class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="List">{{ trans('main_translation.ContactUsList') }}</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->
