@extends('layouts.index')
@section('title') {{ $blog->title }} @endsection

@section('description') {{ $blog->title }} - @if(strlen(strip_tags($blog->body))>250) {{ mb_substr(strip_tags($blog->body), 0, stripos($blog->body, " ", stripos(strip_tags($blog->body), " ")+200)) }} @else {{ strip_tags($blog->body) }} @endif @endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stylesheet.css') }}">
    @if($blog->featured_image != null && file_exists(public_path('images/blogs/' . $blog->featured_image)))
        <meta property="og:image" content="{{ asset('images/blogs/'.$blog->featured_image) }}" />
    @else
        <meta property="og:image" content="{{ asset('images/fb_back.jpg') }}" />
    @endif

    <meta property="og:title" content="{{ $blog->title }} | Atique Riyad">
    <meta name="description" property="og:description" content="@if(strlen(strip_tags($blog->body))>250) {{ mb_substr(strip_tags($blog->body), 0, stripos($blog->body, " ", stripos(strip_tags($blog->body), " ")+200)) }} @else {{ strip_tags($blog->body) }} @endif">
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="{{ Request::url() }}">
    <meta property="og:site_name" content="Atique Riyad">
    <meta property="og:locale" content="en_US">
    <meta property="fb:admins" content="100001596964477">
    <meta property="fb:app_id" content="250806882740490">
    <meta property="og:type" content="article">
    <!-- Open Graph - Article -->
    <meta name="article:section" content="{{ $blog->category->name }}">
    <meta name="article:published_time" content="{{ $blog->created_at}}">
    <meta name="article:author" content="{{ Request::url('blogger/profile/'.$blog->user->unique_key) }}">
    <meta name="article:tag" content="{{ $blog->category->name }}">
    <meta name="article:modified_time" content="{{ $blog->updated_at}}">

    <style type="text/css">
      .youtibecontainer {
          position: relative;
          width: 100%;
          height: 0;
          padding-bottom: 56.25%;
      }
      .youtubeiframe {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
      }

      .font-large {
        font-size: 30px !important;

      }
    </style>
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
                <div class="col-lg-8 col-md-7 col-sm-12 wow fadeInUp" data-wow-duration="300ms">
                    <!-- page title -->
                    <span class="text-large letter-spacing-2 black-text font-weight-600 text-uppercase agency-title">Single Blog</span>
                    <!-- end page title -->
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 breadcrumb text-uppercase wow fadeInUp xs-display-none" data-wow-duration="600ms">
                    <!-- breadcrumb -->
                    <ul @desktop class="text-right" @enddesktop>
                        <li><a href="{{ route('index.index') }}">Home</a></li>
                        <li><a href="{{ route('blogs.index') }}">Blog</a></li>
                        <li><a href="#">Single Blog</a></li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </section>
    <!-- end head section -->

    <!-- content section -->
    <section class="wow fadeIn xs-margin-top-ten no-margin-top">
        <div class="container">
            <div class="row">
                <!-- content  -->
                <div class="col-md-8 col-sm-8">
                    <!-- post title  -->
                    <h2 class="blog-details-headline text-black">{{ $blog->title }}</h2>
                    <!-- end post title  -->
                    <!-- post date and categories  -->
                    <div class="blog-date no-padding-top">Posted by <a href="{{ route('index.bio') }}"><b>{{ $blog->user->name }}</b></a> | {{ date('F d, Y', strtotime($blog->updated_at)) }} | <a href="{{ route('blog.categorywise', $blog->category->name) }}">{{ $blog->category->name }}</a> </div>
                    <!-- end date and categories   -->
                    <!-- post image -->
                    @if($blog->featured_image != null && file_exists(public_path('images/blogs/' . $blog->featured_image)))
                        <div class="blog-image margin-four"><img src="{{ asset('images/blogs/'.$blog->featured_image) }}" alt="" style="width: 100%; height: auto;"></div>
                    @endif

                    <!-- end post image -->
                    <!-- post details text -->
                    <div class="blog-details-text">
                        <div class="" style="overflow-wrap: break-word; ">
                            {!! $blog->body !!}
                            {{-- solved the strong, em and p problem --}}
                            @if(substr_count(substr($blog->body, 0, stripos($blog->body, " ", stripos(strip_tags($blog->body), " ")+0)), "<strong>") == substr_count(substr($blog->body, 0, stripos($blog->body, " ", stripos(strip_tags($blog->body), " ")+0)), "</strong>"))
                            @else
                              </strong>
                            @endif
                            @if(substr_count(substr($blog->body, 0, stripos($blog->body, " ", stripos(strip_tags($blog->body), " ")+0)), "<b>") == substr_count(substr($blog->body, 0, stripos($blog->body, " ", stripos(strip_tags($blog->body), " ")+0)), "</b>"))
                            @else
                              </b>
                            @endif
                            @if(substr_count(substr($blog->body, 0, stripos($blog->body, " ", stripos(strip_tags($blog->body), " ")+0)), "<b>") == substr_count(substr($blog->body, 0, stripos($blog->body, " ", stripos(strip_tags($blog->body), " ")+0)), "</b>"))

                            @else
                              </b>
                            @endif
                            @if(substr_count(substr($blog->body, 0, stripos($blog->body, " ", stripos(strip_tags($blog->body), " ")+0)), "<em>") == substr_count(substr($blog->body, 0, stripos($blog->body, " ", stripos(strip_tags($blog->body), " ")+0)), "</em>"))

                            @else
                              </em>
                            @endif
                            @if(substr_count(substr($blog->body, 0, stripos($blog->body, " ", stripos(strip_tags($blog->body), " ")+0)), "<p>") == substr_count(substr($blog->body, 0, stripos($blog->body, " ", stripos(strip_tags($blog->body), " ")+0)), "</p>"))
                            @else
                              </p>
                            @endif
                            {{-- solved the strong, em and p problem --}}
                        </div>

                        <div class="separator-line bg-black no-margin-lr margin-four"></div>
                        <div>
                            <div class="fb-like blog-like" data-href="{{ Request::url() }}" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="false"></div>
                                                     
                            {{-- <a href="#!" class="blog-like" @if(Auth::check()) onclick="likeBlog({{ Auth::user()->id }}, {{ $blog->id }})" @else title="Login to Like!" @endif>
                                <i class="fa fa-heart-o" id="like_icon"></i>
                                <span id="like_span">{{ $blog->likes }} Like(s)</span>
                            </a> --}}
                            
                            <a href="#" class="blog-share" data-toggle="modal" data-target="#shareModal"><i class="fa fa-share-alt"></i>Share</a>

                            <a href="#comment_section" class="comment"><i class="fa fa-comment-o"></i> <span class="fb-comments-count" data-href="{{ Request::url() }}">0</span> comment(s)</a>
                        </div>
                        <!-- end post tags -->
                    </div>
                    <!-- end post details text -->

                    <div class="wide-separator-line no-margin-lr"></div>
                    
                    <!-- blog comment -->
                    <div class="blog-comment-main xs-no-padding-top" id="comment_section">
                        <h5 class="widget-title">Blog Comments</h5>
                        <div class="row">
                            <div class="col-md-12">
                                
                            </div>
                        </div>
                    </div>
                    <div class="fb-comments" data-href="{{ Request::url() }}" data-width="100%" data-numposts="5"></div>
                    <!-- end blog comment -->

                    <center>
                      <br/><br/><br/>
                      <small>This article has been read <big><b>{{ $blog->hits }}</b></big> times.</small>
                    </center>
                </div>
                <!-- end content  -->

                <!-- sidebar  -->
                <div class="col-md-3 col-sm-4 col-md-offset-1 sidebar xs-margin-top-ten">
                    @include('partials._blog_sidebar')
                </div>
                <!-- sidebar  -->
            </div>
        </div>
    </section>
    <!-- end content section -->

    <!-- Share Modal -->
    <div class="modal fade" id="shareModal" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><i class="fa fa-share-alt" aria-hidden="true"></i> Share this Blog</h4>
            </div>
            <div class="modal-body">
              <!-- social icon -->
              <div class="text-center margin-ten padding-four no-margin-top">

                    {{-- <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" class="btn social-icon social-icon-large button" onclick="window.open(this.href,'newwindow', 'width=500,height=400'); return false;"><i class="fa fa-facebook"></i></a> --}}
                    
                <a href="https://www.facebook.com/dialog/share?app_id=250806882740490&display=popup&href={{ Request::url() }}&redirect_uri={{ Request::url() }}" class="btn social-icon social-icon-large button" onclick="window.open(this.href,'newwindow', 'width=500,height=400'); return false;"><i class="fa fa-facebook font-large"></i></a>

                  
                <a href="https://twitter.com/intent/tweet?url={{ Request::url() }}" class="btn social-icon social-icon-large button" onclick="window.open(this.href,'newwindow', 'width=500,height=400'); return false;"><i class="fa fa-twitter  font-large"></i></a>
                  {{-- <a href="https://plus.google.com/share?url={{ Request::url() }}" class="btn social-icon social-icon-large button" onclick="window.open(this.href,'newwindow', 'width=500,height=400');  return false;"><i class="fa fa-google-plus"></i></a> --}}
                
                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ Request::url()}}&title=IIT%20Alumni%20Association&summary={{ $blog->title }}&source=IITAlumni" class="btn social-icon social-icon-large button" onclick="window.open(this.href,'newwindow', 'width=500,height=400');  return false;"><i class="fa fa-linkedin font-large"></i></a>
              </div>
              <!-- end social icon -->
            </div>
            {{-- <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> --}}
          </div>
          
        </div>
    </div>
@endsection

@section('js')
    @if(Auth::check())
    <script type="text/javascript">
        $(document).ready(function(){
            checkLiked();
        });

        // like or dislike
        function likeBlog(user_id, blog_id) {
          //console.log(user_id +','+ blog_id);
          $.get(window.location.protocol + "//" + window.location.host + "/like/" + user_id + "/" + blog_id, function(data, status){
              //console.log("Data: " + data + "\nStatus: " + status);
              checkLiked();
          });
        }
        function checkLiked() {
          $.get(window.location.protocol + "//" + window.location.host + "/check/like/" + {{ Auth::user()->id }} + "/" + {{ $blog->id }}, function(data, status){
              //console.log(data);
              if(data.status == 'liked') {
                $('#like_span').text(data.likes +' Liked');
                $('#like_icon').css('color', 'red');
                $('#like_icon').attr('class', 'fa fa-heart');
              } else {
                $('#like_span').text(data.likes +' Like');
                $('#like_icon').css('color', '');
                $('#like_icon').attr('class', 'fa fa-heart-o');
              }
          });
        }
    </script>
    @endif
@endsection