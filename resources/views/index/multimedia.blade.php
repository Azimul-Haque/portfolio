@extends('layouts.index')
@section('title') Multimedia - Audio(s)/ Video(s) @endsection

@section('description') Find most of my youtube videos and soundcloud contents on this page. I have shared almost all off them here. @endsection

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
                    <div class="separator-line margin-three bg-yellow no-margin-lr sm-margin-top-three sm-margin-bottom-three no-margin-bottom xs-display-none"></div>
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
          @foreach($multimedia as $blog)
          <div class="col-md-6 col-sm-6 col-xs-6 blog-listing wow fadeInUp" 
          @if($counter%2 == 0)
          data-wow-duration="600ms" 
          @else
          data-wow-duration="300ms"
          @endif
          >
              <div class="blog-image">
                {!! $blog->body !!}
              </div>
              <div class="blog-details">
                  <div class="blog-date">Posted by <a href="{{ route('index.bio') }}"><b>{{ $blog->user->name }}</b></a> | {{ date('F d, Y', strtotime($blog->created_at)) }}
                  </div>
                  <div class="blog-title">
                    <a href="{{ route('index.multimedia.single', $blog->slug) }}">
                      {{ $blog->title }}
                    </a>
                  </div>
                  
                  <div class="separator-line bg-black no-margin-lr"></div>
                  <div>
                    {{-- <a href="#!" class="blog-like"><i class="fa fa-heart-o"></i>{{ $blog->likes }} Like(s)</a> --}}
                    <div class="fb-like blog-like" data-href="{{ url('/multimedia/'.$blog->slug) }}" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="false" ></div>

                    <a href="{{ url('/multimedia/'.$blog->slug . '#comment_section') }}" class="comment"><i class="fa fa-comment-o"></i><span class="fb-comments-count" data-href="{{ url('/multimedia/'.$blog->slug) }}">0</span> comment(s)</a>
                  </div>
              </div>
          </div>
          @php $counter++; @endphp
          @endforeach
          <!-- end post item -->

        </div>
        <div class="row">
          <div class="col-md-12">
            <center>
                @include('pagination.default', ['paginator' => $multimedia])
            </center>
          </div>
        </div>
      </div>
    </section>
    <!-- end content section -->
@endsection

@section('js')
   
@endsection