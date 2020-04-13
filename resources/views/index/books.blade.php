@extends('layouts.index')
@section('title')
    Books
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
                      {{-- <h1 class="black-text">Books</h1> --}}
                      <span class="text-large letter-spacing-2 black-text font-weight-600 text-uppercase agency-title">Books</span>
                      <!-- end page title -->
                  </div>
                  <div class="col-lg-4 col-md-5 col-sm-12 breadcrumb text-uppercase wow fadeInUp xs-display-none" data-wow-duration="600ms">
                      <!-- breadcrumb -->
                      <ul @desktop class="text-right" @enddesktop>
                          <li><a href="{{ route('index.index') }}">Home</a></li>
                          <li><a href="#">Books</a></li>
                      </ul>
                      <!-- end breadcrumb -->
                  </div>
              </div>

              
          </div>
      </section>
      <!-- end head section -->
      <!-- WHATWEDO section -->
      <section class="border-bottom-light sm-text-center">
          <div class="container">
              <div class="row">
                  <div class="col-md-7 wow fadeInUp" data-wow-duration="400ms"><img src="{{ asset('images/contact2.jpg') }}" alt=""/></div>
                  <div class="col-md-5 wow fadeInUp" data-wow-duration="800ms">
                      <h1 class="title-extra-large font-weight-700 black-text margin-five text-transform-none">What we do</h1>
                      <p class="title-small font-weight-300">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum industry's standard dummy text.</p>
                      <p class="title-small font-weight-300">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                  </div>
              </div>
          </div>
      </section>
      <!-- end WHATWEDO section -->
@endsection

@section('js')
   
@endsection