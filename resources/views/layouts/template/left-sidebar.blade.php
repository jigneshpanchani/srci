<aside id="sidebar_main">
    <div class="sidebar_main_header" style="font-size: 17px!important; padding-top: 24px;">
        <div class="sidebar_logo">
            <a href="{{ route('home') }}" class="sSidebar_hide sidebar_logo_large">
                <h3 style="color: #665097">
                    <img class="logo_regular" src="{{ asset('assets/img/favicon.png') }}" alt="" height="45" width="45"/>
                    SRCI
                </h3>
            </a>
            <a href="{{ route('home') }}" class="sSidebar_show sidebar_logo_small">
                <img class="logo_regular" src="{{ asset('assets/img/favicon1.png') }}" alt="LOGO" height="45" width="45"/>
                <img class="logo_light" src="{{ asset('assets/img/favicon1.png') }}" alt="LOGO" height="45" width="45"/>
            </a>
        </div>
    </div>

    <div class="menu_section">
        <ul>
            <?php $currentRoute = Request::route()->getName(); ?>

            <li title="Dashboard" class="{{ ($currentRoute == 'home') ? 'current_section' : '' }}">
                <a href="{{ route('home') }}">
                    {{--<span class="menu_icon"><i class="material-icons">&#xE871;</i></span>--}}
                    <span class="menu_icon"><i class="material-icons">&#xE88A;</i></span>
                    <span class="menu_title">Home</span>
                </a>
            </li>
            <li title="Logout">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="menu_icon"><i class="material-icons">&#xE7F4;</i></span>
                    <span class="menu_title">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
