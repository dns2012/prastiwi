@section('sidebar')
<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="{{ asset('cameleon') }}/images/backgrounds/02.jpg">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                    <!-- <img class="brand-logo" alt="admin logo" src="{{ asset('cameleon') }}/images/ico/icon.png" /> -->
                    <h3 class="brand-text">E-Prastiwi</h3>
                </a>
            </li>
            <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
    </div>
    <div class="main-menu-content">
        @php $role = auth()->user()->role @endphp
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ strpos(Route::currentRouteName(), 'dashboard') === false ? '' : 'active' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span>
                </a>
            </li>
            @if ($role == 1)
            <li class="nav-item {{ strpos(Route::currentRouteName(), 'administrator') === false ? '' : 'active' }}">
                <a href="{{ route('administrator.index') }}">
                    <i class="ft-users"></i><span class="menu-title" data-i18n="">Admin</span>
                </a>
            </li>
            @endif

            <li class="nav-item has-sub {{ strpos(Route::currentRouteName(), 'apps') === false ? '' : 'open' }}">
                <a href="javascript:void(0)">
                    <i class="ft-smartphone"></i><span class="menu-title" data-i18n="">Aplikasi</span>
                </a>
                <ul class="menu-content">
                    @if ($role == 1 || $role == 2)
                    <li class="is-shown">
                        <a class="menu-item {{ strpos(Route::currentRouteName(), 'apps.client') === false ? '' : 'menu-item--active' }}" href="{{ route('apps.client.index') }}">Anggota</a>
                    </li>
                    @endif

                    @if ($role == 1 || $role == 3)
                    <li class="is-shown">
                        <a class="menu-item {{ strpos(Route::currentRouteName(), 'apps.product') === false ? '' : 'menu-item--active' }}" href="{{ route('apps.product.index') }}">Toko</a>
                    </li>
                    @endif
                </ul>
            </li>
            <!-- <li class="nav-item has-sub {{ strpos(Route::currentRouteName(), 'admin') === false ? '' : 'open' }}">
                <a href="#">
                    <i class="ft-image"></i><span class="menu-title" data-i18n="">Sample Dropdown</span>
                </a>
                <ul class="menu-content">
                    <li class="@if (session('gallery') == 'B') active @endif">
                        <a class="menu-item" href="javascript:void(0)">B</a>
                    </li>
                    <li class="@if (session('gallery') == 'C') active @endif">
                        <a class="menu-item" href="javascript:void(0)">C</a>
                    </li>
                </ul>
            </li> -->
        </ul>
    </div>
    <div class="navigation-background"></div>
</div>
@endsection
