@extends('layouts.index')
@section('title')
    404 Not Found!
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
                    <span class="text-large letter-spacing-2 black-text font-weight-600 text-uppercase agency-title">404 Not Found!</span>
                    <!-- end page title -->
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 breadcrumb text-uppercase wow fadeInUp xs-display-none" data-wow-duration="600ms">
                    <!-- breadcrumb -->
                    <ul @desktop class="text-right" @enddesktop>
                        <li><a href="{{ route('index.index') }}">Home</a></li>
                        <li><a href="#">404 Not Found!</a></li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </section>
    <!-- end head section -->

      <!-- content section -->
      <section class="no-padding-bottom wow fadeIn">
          <div class="container">
              <div class="row">
                  <div class="col-md-10 col-sm-8 col-xs-11 text-center center-col">
                      <p class="not-found-title black-text">404!</p>
                      <p class="text-med text-uppercase letter-spacing-2">The page you were looking<br> for could not be found.</p>
                      <a class="highlight-button-dark btn btn-small no-margin-right" href="/">Go to home page</a>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-10 col-sm-8 col-xs-11 center-col">
                      <img src="{{ asset('images/404.png') }}" alt="404 Image"/>
                  </div>
              </div>
          </div>
      </section>
      <!-- end content section -->
@endsection

@section('js')
   
@endsection