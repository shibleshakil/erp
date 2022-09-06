<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto">
                    <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                        <i class="feather icon-menu font-large-1"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="navbar-brand logo-div" href="{{ route ('dashboard') }}">
                        <img class="brand-logo logo" alt="stack admin logo" src="{{ $setting->logo ? asset ('public/assets/images/logo/'. $setting->logo) : 
                                asset ('public/app-assets/images/logo/stack-logo-light-big.png')}}">
                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse"
                        data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link nav-menu-main menu-toggle hidden-xs"
                            href="#"><i class="feather icon-menu"></i>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    @auth
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link"
                            href="#" data-toggle="dropdown">
                            <div class="avatar avatar-online">
                                <img src="{{Auth()->user()->image ? asset ('public/assets/images/uploads/user/'.Auth()->user()->image) : 
                                    asset ('public/app-assets/images/portrait/small/avatar-s-1.png')}}"
                                    alt="avatar"><i></i>
                            </div><span class="user-name">{{Auth()->user()->name}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route ('updateProfile', ['id'=> Auth()->user()->name])}}"><i
                                    class="feather icon-user"></i> Edit Profile</a>
                            <a class="dropdown-item"
                                href="{{ route ('changePassword', ['id'=> Auth()->user()->name]) }}"><i
                                    class="feather icon-lock"></i>Change Password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route ('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="feather icon-power"></i>
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route ('logout') }}" method="POST" class="d-none">@csrf
                            </form>
                        </div>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->