<header class="header header-fix">
    <div class="header-top">
        <div class="template-ad">
            <img src="assets/img/icons/badge-icon.svg" alt="icon">
            <h5>No 1, Realestate Website to Buy / Sell Your Place <span>First Listing Free!!!</span></h5>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
            <a href="index.html" class="navbar-brand logo">
                <img src="assets/img/dce_logo.png" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="index.html" class="menu-logo">
                    <img src="assets/img/dce_logo.png" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                    <i class="fas fa-times"></i>
                </a>
            </div>
            <ul class="main-nav">
                <li class="active">
                    <a href="index.html">Home</a>
                </li>
                <li class="has-submenu">
                    <a href="javascript:void(0);">House Plans <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li class="has-submenu">
                            <a href="javascript:void(0);">House Sizes</a>
                            <ul class="submenu">
                                <li><a href="buy-property-grid.html">1 Bedroom</a></li>
                                <li><a href="buy-property-list.html">2 Bedrooms</a></li>
                                <li><a href="buy-property-grid-sidebar.html">3 Bedrooms</a></li>
                                <li><a href="buy-property-list-sidebar.html">4 Bedrooms</a></li>
                                <li><a href="buy-grid-map.html">5+ Bedrooms</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="javascript:void(0);">House Types</a>
                            <ul class="submenu">
                                <li><a href="rent-property-grid.html">Apartments</a></li>
                                <li><a href="rent-property-list.html">Workspaces</a></li>
                                <li><a href="rent-property-grid-sidebar.html">Commercial Building</a></li>
                                <li><a href="rent-property-list-sidebar.html">Hotels and Lodges</a></li>
                                <li><a href="rent-grid-map.html">Modern House Plans</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="contact-us.html">About Us</a></li>
                <li><a href="contact-us.html">Blog</a></li>
                <li><a href="contact-us.html">Contact Us</a></li>
                <li class="searchbar">
                    <a href="javascript:void(0);">
                        <img src="assets/img/icons/search-icon.svg" alt="img">
                    </a>
                </li>
                <li class="login-link"><a href="{{ route('login') }}">Sign Up</a></li>
                <li class="login-link"><a href="{{ route('register') }}">Sign In</a></li>
            </ul>
        </div>
        <ul class="nav header-navbar-rht">
            <li>
                <a href="{{ route('register') }}" class="btn btn-primary"><i class="feather-user-plus"></i>Sign Up</a>
            </li>
            <li>
                <a href="{{ route('login') }}" class="btn sign-btn"><i class="feather-unlock"></i>Sign In</a>
            </li>
        </ul>
    </nav>
</header>