@extends('layouts.index')
@section('title')
    404 Not Found!
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stylesheet.css') }}">
@endsection

@section('content')
    

      <!-- content section -->
      <section class="content-top-margin border-top no-padding-bottom wow fadeIn">
          <div class="container">
              <div class="row">
                  <div class="col-md-10 col-sm-8 col-xs-11 text-center center-col">
                      <p class="not-found-title black-text">404!</p>
                      <p class="text-med text-uppercase letter-spacing-2">The page you were looking for could not be found.</p>
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