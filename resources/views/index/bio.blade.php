@extends('layouts.index')
@section('title')
    Biography
@endsection

@section('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/stylesheet.css') }}"> --}}
    <style type="text/css">
        .separator-line-thick {
            height: 4px;
            margin: 0 auto;
            width: 30px;
            margin: 3% auto;
        }
    </style>
@endsection

@section('content')
    <!-- parallax section -->
    <section class="parallax1 parallax-fix full-screen no-padding scroll-to-down" onclick="scrollToDown()" id="slider">
        <div class="opacity-light bg-gray"></div>
        <img class="parallax-background-img" src="/images/bio_landing.jpg" alt="One of my photos" />
        <div class="container full-screen position-relative">
            <div class="slider-typography">
                <div class="slider-text-middle-main">
                    <div class="slider-text-middle slider-text-middle2 personal-name animated fadeIn">
                        <h1 class="margin-two">About Me</h1>
                        <p class="title-small black-text">Awards can give you a tremendous amount of encouragement to keep getting better, no matter how young or old you are.</p>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!-- end parallax section -->

    <!-- about us section -->
    <section id="features" class="border-bottom no-padding-bottom xs-onepage-section">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-md-12 text-center">
                    <span class="title-number">01</span><h3 class="section-title no-padding">About Me</h3>
                </div>
                <!-- end section title -->
            </div>
            <div class="row margin-ten no-margin-bottom">
                <div class="col-md-6 col-sm-6 text-center xs-margin-bottom-ten">
                    <img src="images/onepage-personal-img.jpg" alt=""/>
                </div>
                <div class="col-md-6 col-sm-6 sm-margin-bottom-ten">
                    <div class="col-md-12 col-sm-12 no-padding">
                        <p class="text-large">Hello, I'm a UI/UX Designer & Front End Developer from Victoria, Australia. I hold a master degree of Web Design from the World University.</p>
                        <ul class="list-line margin-ten text-med">
                            <li><span class="font-weight-600">Name:</span> Andrew Smith</li>
                            <li><span class="font-weight-600">Email:</span>andrew@gmail.com</li>
                            <li><span class="font-weight-600">Phone:</span> (123) - 456-7890</li>
                            <li><span class="font-weight-600">Date of birth:</span> 23 February 1986</li>
                            <li><span class="font-weight-600">Nationality:</span> United States</li>
                        </ul>
                        <a class="highlight-button-dark btn btn-medium button" href="#">Download Resume</a>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <!-- end about us section -->
@endsection

@section('js')
   
@endsection