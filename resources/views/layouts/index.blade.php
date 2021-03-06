<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>Atique Riyad |@yield('title')| atiqeuriyad.com</title>
    <meta name="description" content="@yield('description', 'Official website of Captain A H M Atiqul Haque aka Atiqye Riyad. Developed by A. H. M. Azimul Haque.')">
    <meta name="keywords" content="Atique Riyad, Atique, Riyad, A H M Atiqul Haque, Captain Atique">
    <meta charset="utf-8">
    <meta name="author" content="A. H. M. Azimul Haque">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('images/favicons/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/favicons/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/favicons/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/favicons/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/favicons/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/favicons/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/favicons/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/favicons/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicons/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('images/favicons/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/favicons/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/favicons//manifest.json') }}">
    <meta name="msapplication-TileColor" content="#252525">
    <meta name="msapplication-navbutton-color" content="#252525">
    <meta name="apple-mobile-web-app-status-bar-style" content="#252525">
    <meta name="msapplication-TileImage" content="{{ asset('images/favicons/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#252525">
    <meta name="mobile-web-app-capable" content="yes">

    <meta name="google-site-verification" content="HVsFk-Q0HIWS110QDQG52pyE9LpOMl6piOuOCcGBmSo" />

    @if(!Request::is('blog/*') && !Request::is('multimedia/*'))
    <meta property="og:title" content="Atique Riyad |@yield('title')| atiqeuriyad.com">
    <meta property="og:description" content="@yield('description', 'Official website of Captain A H M Atiqul Haque aka Atiqye Riyad. Developed by A. H. M. Azimul Haque.')">
    <meta property="og:image" content="{{ asset('images/fb_back.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    @endif

    <!-- animation -->
    
    <!-- animation -->
    <link rel="stylesheet" href="{{ asset('vendor/hcode/css/animate.css') }}" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('vendor/hcode/css/bootstrap.css') }}" />
    <!-- et line icon -->
    <link rel="stylesheet" href="{{ asset('vendor/hcode/css/et-line-icons.css') }}" />
    <!-- font-awesome icon -->
    <link rel="stylesheet" href="{{ asset('vendor/hcode/css/font-awesome.min.css') }}" />
    <!-- revolution slider -->
    <link rel="stylesheet" href="{{ asset('vendor/hcode/css/extralayers.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/hcode/css/settings.css') }}" />
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{ asset('vendor/hcode/css/magnific-popup.css') }}" />
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('vendor/hcode/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/hcode/css/owl.transitions.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/hcode/css/full-slider.css') }}" />
    <!-- text animation -->
    <link rel="stylesheet" href="{{ asset('vendor/hcode/css/text-effect.css') }}" />
    <!-- hamburger menu  -->
    <link rel="stylesheet" href="{{ asset('vendor/hcode/css/menu-hamburger.css') }}" />
    <!-- common -->
    <link rel="stylesheet" href="{{ asset('vendor/hcode/css/style.css') }}" />
    <!-- responsive -->
    <link rel="stylesheet" href="{{ asset('vendor/hcode/css/responsive.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('vendor/hcode/css/app.css') }}" /> --}}
    <!--[if IE]>
            <link rel="stylesheet" href="{{ asset('vendor/hcode/css/style-ie.css') }}" />
        <![endif]-->
    <!--[if IE]>
            <script src="{{ asset('vendor/hcode/js/html5shiv.js') }}"></script>
        <![endif]-->
    @yield('css')
</head>

