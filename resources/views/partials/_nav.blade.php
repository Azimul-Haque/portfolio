<!-- navigation panel -->
<nav class="navbar navbar-default navbar-fixed-top nav-transparent overlay-nav sticky-nav nav-border-bottom @if(\Request::is('/')) nav-white @endif" role="navigation">
    <div class="container">
        <div class="row">
            <!-- logo -->
            <div class="col-md-2 pull-left">
                <a class="logo-light" href="{{ route('index.index') }}">
                    @if(\Request::is('/'))
                        <img alt="" src="{{ asset('images/logo-light.png') }}" class="logo" />
                    @else
                        <img alt="" src="{{ asset('images/logo.png') }}" class="logo" />
                    @endif
                </a>
                <a class="logo-dark" href="{{ route('index.index') }}">
                    <img alt="" src="{{ asset('images/logo.png') }}" class="logo" />
                </a>
            </div>
            <!-- end logo -->
            <!-- search and cart  -->
            <div class="col-md-1 no-padding-left search-cart-header pull-right">
                <div id="top-search">
                    <!-- nav search -->
                    <a href="#search-header" class="header-search-form">
                        <i class="fa fa-search search-button"></i>
                    </a>
                    <!-- end nav search -->
                </div>
                <!-- search input-->
                <form id="search-header" method="post" action="#!" name="search-header" class="mfp-hide search-form-result">
                    <div class="search-form position-relative">
                        <button type="submit" class="fa fa-search close-search search-button"></button>
                        <input type="text" name="search" class="search-input" placeholder="Enter your keywords..." autocomplete="off">
                    </div>
                </form>

            </div>
            <!-- end search and cart  -->
            <!-- toggle navigation -->
            <div class="navbar-header col-sm-8 col-xs-2 pull-right">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- toggle navigation end -->
            <!-- main menu -->
            <div class="col-md-9 no-padding-right accordion-menu text-right">
                <div class="navbar-collapse collapse">
                    <ul id="accordion" class="nav navbar-nav navbar-right panel-group">
                        <li>
                            <a href="{{ route('index.index') }}" class="inner-link">Home</a>
                        </li>
                        <!-- menu item -->
                        <li class="dropdown panel simple-dropdown">
                            <a href="#about_dropdown" class="dropdown-toggle collapsed" data-toggle="collapse" data-parent="#accordion" data-hover="dropdown">About ▽
                                {{-- <i class="fa fa-angle-down"></i> --}}
                            </a>
                            <!-- sub menu single -->
                            <!-- sub menu item  -->
                            <ul id="about_dropdown" class="dropdown-menu panel-collapse collapse" role="menu">
                                <li>
                                    <a href="{{ route('index.journey') }}"><i class="icon-presentation i-plain"></i> Journey of DUIITAA</a>
                                </li>
                                <li>
                                    <a href="{{ route('index.constitution') }}"><i class=" icon-book-open i-plain"></i> Constitution</a>
                                </li>
                                <li>
                                    <a href="{{ route('index.faq') }}"><i class="icon-search i-plain"></i> FAQ</a>
                                </li>
                            </ul>
                            <!-- end sub menu item  -->
                            <!-- end sub menu single -->
                        </li>
                        <li class="dropdown panel simple-dropdown">
                            <a href="#committee_dropdown" class="dropdown-toggle collapsed" data-toggle="collapse" data-parent="#accordion" data-hover="dropdown">Committee ▽
                                {{-- <i class="fa fa-angle-down"></i> --}}
                            </a>
                            <!-- sub menu single -->
                            <!-- sub menu item  -->
                            <ul id="committee_dropdown" class="dropdown-menu panel-collapse collapse" role="menu">
                                <li>
                                    <a href="{{ route('index.adhoc') }}"><i class="icon-strategy i-plain"></i> Ad Hoc Committee</a>
                                </li>
                                <li>
                                    <a href="{{ route('index.executive') }}"><i class="icon-strategy i-plain"></i> Executive Committee</a>
                                </li>
                            </ul>
                            <!-- end sub menu item  -->
                            <!-- end sub menu single -->
                        </li>
                        <li class="dropdown panel simple-dropdown">
                            <a href="#others_dropdown" class="dropdown-toggle collapsed" data-toggle="collapse" data-parent="#accordion" data-hover="dropdown">Others ▽
                                {{-- <i class="fa fa-angle-down"></i> --}}
                            </a>
                            <!-- sub menu single -->
                            <!-- sub menu item  -->
                            <ul id="others_dropdown" class="dropdown-menu panel-collapse collapse" role="menu">
                                <li>
                                    <a href="{{ route('index.news') }}"><i class="icon-newspaper i-plain"></i> News</a>
                                </li>
                                <li>
                                    <a href="{{ route('index.events') }}"><i class="icon-megaphone i-plain"></i> Events</a>
                                </li>
                                <li>
                                    <a href="{{ route('index.gallery') }}"><i class="icon-pictures i-plain"></i> Photo Gallery</a>
                                </li>
                            </ul>
                            <!-- end sub menu item  -->
                            <!-- end sub menu single -->
                        </li>

                        <li>
                            <a href="{{ route('index.members') }}">Members</a>
                        </li>
                        <li>
                            <a href="{{ route('blogs.index') }}">Blog</a>
                        </li>
                        <li>
                            <a href="{{ route('index.contact') }}">Contact</a>
                        </li>
                        <li>
                            <a href="{{ route('index.application') }}">Membership</a>
                        </li>
                        @if(Auth::check())
                        <li class="dropdown panel simple-dropdown">
                            <a href="#nav_auth_user" class="dropdown-toggle collapsed" data-toggle="collapse" data-parent="#accordion" data-hover="dropdown">
                                @php
                                    $nav_user_name = explode(' ', Auth::user()->name);
                                    $last_name = array_pop($nav_user_name);
                                @endphp
                                {{ $last_name }}
                            </a>
                            <!-- sub menu single -->
                            <!-- sub menu item  -->
                            <ul id="nav_auth_user" class="dropdown-menu panel-collapse collapse" role="menu">
                                <li>
                                    <a href="{{ route('index.profile', Auth::user()->unique_key) }}"><i class="icon-profile-male i-plain"></i> Profile</a>
                                </li>
                                <li>
                                    <a href="{{ url(config('adminlte.logout_url', 'auth/logout')) }}"><i class="icon-key i-plain"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li>
                            <a href="{{ route('index.login') }}" class="">Login</a>
                        </li>
                        @endif
                        <!-- end menu item -->
                    </ul>
                </div>
            </div>
            <!-- end main menu -->
        </div>
    </div>
</nav>
<!--end navigation panel -->