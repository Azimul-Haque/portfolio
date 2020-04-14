@extends('layouts.index')
@section('title')
    Multimedia - Audio(s)/ Video(s)
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stylesheet.css') }}">
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
    </style>
@endsection

@section('content')
    <!-- head section -->
    <section class="content-top-margin page-title bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7 col-sm-12 wow fadeInUp" data-wow-duration="300ms">
                    <!-- page title -->
                    <h1 class="black-text">Multimedia - Audio(s)/ Video(s)</h1>
                    <!-- end page title -->
                    <!-- page title tagline -->
                    <span class="xs-display-none">Lorem Ipsum is simply dummy text of the printing.</span>
                    <!-- end title tagline -->
                    <div class="separator-line margin-three bg-black no-margin-lr sm-margin-top-three sm-margin-bottom-three no-margin-bottom xs-display-none"></div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 breadcrumb text-uppercase sm-no-margin-top wow fadeInUp xs-display-none" data-wow-duration="600ms">
                    <!-- breadcrumb -->
                    <ul @desktop class="text-right" @enddesktop>
                        <li><a href="/">Home</a></li>
                        <li><a href="#">Multimedia</a></li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </section>
    <!-- end head section -->

    <!-- content section -->
    <section class="wow fadeIn">
      <div class="container">
        <div class="row blog-masonry blog-masonry-2col no-transition">
          <!-- post item -->
          @php $counter = 1; @endphp
          @foreach($blogs as $blog)
          <div class="col-md-6 col-sm-6 col-xs-6 blog-listing wow fadeInUp" 
          @if($counter%2 == 0)
          data-wow-duration="600ms" 
          @else
          data-wow-duration="300ms"
          @endif
          >
              @if($blog->featured_image != null)
              <div class="blog-image"><a href="{{ route('blog.single', $blog->slug) }}">
                <img src="{{ asset('images/blogs/'.$blog->featured_image) }}" alt=""/></a>
              </div>
              @endif
              <div class="blog-details">
                  <div class="blog-date">{{ date('F d, Y', strtotime($blog->created_at)) }} | 
                    <a href="{{ route('blog.categorywise', $blog->category->name) }}">{{ $blog->category->name }}</a>
                  </div>
                  <div class="blog-title"><a href="{{ route('blog.single', $blog->slug) }}">
                    {{ $blog->title }}
                  </a></div>
                  <div class="blog-short-description">
                    <div style="text-align: justify;">
                        @if(strlen(strip_tags($blog->body))>400)
                            {{ mb_substr(strip_tags($blog->body), 0, stripos($blog->body, " ", stripos(strip_tags($blog->body), " ")+300))." [...] " }}

                        @else
                            {{ strip_tags($blog->body) }}
                        @endif
                    </div>
                  </div>
                  <div class="separator-line bg-black no-margin-lr"></div>
                  <div>
                    <a href="#!" class="blog-like"><i class="fa fa-heart-o"></i>{{ $blog->likes }} Like(s)</a>
                    <a href="#!" class="comment"><i class="fa fa-comment-o"></i>
                                <span id="comment_count{{ $blog->id }}"></span>
                                 comment(s)</a>
                  </div>
                    <script type="text/javascript" src="{{ asset('vendor/hcode/js/jquery.min.js') }}"></script>
                    <script type="text/javascript">
                        $.ajax({
                            url: "https://graph.facebook.com/v2.2/?fields=share{comment_count}&id={{ url('/blog/'.$blog->slug) }}",
                            dataType: "jsonp",
                            success: function(data) {
                                if(data.hasOwnProperty('share')) {
                                  $('#comment_count{{ $blog->id }}').text(data.share.comment_count);
                                } else {
                                  $('#comment_count{{ $blog->id }}').text(0);
                                }
                            },
                            error: function(data) {
                              
                            }
                        });
                    </script>
              </div>
          </div>
          @php $counter++; @endphp
          @endforeach
          <!-- end post item -->
        </div>
        <div class="row">
          <div class="col-md-12">
            <center>{{ $blogs->links() }}</center>
          </div>
        </div>
      </div>
    </section>
    <!-- end content section -->
@endsection

@section('js')
   
@endsection