<body>

    @include('partials._nav')

    <main style="min-height: 400px;">
        @yield('content')
    </main>

    <!-- footer -->
    <footer>
        <div class=" bg-white footer-top">
            <div class="container">
                <div class="row margin-four">
                    <!-- phone -->
                    {{-- <div class="col-md-4 col-sm-4 text-center">
                        <i class="icon-phone small-icon black-text"></i>
                        <h6 class="black-text margin-two no-margin-bottom"><a href="tel:+8801515297658">+88 01515297658</a></h6>
                    </div> --}}
                    <!-- end phone -->
                    <!-- address -->
                    <div class="col-md-6 col-sm-6 text-center">
                        <i class="icon-map-pin small-icon black-text"></i>
                        <h6 class="black-text margin-two no-margin-bottom">Dhaka, Bangladesh</h6>
                    </div>
                    <!-- end address -->
                    <!-- email -->
                    <div class="col-md-6 col-sm-6 text-center">
                        <i class="icon-envelope small-icon black-text"></i>
                        <h6 class="margin-two no-margin-bottom">
                            <a href="mailto:info@atiqueriyad.com" class="black-text">info@atiqueriyad.com</a>
                        </h6>
                    </div>
                    <!-- end email -->
                </div>
            </div>
        </div>
        <div class="container footer-middle">
            <div class="row">
                <div class="col-md-3 col-sm-3 footer-link1 xs-display-none">
                    <!-- headline -->
                    <h5>About Me</h5>
                    <!-- end headline -->
                    <!-- text -->
                    <p class="footer-text">This the about me section. Here there will be some text about me briefly.</p>
                    <!-- end text -->
                </div>
                <div class="col-md-2 col-sm-3 col-xs-4 footer-link2 col-md-offset-3">
                    <!-- headline -->
                    <h5>About</h5>
                    <!-- end headline -->
                    <!-- link -->
                    <ul>
                        <li>
                            <a href="{{ route('index.bio') }}">Biography</a>
                        </li>
                        <li>
                            <a href="{{ route('index.faq') }}">FAQ</a>
                        </li>
                    </ul>
                    <!-- end link -->
                </div>
                <div class="col-md-2 col-sm-3 col-xs-4  footer-link3">
                    <!-- headline -->
                    <h5>Writing</h5>
                    <!-- end headline -->
                    <!-- link -->
                    <ul>
                        <li>
                            <a href="{{ route('blogs.index') }}">Blog</a>
                        </li>
                        <li>
                            <a href="{{ route('index.books') }}">Books</a>
                        </li>
                    </ul>
                    <!-- end link -->
                </div>
                <div class="col-md-2 col-sm-3 col-xs-4  footer-link4">
                    <!-- headline -->
                    <h5>Multimedia</h5>
                    <!-- end headline -->
                    <!-- link -->
                    <ul>
                        <li>
                            <a href="{{ route('index.gallery') }}">Gallery</a>
                        </li>
                        <li>
                            <a href="{{ route('index.multimedia') }}">Audio(s)/ Video(s)</a>
                        </li>
                    </ul>
                    <!-- end link -->
                </div>
            </div>
            <div class="wide-separator-line bg-mid-gray no-margin-lr margin-three no-margin-bottom"></div>
            <div class="row margin-four no-margin-bottom">
                <div class="col-md-7 col-sm-12 sm-text-center sm-margin-bottom-four">
                    <!-- link -->
                    <ul class="list-inline footer-link text-uppercase">
                        <li>
                            <a href="{{ route('blogs.index') }}">Blog</a>
                        </li>
                        <li>
                            <a href="{{ route('index.books') }}">Books</a>
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
                        <li>
                            <a href="{{ route('index.search') }}">Search</a>
                        </li>
                    </ul>
                    <!-- end link -->
                </div>
                <div class="col-md-5 col-sm-12 footer-social text-right sm-text-center">
                    <!-- social media link -->
                    <a target="_blank" href="https://www.facebook.com/atique.riyad">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a target="_blank" href="https://twitter.com/atique_riyad">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a target="_blank" href="https://www.instagram.com/atiqueriyad/">
                        <i class="fa fa-instagram"></i>
                    </a>
                    <a target="_blank" href="https://www.youtube.com/channel/UCN2oy3P9SZma8TxSwhfH1tA">
                        <i class="fa fa-youtube"></i>
                    </a>
                    <a target="_blank" href="https://www.linkedin.com/in/atique-riyad-9457161a7/">
                        <i class="fa fa-linkedin"></i>
                    </a>
                    <!-- end social media link -->
                </div>
            </div>
        </div>
        <div class="container-fluid bg-dark-gray footer-bottom">
            <div class="container">
                <div class="row margin-three">
                    <!-- copyright -->
                    <div class="col-md-6 col-sm-6 col-xs-12 copyright text-left letter-spacing-1 xs-text-center xs-margin-bottom-one">
                        &copy; {{ date('Y') }} All Rights Reserved.
                    </div>
                    <!-- end copyright -->
                    <!-- logo -->
                    <div class="col-md-6 col-sm-6 col-xs-12 footer-logo text-right xs-text-center">
                        <a href="{{ route('index.index') }}">
                            <img src="{{ asset('images/logo-light.png') }}" alt="" />
                        </a>
                    </div>
                    <!-- end logo -->
                </div>
            </div>
        </div>
        <!-- scroll to top -->
        <a href="javascript:;" class="scrollToTop">
            <i class="fa fa-angle-up"></i>
        </a>
        <!-- scroll to top End... -->
    </footer>
    <!-- end footer -->

    <!-- javascript libraries / javascript files set #1 -->
    <script type="text/javascript" src="{{ asset('vendor/hcode/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/hcode/js/modernizr.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/hcode/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/hcode/js/bootstrap-hover-dropdown.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/hcode/js/jquery.easing.1.3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/hcode/js/skrollr.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/hcode/js/smooth-scroll.js') }}"></script>
    <!-- jquery appear -->
    <script type="text/javascript" src="{{ asset('vendor/hcode/js/jquery.appear.js') }}"></script>
    <!-- animation -->
    <script type="text/javascript" src="{{ asset('vendor/hcode/js/wow.min.js') }}"></script>
    <!-- page scroll -->
    {{-- <script type="text/javascript" src="{{ asset('vendor/hcode/js/page-scroll.js') }}"></script> --}}
    <!-- easy piechart-->
    <script type="text/javascript" src="{{ asset('vendor/hcode/js/jquery.easypiechart.js') }}"></script>
    <!-- parallax -->
    <script type="text/javascript" src="{{ asset('vendor/hcode/js/jquery.parallax-1.1.3.js') }}"></script>
    <!--portfolio with shorting tab -->
    <script type="text/javascript" src="{{ asset('vendor/hcode/js/jquery.isotope.min.js') }}"></script>
    <!-- owl slider  -->
    <script type="text/javascript" src="{{ asset('vendor/hcode/js/owl.carousel.min.js') }}"></script>
    <!-- magnific popup  -->
    <script type="text/javascript" src="{{ asset('vendor/hcode/js/jquery.magnific-popup.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/hcode/js/popup-gallery.js') }}"></script>
    <!-- text effect  -->
    <script type="text/javascript" src="{{ asset('vendor/hcode/js/text-effect.js') }}"></script>
    <!-- revolution slider  -->
    <script type="text/javascript" src="{{ asset('vendor/hcode/js/jquery.tools.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/hcode/js/jquery.revolution.js') }}"></script>
    <!-- counter  -->
    <script type="text/javascript" src="{{ asset('vendor/hcode/js/counter.js') }}"></script>
    <!-- countTo -->
    <script type="text/javascript" src="{{ asset('vendor/hcode/js/jquery.countTo.js') }}"></script>
    <!-- fit videos  -->
    <script type="text/javascript" src="{{ asset('vendor/hcode/js/jquery.fitvids.js') }}"></script>
    <!-- imagesloaded  -->
    <script type="text/javascript" src="{{ asset('vendor/hcode/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- hamburger menu-->
    <script type="text/javascript" src="{{ asset('vendor/hcode/js/classie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/hcode/js/hamburger-menu.js') }}"></script>
    <!-- setting -->
    <script type="text/javascript" src="{{ asset('vendor/hcode/js/main.js') }}"></script>
    
    
    @include('partials._messages')
    @yield('js')

    <script type="text/javascript">
        $(".owl-carousel").owlCarousel({
            autoPlay: 5000,
            items : 1, // THIS IS IMPORTANT
            responsive : {
                480 : { items : 4  }, // from zero to 480 screen width 4 items
                768 : { items : 6  }, // from 480 screen widthto 768 6 items
                1024 : { items : 8 } // from 768 screen width to 1024 8 items 
            },
      });
    </script>
</body>

<!-- Mirrored from www.themezaa.com/html/h-code/portfolio-short-description.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Sep 2018 20:27:12 GMT -->

</html>