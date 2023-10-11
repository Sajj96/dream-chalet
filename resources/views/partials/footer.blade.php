@php use App\Models\HouseType;
    $house_types = HouseType::get();
@endphp
<footer class="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="footer-widget footer-about">
                        <div class="footer-app-content">
                            <div class="footer-content-heading">
                                <img src="{{ asset('assets/img/dce_small_logo.png') }}" width="100" alt="image">
                                <h4>Dream Chalets Engineering </h4>
                            </div>
                            <div class="social-links">
                                <h5 class="text-white">Connect with us</h5>
                                <ul>
                                    <li><a href="javascript:void(0);"><i class="fa-brands fa-facebook-f hi-icon"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa-brands fa-instagram hi-icon"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa-brands fa-behance hi-icon"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa-brands fa-twitter hi-icon"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa-brands fa-pinterest-p hi-icon"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa-brands fa-linkedin hi-icon"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4">
                    <div class="footer-widget-list">
                        <div class="footer-content-heading">
                            <h4>Explore</h4>
                        </div>
                        <ul>
                            <li><a href="{{ route('property') }}">Properties</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('post') }}">Blogs</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4">
                    <div class="footer-widget-list">
                        <div class="footer-content-heading">
                            <h4>Categories</h4>
                        </div>
                        <ul>
                            @foreach($house_types as $type)
                            <li><a href="{{ route('property', $type->name.'='.$type->id) }}">{{ $type->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4">
                    <div class="footer-widget-list">
                        <div class="footer-content-heading">
                            <h4>Quick Links</h4>
                        </div>
                        <ul>
                            <li><a href="{{ route('about') }}">About Us</a></li>
                            <li><a href="faq.html">Faq</a></li>
                            <li><a href="terms-condition.html">Terms & Conditions</a></li>
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-content">
                <div class="copyright">
                    <p>&copy; Copyright <span id="copyright">
                            <script>
                                document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                            </script>
                        </span>
                        Dream Chalets Engineering Ltd - All rights reserved
                    </p>
                </div>
            </div>
        </div>
    </div>

</footer>