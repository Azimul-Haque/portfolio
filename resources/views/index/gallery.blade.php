@extends('layouts.index')
@section('title')
    Gallery
@endsection

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
                      <h1 class="black-text">Gallery...</h1>
                      <!-- end page title -->
                  </div>
                  <div class="col-lg-4 col-md-5 col-sm-12 breadcrumb text-uppercase wow fadeInUp xs-display-none" data-wow-duration="600ms">
                      <!-- breadcrumb -->
                      <ul>
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
                  <div class="col-md-7 col-sm-10 center-col text-center margin-ten no-margin-top">
                      <h6 class="no-margin-top margin-ten xs-margin-bottom-seven"><strong class="black-text">Masonry - 3 Columns</strong></h6>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12 grid-gallery overflow-hidden no-padding" >
                      <ul class="grid masonry-items lightbox-gallery">
                          <!-- photo item -->
                          <li class="wow">
                              <a href="{{ asset('images/gallery/1.jpg') }}" title="Lightbox gallery image title..."><img src="{{ asset('images/gallery/1.jpg') }}" alt=""></a>
                          </li>
                          <!-- end photo item -->
                          <!-- photo item -->
                          <li class="wow">
                              <a href="{{ asset('images/gallery/2.jpg') }}" title="Lightbox gallery image title..."><img src="{{ asset('images/gallery/2.jpg') }}" alt=""></a>
                          </li>
                          <!-- end photo item -->
                          <!-- photo item -->
                          <li class="wow">
                              <a href="{{ asset('images/gallery/3.jpg') }}" title="Lightbox gallery image title..."><img src="{{ asset('images/gallery/3.jpg') }}" alt=""></a>
                          </li>
                          <!-- end photo item -->
                          <!-- photo item -->
                          <li class="wow">
                              <a href="{{ asset('images/gallery/4.jpg') }}" title="Lightbox gallery image title..."><img src="{{ asset('images/gallery/4.jpg') }}" alt=""></a>
                          </li>
                          <!-- end photo item -->
                          <!-- photo item -->
                          <li class="wow">
                              <a href="{{ asset('images/gallery/5.jpg') }}" title="Lightbox gallery image title..."><img src="{{ asset('images/gallery/5.jpg') }}" alt=""></a>
                          </li>
                          <!-- end photo item -->
                          <!-- photo item -->
                          <li class="wow">
                              <a href="{{ asset('images/gallery/6.jpg') }}" title="Lightbox gallery image title..."><img src="{{ asset('images/gallery/6.jpg') }}" alt=""></a>
                          </li>
                          <!-- end photo item -->
                          <!-- photo item -->
                          <li class="wow">
                              <a href="{{ asset('images/gallery/7.jpg') }}" title="Lightbox gallery image title..."><img src="{{ asset('images/gallery/7.jpg') }}" alt=""></a>
                          </li>
                          <!-- end photo item -->
                      </ul>
                  </div>

              </div>
          </div>
      </section>
@endsection

@section('js')
   
@endsection