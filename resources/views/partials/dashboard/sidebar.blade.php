<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}"> <img alt="image" src="{{ asset('assets/img/dce_small_logo.png')}}" class="header-logo" /> <span class="logo-name">DCE</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown @if(\Request::is('dashboard') ) active @endif">
                <a href="{{ route('dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown @if(\Request::is('dashboard/house-types') || \Request::is('dashboard/house-types/*') ) active @endif">
                <a href="{{ url('/dashboard/house-types') }}" class="nav-link"><i data-feather="list"></i><span>House Types</span></a>
            </li>
            <li class="dropdown @if(\Request::is('dashboard/amenities') || \Request::is('dashboard/amenities/*') ) active @endif">
                <a href="{{ url('/dashboard/amenities') }}" class="nav-link"><i data-feather="grid"></i><span>Amenities</span></a>
            </li>
            <li class="dropdown @if(\Request::is('dashboard/development-stages') || \Request::is('dashboard/development-stages/*') ) active @endif">
                <a href="{{ url('/dashboard/development-stages') }}" class="nav-link"><i data-feather="layers"></i><span>Development Stages</span></a>
            </li>
            <li class="dropdown @if(\Request::is('dashboard/properties/all') || \Request::is('dashboard/properties/*') ) active @endif">
                <a href="{{ url('/dashboard/properties/all') }}" class="nav-link"><i data-feather="home"></i><span>Properties</span></a>
            </li>
            <li class="dropdown @if(\Request::is('dashboard/orders/') || \Request::is('dashboard/orders/*') ) active @endif">
                <a href="{{ url('/dashboard/orders') }}" class="nav-link"><i data-feather="shopping-bag"></i><span>Orders</span></a>
            </li>
            <li class="dropdown @if(\Request::is('dashboard/transactions/all') || \Request::is('dashboard/transactions/*') ) active @endif">
                <a href="{{ url('/dashboard/transactions') }}" class="nav-link"><i data-feather="credit-card"></i><span>Transactions</span></a>
            </li>
            <li class="dropdown @if(\Request::is('dashboard/posts/all') || \Request::is('dashboard/posts/*') ) active @endif">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="cast"></i><span>Posts</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ url('/dashboard/posts/categories') }}">Categories</a></li>
                    <li><a class="nav-link" href="{{ url('/dashboard/posts') }}">All Posts</a></li>
                </ul>
            </li>
            <li class="dropdown @if(\Request::is('dashboard/users/all') || \Request::is('dashboard/users/*') ) active @endif">
                <a href="{{ url('/dashboard/users') }}" class="nav-link"><i data-feather="users"></i><span>Users</span></a>
            </li>
        </ul>
    </aside>
</div>