@extends('layouts.index')
@section('title')
    Search
@endsection

@section('description') Search anything on my website including my blogs, gallery or multimedia. Google will help you to get those on this page. @endsection

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
                    <span class="text-large letter-spacing-2 black-text font-weight-600 text-uppercase agency-title">Search</span>
                    <!-- end page title -->
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 breadcrumb text-uppercase wow fadeInUp xs-display-none" data-wow-duration="600ms">
                    <!-- breadcrumb -->
                    <ul @desktop class="text-right" @enddesktop>
                        <li><a href="{{ route('index.index') }}">Home</a></li>
                        <li><a href="#">Search</a></li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </section>
    <!-- end head section -->
    
    <!-- WHATWEDO section -->
    <section class="border-bottom-light sm-text-center" style="min-height: 500px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 wow fadeInUp" data-wow-duration="400ms">
                  <div class="gcse-search" data-queryParameterName="search"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- end WHATWEDO section -->
@endsection

@section('js')
  <script async src="https://cse.google.com/cse.js?cx=012800888456229161516:ayupmmwnoio"></script>
@endsection