<!-- navigation panel -->
<nav class="navbar navbar-default navbar-fixed-top nav-transparent overlay-nav sticky-nav nav-border-bottom @if(\Request::is('/') || \Request::is('blogs')) nav-white @endif" role="navigation">
    <div class="container">
        <div class="row">
            <!-- logo -->
            <div class="col-md-2 pull-left">
                <a class="logo-light" href="{{ route('index.index') }}">
                    @if(\Request::is('/') || \Request::is('blogs'))
                        <img alt="" src="{{ asset('images/logo-light.png') }}" class="logo" @handheld style="max-height: 30px;" @endhandheld />
                    @else
                        <img alt="" src="{{ asset('images/logo.png') }}" class="logo"@handheld style="max-height: 30px;" @endhandheld />
                    @endif


                </a>
                <a class="logo-dark" href="{{ route('index.index') }}">
                    <img alt="" src="{{ asset('images/logo.png') }}" class="logo" @handheld style="max-height: 30px;" @endhandheld />
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
                {!! Form::open(['route' => 'index.search', 'method' => 'get', 'class' => 'mfp-hide search-form-result', 'id' => 'search-header']) !!}
                    <div class="search-form position-relative">
                        <button type="submit" class="fa fa-search close-search search-button"></button>
                        <input type="text" name="search" class="search-input" placeholder="Write something to search (Press Esc to Exit)" autocomplete="off">
                    </div>
                {!! Form::close() !!}

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

                        {{-- <li class="dropdown panel simple-dropdown">
                            <a href="#about_dropdown" class="dropdown-toggle collapsed" data-toggle="collapse" data-parent="#accordion" data-hover="dropdown">About ▽</a>
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
                        </li> --}}

                        <li>
                            <a href="{{ route('index.bio') }}">Biography</a>
                        </li>
                        <li>
                            <a href="{{ route('blogs.index') }}">Blog</a>
                        </li>
                        <li>
                            <a href="{{ route('index.books') }}">Books</a>
                        </li>
                        <li>
                            <a href="{{ route('index.gallery') }}">Gallery</a>
                        </li>
                        <li>
                            <a href="{{ route('index.multimedia') }}">Multimedia</a>
                        </li>
                        <li>
                            <a href="{{ route('index.faq') }}">FAQ</a>
                        </li>
                        <li>
                            <a href="{{ route('index.contact') }}">Contact</a>
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
                                    <a href="{{ route('dashboard.index') }}"><i class="icon-profile-male i-plain"></i> Dashboard</a>
                                </li>
                                <li>
                                    <a href="{{ url(config('adminlte.logout_url', 'auth/logout')) }}"><i class="icon-key i-plain"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                        @else
                        {{-- <li>
                            <a href="{{ route('index.login') }}" class="">Login</a>
                        </li> --}}
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