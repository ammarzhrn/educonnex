<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">EDUCONNEX</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">EDU</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
            </li>

            @if (auth()->user()->role == 'superAdmin')
            <li class="{{ Request::is('user') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('user.index') }}"><i class="far fa-user"></i> <span>Users Management</span></a>
            </li>
            @endif


            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-columns"></i><span>All Programs</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('sector.index') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ route('sector.index') }}">Sectors Management</a>
                    </li>
                    <li class="{{ Request::is('programs.index') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ route('programs.index') }}">Programs Management</a>
                    </li>
                </ul>
            </li>

            <li class="{{ Request::is('article.index') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('article.index') }}"><i class="far fa-file-alt"></i> <span>Articles Management</span></a>
            </li>

            <li class="{{ Request::is('news.index') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('news.index') }}"><i class="fas fa-plug"></i> <span>News Management</span></a>
            </li>
        </ul>
    </aside>
</div>
