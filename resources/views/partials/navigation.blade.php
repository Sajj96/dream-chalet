@php use App\Models\HouseType;
    $house_types = HouseType::get();
@endphp
<header class="header header-fix">
    <!-- <div class="header-top">
        <div class="template-ad">
            <img src="{{ asset('assets/img/icons/badge-icon.svg')}}" alt="icon">
            <h5>No 1, Construction Website to Buy Your House Plan</h5>
        </div>
    </div> -->
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
            <a href="{{ route('home') }}" class="navbar-brand logo">
                <img src="{{ asset('assets/img/dce_logo.png')}}" width="100" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="{{ route('home') }}" class="menu-logo">
                    <img src="{{ asset('assets/img/dce_logo.png')}}" width="100" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                    <i class="fas fa-times"></i>
                </a>
            </div>
            <ul class="main-nav">
                <li class="active">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="has-submenu">
                    <a href="javascript:void(0);">House Plans <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li class="has-submenu">
                            <a href="javascript:void(0);">House Sizes</a>
                            <ul class="submenu">
                                <li><a href="{{ route('property', 'bedroom=1') }}">1 Bedroom</a></li>
                                <li><a href="{{ route('property', 'bedroom=2') }}">2 Bedrooms</a></li>
                                <li><a href="{{ route('property', 'bedroom=3') }}">3 Bedrooms</a></li>
                                <li><a href="{{ route('property', 'bedroom=4') }}">4 Bedrooms</a></li>
                                <li><a href="{{ route('property', 'bedroom=5') }}">5+ Bedrooms</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="javascript:void(0);">House Types</a>
                            <ul class="submenu">
                                @foreach($house_types as $type)
                                <li><a href="{{ route('property', $type->name.'='.$type->id) }}">{{ $type->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="contact-us.html">Blog</a></li>
                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                <li class="searchbar">
                    <a href="javascript:void(0);">
                        <img src="{{ asset('assets/img/icons/search-icon.svg')}}" alt="img">
                    </a>
                </li>
                @if(auth()->check())
                <li class="login-link"><a href="{{ route('profile') }}">My Profile</a></li>
                <li class="login-link">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-one').submit();">Logout</a>
                    <form id="logout-form-one" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                @else
                <li class="login-link"><a href="{{ route('login') }}">Sign Up</a></li>
                <li class="login-link"><a href="{{ route('register') }}">Sign In</a></li>
                @endif
            </ul>
        </div>
        <ul class="nav header-navbar-rht">
            @if(auth()->check())
            <li class="new-property-btn dropstart">
                <a href="javascript:void(0);" class="active dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bxs-user-circle bx-md"></i> {{ auth()->user()->name }}</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('profile') }}">My Profile</a></li>
                    <li>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
            @else
            <li>
                <a href="{{ route('register') }}" class="btn btn-primary"><i class="feather-user-plus"></i>Sign Up</a>
            </li>
            <li>
                <a href="{{ route('login') }}" class="btn sign-btn"><i class="feather-unlock"></i>Sign In</a>
            </li>
            @endif
        </ul>
    </nav>
</header>
