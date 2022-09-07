<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li @if ($chkurl == 'dashboard') class="active" @else  class="nav-item"@endif>
                <a href="{{ route ('dashboard') }}"><i class="feather icon-home"></i><span class="menu-title"
                    data-i18n="Dashboard">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#"><i class="feather icon-user"></i><span class="menu-title"
                data-i18n="Profile">Profile</span></a>
                <ul class="menu-content">
                    <li @if ($chkurl == 'updateProfile') class="active" @endif>
                        <!-- <a class="menu-item" href="#" data-i18n="Edit Profile">Edit Profile</a> -->
                        <a class="menu-item" href="{{ route ('updateProfile', ['id'=>Auth()->user()->name])}}" data-i18n="Edit Profile">Edit Profile</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#"><i class="feather icon-settings"></i><span class="menu-title"
                data-i18n="Setup">Setup</span></a>
                <ul class="menu-content">
                    <li @if ($chkurl == 'appSetting') class="active" @endif>
                        <a class="menu-item" href="{{ route ('appSetting')}}" data-i18n="App Settings">App Settings</a>
                    </li>
                    <li @if ($chkurl == 'emailSetup') class="active" @endif>
                        <a class="menu-item" href="{{ route ('emailSetup')}}" data-i18n="Email Setup">Email Setup</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->