@extends('layouts.index')
@section('title')
    Home
@endsection

@section('css')
    <style type="text/css">
        body {
            overflow: hidden;
        }

        /* Preloader */
        #preloader {
            position: fixed;
            top:0;
            left:0;
            right:0;
            bottom:0;
            background-color:#fff; /* change if the mask should have another color then white */
            z-index:99999;
        }

        #status {
            width:200px;
            height:200px;
            position:absolute;
            left:50%;
            top:50%;
            background-image:url({{ asset('images/3362406.gif') }}); /* path to your loading animation */
            background-repeat:no-repeat;
            background-position:center;
            margin:-100px 0 0 -100px;
        }
    </style>
@endsection

@section('content')
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    @include('partials._slider')
    <!-- about section -->
    <section class="no-padding-bottom wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-10 text-center center-col">
                    <span class="margin-five no-margin-top display-block letter-spacing-2">EST. 2016</span>
                    <h1>IITDU Alumni Association</h1>
                    <p class="text-med width-90 center-col margin-seven no-margin-bottom"> We've been crafting beautiful websites, launching stunning brands and making clients happy for years. With our prestigious craftsmanship, remarkable client care and passion for design.</p>
                </div>
            </div>
        </div>
        <div class="container-fluid margin-five no-margin-bottom">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 bg-fast-yellow padding-three text-center">
                    <span class="text-small text-uppercase font-weight-600 black-text letter-spacing-2">Professionalism &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Excellence &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Respect</span>
                </div>
            </div>
        </div>
    </section>
    <!-- end about section -->
    <section class="wow fadeInUp bg-gray">
        <div class="container">
            <div class="row">
                <!-- call to action -->
                <div class="col-md-7 col-sm-12 text-center center-col">
                    <p class="title-large text-uppercase letter-spacing-1 black-text font-weight-600 wow fadeIn">Want to be a memeber of IITAluni?</p>
                    <a href="{{ route('index.application') }}" class="highlight-button-black-border btn margin-six wow fadeInUp">Apply Now!</a>
                </div>
                <!-- end call to action -->
            </div>
        </div>
    </section>
    <section style="padding: 13px 0;">
        <div class="container margin-five wow fadeInUp">
            <div class="row">
                <!-- features item -->
                <div class="col-md-4 col-sm-6 sm-margin-bottom-ten xs-text-center">
                    <h3>Latest News</h3>
                    <span class="title-small text-uppercase font-weight-700 black-text letter-spacing-1 margin-seven display-block">We're ready
                        <br> to start now</span>
                    <p class="margin-ten no-margin-top width-90 xs-center-col xs-display-block">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the text.</p>
                    <a href="#" class="highlight-link text-uppercase white-text">Read More
                        <i class="fa fa-long-arrow-right extra-small-icon white-text"></i>
                    </a>
                </div>
                <!-- end features item -->
                <!-- features item -->
                <div class="col-md-4 col-sm-6 sm-margin-bottom-ten xs-text-center">
                    <h3>Latest Event</h3>
                    <span class="title-small text-uppercase font-weight-700 black-text letter-spacing-1 margin-seven display-block">Always on time
                        <br> call support</span>
                    <p class="margin-ten no-margin-top width-90 xs-center-col xs-display-block">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the text.</p>
                    <a href="#" class="highlight-link text-uppercase white-text">Read More
                        <i class="fa fa-long-arrow-right extra-small-icon white-text"></i>
                    </a>
                </div>
                <!-- end features item -->
                <!-- features item -->
                <div class="col-md-4 col-sm-6 xs-margin-bottom-ten xs-text-center">
                    <h3>Latest Notice</h3>
                    <span class="title-small text-uppercase font-weight-700 black-text letter-spacing-1 margin-seven display-block">We Deliver the
                        <br> highest quality</span>
                    <p class="margin-ten no-margin-top width-90 xs-center-col xs-display-block">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the text.</p>
                    <a href="#" class="highlight-link text-uppercase white-text">Read More
                        <i class="fa fa-long-arrow-right extra-small-icon white-text"></i>
                    </a>
                </div>
                <!-- end features item -->

            </div>
        </div>
    </section>
    <!-- counter section -->
    <section id="counter" class="fix-background" style="background-image:url('images/slider/slider-img45.jpg');">
        <div class="opacity-full bg-dark-gray"></div>
        <div class="container position-relative">
            <div class="row">
                <!-- counter item -->
                <div class="col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten" data-wow-duration="300ms">
                    <i class="icon-heart medium-icon"></i>
                    <span class="timer counter-number white-text main-font font-weight-600" data-to="{{ $alumnis }}" data-speed="7000"></span>
                    <span class="counter-title light-gray-text">Alumnis</span>
                </div>
                <!-- end counter item -->
                <!-- counter item -->
                <div class="col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten" data-wow-duration="600ms">
                    <i class="icon-happy medium-icon"></i>
                    <span class="timer counter-number white-text main-font font-weight-600" data-to="20" data-speed="7000"></span>
                    <span class="counter-title light-gray-text">Batch</span>
                </div>
                <!-- end counter item -->
                <!-- counter item -->
                <div class="col-md-3 col-sm-6 bottom-margin-small text-center counter-section wow fadeInUp xs-margin-bottom-ten" data-wow-duration="900ms">
                    <i class="icon-anchor medium-icon"></i>
                    <span class="timer counter-number white-text main-font font-weight-600" data-to="20" data-speed="7000"></span>
                    <span class="counter-title light-gray-text">Projects Completed</span>
                </div>
                <!-- end counter item -->
                <!-- counter item -->
                <div class="col-md-3 col-sm-6 text-center counter-section wow fadeInUp" data-wow-duration="1200ms">
                    <i class="icon-chat medium-icon"></i>
                    <span class="timer counter-number white-text main-font font-weight-600" data-to="5" data-speed="7000"></span>
                    <span class="counter-title light-gray-text">Events</span>
                </div>
                <!-- end counter item -->
            </div>
        </div>
    </section>
    <!-- end counter section -->
    <!-- blog content section -->
    <section class="">
        <div class="container">
            <div class="row">
                <!-- call to action -->
                <div class="col-md-7 col-sm-12 text-center center-col">
                    <p class="title-large text-uppercase letter-spacing-1 black-text font-weight-600 wow fadeIn">Latest Blogs</p><br/><br/>
                </div>
                <!-- end call to action -->
            </div>
            <div class="row">
                <!-- post item -->
                @php
                    $eventwaitduration = 300;
                @endphp
                @foreach($blogs as $blog)
                <div class="col-md-4 col-sm-4 blog-listing wow fadeInRight" data-wow-duration="{{ $eventwaitduration }}ms">
                    <div class="blog-image">
                        <a href="{{ route('blog.single', $blog->slug) }}">
                            @if($blog->featured_image != null)
                            <img src="{{ asset('images/blogs/'.$blog->featured_image) }}" alt=""/>
                            @else
                            <img src="{{ asset('images/600x315.png') }}" alt=""/>
                            @endif
                        </a>
                    </div>
                    <div class="blog-details">
                        <div class="blog-date"><a href="{{ route('blog.single', $blog->slug) }}">{{ $blog->user->name }}</a> | {{ date('F d, Y', strtotime($blog->created_at)) }}</div>
                        <div class="blog-title"><a href="{{ route('blog.single', $blog->slug) }}">{{ $blog->title }}</a></div>
                        <div class="blog-short-description" style="text-align: justify; text-justify: inter-word; width: 100%; min-height: 160px;">
                            @if(strlen(strip_tags($blog->body))>300)
                            {{ mb_substr(strip_tags($blog->body), 0, stripos($blog->body, " ", stripos(strip_tags($blog->body), " ")+200))." [...] " }}
                            @else
                                {{ strip_tags($blog->body) }}
                            @endif
                        </div>
                        <div class="separator-line bg-black no-margin-lr"></div>
                        <div>
                            <a href="#!" class="blog-like"><i class="fa fa-heart-o"></i>{{ $blog->likes }} Like(s)</a>
                            <a href="#" class="comment"><i class="fa fa-comment-o"></i>
                            <span id="comment_count{{ $blog->id }}"></span> comment(s)</a>
                            <script type="text/javascript" src="{{ asset('vendor/hcode/js/jquery.min.js') }}"></script>
                            <script type="text/javascript">
                                $.ajax({
                                    url: "https://graph.facebook.com/v2.2/?fields=share{comment_count}&id={{ url('/blog/'.$blog->slug) }}",
                                    dataType: "jsonp",
                                    success: function(data) {
                                        if(data.share) {
                                            $('#comment_count{{ $blog->id }}').text(data.share.comment_count);
                                        } else {
                                            $('#comment_count{{ $blog->id }}').text(0);
                                        }
                                        
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
                @php
                    $eventwaitduration = $eventwaitduration + 300;
                @endphp
                @endforeach
                <!-- end post item -->
            </div>
        </div>
    </section>
    <!-- end blog content section -->
@endsection

@section('js')
<!-- Preloader -->
<script type="text/javascript">
    //<![CDATA[
        $(window).load(function() { // makes sure the whole site is loaded
            $('#status').fadeOut(); // will first fade out the loading animation
            $('#preloader').delay(1000).fadeOut('slow'); // will fade out the white DIV that covers the website.
            $('body').delay(1000).css({'overflow':'visible'});
        })
    //]]>
</script>
@endsection