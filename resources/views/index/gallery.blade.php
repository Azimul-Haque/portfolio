@extends('layouts.index')
@section('title') Gallery @endsection

@section('description') Find some of my photos taken on different time, different places. I call them - Memories clicked by machine called camera. @endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stylesheet.css') }}">
@endsection

@section('content')
    <!-- head section -->
    <section class="content-top-margin page-title page-title-small bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7 col-sm-12 wow fadeInUp" data-wow-duration="300ms">
                    <!-- page title -->
                    <span class="text-large letter-spacing-2 black-text font-weight-600 text-uppercase agency-title">Gallery</span>
                    <!-- end page title -->
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 breadcrumb text-uppercase wow fadeInUp xs-display-none" data-wow-duration="600ms">
                    <!-- breadcrumb -->
                    <ul @desktop class="text-right" @enddesktop>
                        <li><a href="{{ route('index.index') }}">Home</a></li>
                        <li><a href="#">Gallery</a></li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </section>
    <!-- end head section -->
      
    <section class="work-3col masonry">
        <div class="container">
            <div class="row">                     
                <div class="col-md-7 col-sm-10 center-col text-center margin-five no-margin-top">
                    <h6 class="no-margin-top margin-ten xs-margin-bottom-seven"><strong class="black-text">Memories clicked by machine called camera</strong></h6>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 grid-gallery overflow-hidden no-padding">
                    <ul class="grid masonry-items lightbox-gallery">
                        @foreach($galleries as $gallery)
                            <!-- photo item -->
                            <li class="wow">
                                <figure>
                                    <div class="gallery-img">
                                        @if($gallery->image != null && file_exists(public_path('images/gallery/' . $gallery->image)))
                                            <a href="{{ asset('images/gallery/' . . $gallery->image) }}" title="{{ $gallery->caption }}">
                                                <img src="{{ asset('images/gallery/' . . $gallery->image) }}" alt="">
                                            </a>
                                        @else
                                            <a href="{{ asset('images/blank_image') }}" title="This image is not avalable!">
                                                <img src="{{ asset('images/blank_image') }}" alt="">
                                            </a>
                                        @endif
                                        
                                    </div>
                                    <figcaption>
                                        <h3>{{ $gallery->caption }}</h3>
                                        <p>{{ date('F d, Y', strtotime($gallery->caption)) }}</p>
                                    </figcaption>
                                </figure>
                            </li>
                            <!-- end photo item -->
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('js')
   
@endsection