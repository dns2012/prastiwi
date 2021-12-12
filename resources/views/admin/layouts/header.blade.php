@section('header')
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="collapse navbar-collapse show" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-block d-md-none"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                    <li class="nav-item d-block"><a class="nav-link hide" href="https://prastiwi.com:2096" target="blank" title="Login Webmail"><i class="ficon ft-mail"></i></a></li>
                    <li class="nav-item d-block"><a class="nav-link hide" href="https://prastiwi.com:2083" target="blank" title="Login cPanel"><i class="ficon ft-server"></i></a></li>
                </ul>
                <ul class="nav navbar-nav float-right">
                <li class="nav-item d-block"><a class="nav-link hide" href="https://prastiwi.com" target="blank" title="Access Website"><i class="ficon ft-globe"></i></a></li>
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"> <span class="avatar avatar-online"><img src="{{ Auth::user()->avatar }}" alt="avatar"><i></i></span></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="arrow_box_right"><a class="dropdown-item" href="#"><span class="avatar avatar-online"><img src="{{ Auth::user()->avatar }}" alt="avatar"><span class="user-name text-bold-700 ml-1">{{ Auth::user()->name }}</span></span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('administrator.edit', Auth::user()->id) }}"><i class="ft-user"></i> Edit Profile</a>
                                <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ft-power"></i> Logout</a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <!-- <a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a>
                                <a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a>
                                <a class="dropdown-item" href="#"><i class="ft-message-square"></i> Chats</a>
                                <div class="dropdown-divider"></div> -->
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
@endsection
