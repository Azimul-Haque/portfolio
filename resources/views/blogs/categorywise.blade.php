@extends('layouts.index')
@section('title') Category - {{ $name }} @endsection

@section('description') Category wise blogs are synchronized here. Easily find them - Category name {{ $name }}. @endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stylesheet.css') }}">
@endsection

@section('content')
    {{-- facebook comment plugin --}}
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&autoLogAppEvents=1&version=v6.0&appId=250806882740490"></script>
    {{-- facebook comment plugin --}}
    
    <!-- head section -->
    <section class="content-top-margin page-title page-title-small bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-duration="300ms">
                    <!-- page title -->
                    <span class="text-large letter-spacing-2 black-text font-weight-600 text-uppercase agency-title">Category - {{ $name }}</span>
                    <!-- end page title -->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 breadcrumb text-uppercase wow fadeInUp xs-display-none" data-wow-duration="600ms">
                    <!-- breadcrumb -->
                    <ul @desktop class="text-right" @enddesktop>
                        <li><a href="{{ route('index.index') }}">Home</a></li>
                        <li><a href="{{ route('blogs.index') }}">Blog</a></li>
                        <li><a href="#">Category - {{ $name }}</a></li>
                    </ul>
                    <!-- end breadcrumb -->
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
                            <div class="separator-line bg-black no-margin-lr margin-four"></div>
                            <div>
                                {{-- <a href="#!" class="blog-like"><i class="fa fa-heart-o"></i>{{ $blog->likes }} Like(s)</a>  --}}
                                <div class="fb-like blog-like" data-href="{{ url('/blog/'.$blog->slug) }}" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="false" ></div>
                                <a href="{{ url('/blog/'.$blog->slug . '#comment_section') }}" class="comment"><i class="fa fa-comment-o"></i> <span class="fb-comments-count" data-href="{{ url('/blog/'.$blog->slug) }}">0</span> comment(s)</a>
                            </div>
                            <a class="highlight-button btn btn-small xs-no-margin-bottom" href="{{ route('blog.single', $blog->slug) }}">Continue Reading</a>
                        </div>
                    </div>
                    {{-- <script type="text/javascript" src="{{ asset('vendor/hcode/js/jquery.min.js') }}"></script>
                    <script type="text/javascript">
                        $.ajax({
                            url: "https://graph.facebook.com/v2.2/?fields=share{comment_count}&id={{ url('/blog/'.$blog->slug) }}",
                            dataType: "jsonp",
                            success: function(data) {
                                $('#comment_count{{ $blog->id }}').text(data.share.comment_count);
                            }
                        });
                    </script> --}}
                    @endforeach
                    <!-- end post item -->
                    {{-- paginating --}}
                    {{ $blogs->links() }}

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