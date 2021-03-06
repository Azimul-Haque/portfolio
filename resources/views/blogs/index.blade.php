@extends('layouts.index')
@section('title') Blogs - All of my writing @endsection

@section('description') Blog is a way to simply express yourself. I have written my thoughts and emotions over these blogs. Read them, comment on them. @endsection

@section('css')
    <style type="text/css">
        .separator-line {
            height: 2px;
            margin: 0 auto;
            width: 30px;
            margin: 3% auto;
        }
    </style>
@endsection

@section('content')
    {{-- facebook comment plugin --}}
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&autoLogAppEvents=1&version=v6.0&appId=250806882740490"></script>
    {{-- facebook comment plugin --}}

    <!-- head section -->
    <section class="page-title parallax3 parallax-fix page-title-large">
        <div class="opacity-medium bg-black"></div>
        <img class="parallax-background-img" src="{{ asset('images/slider/blog_cover.jpg') }}" alt="" />
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center animated fadeInUp">
                    <div class="separator-line bg-yellow no-margin-top margin-four"></div>
                    <!-- page title -->
                    <h1 class="white-text">Blog - Right Sidebar</h1>
                    <!-- end page title -->
                    <!-- page title tagline -->
                    <span class="white-text">Lorem Ipsum is simply dummy text of the printing.</span>
                    <!-- end title tagline -->
                </div>
            </div>
        </div>
    </section>
    <!-- end head section -->

    <!-- content section -->
    <section class="wow fadeIn no-margin-top">
        <div class="container">
            <div class="row">
                <!-- content  -->
                <div class="col-md-8 col-sm-8">
                    {{-- <h2 class="hidden-xs margin-four">Blogs</h2>
                    <h2 class="visible-xs margin-ten xs-no-margin-bottom">Blogs</h2> --}}
                    <!-- post item -->
                    @foreach ($blogs as $blog)
                        <div class="blog-listing blog-listing-classic no-margin-top wow fadeIn">
                            <!-- post image -->
                            @if($blog->featured_image != null)
                                <div class="blog-image"><a href="{{ route('blog.single', $blog->slug) }}"><img src="{{ asset('images/blogs/'.$blog->featured_image) }}" alt="" style="width: 100%;" /></a></div>
                            @endif
                            <!-- end post image -->
                            <div class="blog-details">
                                <div class="blog-date">Posted by <a href="{{ route('index.bio') }}"><b>{{ $blog->user->name }}</b></a> | {{ date('F d, Y', strtotime($blog->created_at)) }} | <a href="{{ route('blog.categorywise', $blog->category->name) }}">{{ $blog->category->name }}</a> </div>
                                <div class="blog-title"><a href="{{ route('blog.single', $blog->slug) }}">
                                    {{ $blog->title }}
                                </a></div>
                                <div style="text-align: justify;">
                                    @if(strlen(strip_tags($blog->body))>600)
                                        {{ mb_substr(strip_tags($blog->body), 0, stripos($blog->body, " ", stripos(strip_tags($blog->body), " ")+500))." [...] " }}

                                    @else
                                        {{ strip_tags($blog->body) }}
                                    @endif
                                </div>
                                <div class="separator-line bg-black no-margin-lr"></div>
                                <div>
                                    {{-- <a href="#!" class="blog-like"><i class="fa fa-heart-o"></i>{{ $blog->likes }} Like(s)</a>  --}}
                                    <div class="fb-like blog-like" data-href="{{ url('/blog/'.$blog->slug) }}" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="false" ></div>
                                    <a href="{{ url('/blog/'.$blog->slug . '#comment_section') }}" class="comment"><i class="fa fa-comment-o"></i> <span class="fb-comments-count" data-href="{{ url('/blog/'.$blog->slug) }}">0</span> comment(s)</a>
                                </div>
                                <a class="highlight-button btn btn-small xs-no-margin-bottom" href="{{ route('blog.single', $blog->slug) }}">Continue Reading</a>
                            </div>
                        </div>
                    @endforeach
                    <!-- end post item -->

                    {{-- paginating --}}

                    <center>
                        @include('pagination.default', ['paginator' => $blogs])
                    </center>

                </div>
                <!-- end content  -->
                <!-- sidebar  -->
                <div class="col-md-3 col-sm-4 col-md-offset-1 xs-margin-top-ten sidebar">
                    @include('partials._blog_sidebar')
                </div>
                <!-- end sidebar  -->
            </div>
        </div>
    </section>
    <!-- end content section -->
@endsection

@section('js')

@endsection