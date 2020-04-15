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
        @mobile
            .social-icon-large .fa {
                font-size: 25px;
                height: 35px !important;
                width: 35px;
            }
        @endmobile

        .table tr {
            border-bottom:1pt solid #E5E5E5;
        }
        .table tr > td {
            padding: 10px !important;
        }

        @mobile
            .bg-white-opacity-light {
                background-color: rgba(255, 255, 255, 0.3);
            }
        @elsemobile
            .bg-white-opacity-light {
                background-color: rgba(255, 255, 255, .5);
            }
        @endmobile
        
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
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <p class="title-small black-text">Awards can give you a tremendous amount of encouragement to keep getting better, no matter how young or old you are.</p>
                            </div>
                        </div>
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
                    <span class="title-number">Bio</span>
                </div>
                <!-- end section title -->
            </div>
            <div class="row margin-ten no-margin-bottom">
                <div class="col-md-6 col-sm-6 text-center xs-margin-bottom-ten">
                    <img src="/images/bio_2.png" alt="Me"/>
                </div>
                <div class="col-md-6 col-sm-6 sm-margin-bottom-ten">
                    <div class="col-md-12 col-sm-12 no-padding">
                        <p class="text-large text-justify">Hello, I'm a Writer/ Something Else & Front End Developer from Thakurgaon, Bangladesh. I hold a honors degree of Web Design from the World University. Hello, I'm a Writer/ Something Else & Front End Developer from Thakurgaon, Bangladesh. I hold a honors degree of Web Design from the World University.</p>
                        {{-- <ul class="list-line margin-five text-med">
                            <li><span class="font-weight-600">Name:</span><b>A H M Atiqul Haque</b> aka <b>Atique Riyad</b></li>
                            <li><span class="font-weight-600">Email:</span>andrew@gmail.com</li>
                            <li><span class="font-weight-600">Date of birth:</span>23 February</li>
                            <li><span class="font-weight-600">Nationality:</span>Bangladeshi</li>
                        </ul> --}}
                        <br/>
                        <table class="table table-condensed text-med">
                            <tbody>
                                <tr>
                                    <th width="20%">Name</th>
                                    <td width="3%">:</td>
                                    <td><b>A H M Atiqul Haque</b> aka <b>Atique Riyad</b></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>:</td>
                                    <td>andrew@gmail.com</td>
                                </tr>
                                <tr>
                                    <th>Date of birth</th>
                                    <td>:</td>
                                    <td>23 February</td>
                                </tr>
                                <tr>
                                    <th>Nationality</th>
                                    <td>:</td>
                                    <td>Bangladeshi</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-center text-large padding-four no-margin-top">
                          <a href="https://www.facebook.com/" class="text-large btn social-icon social-icon-large button"><i class="fa fa-facebook"></i></a>
                          <a href="https://twitter.com/" class="btn social-icon social-icon-large button"><i class="fa fa-twitter"></i></a>
                          <a href="https://www.linkedin.com/" class="btn social-icon social-icon-large button"><i class="fa fa-instagram"></i></a>
                          <a href="https://www.linkedin.com/" class="btn social-icon social-icon-large button"><i class="fa fa-youtube"></i></a>
                          <a href="https://www.linkedin.com/" class="btn social-icon social-icon-large button"><i class="fa fa-linkedin"></i></a>
                        </div>
                        <center>
                            <a class="highlight-button-dark btn btn-small button" href="#">Download Resume</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <!-- end about us section -->

    @mobile
        <section id="slider" class="wow fadeInUp fix-background" style="background-image:url('/images/pcc.jpg');">
            <div class="bg-dark-gray"></div>
            <div class="container">
                <div class="row">
                    <!-- section title -->
                    <div class="col-md-12 text-center">
                        <span class="title-number opacity-light white-text padding-four">Alma Maters</span>
                    </div>
                    <!-- end section title -->
                </div>
                <div class="row">
                    <div id="owl-demo" class="col-xs-12 owl-carousel owl-theme light-pagination bottom-pagination dark-pagination-without-next-prev-arrow position-relative">
                        <!-- testimonials item -->
                        <div class="item">
                            <div class="education-box-main testimonial-style2 center-col text-center margin-three no-margin-top bg-white-opacity-light">
                                <div class="education-box">
                                    <i class="icon-laptop black-text"></i>
                                    <span class="year text-large gray-text display-block margin-five">2012  - 2014</span>
                                    <span class="university text-uppercase display-block black-text letter-spacing-2 font-weight-600">Boston State University</span>
                                    <div class="separator-line bg-black margin-ten"></div>
                                </div>
                                <div class="namerol"><span class="text-uppercase display-block black-text letter-spacing-2 margin-five no-margin-top">Bachelor of Arts</span>
                                    <p>Lorem Ipsum is simply dummy text of the printing.</p>
                                    <span class="result text-uppercase white-text font-weight-600 letter-spacing-1">Grade A++</span>
                                </div>
                            </div>
                        </div>
                        <!-- end testimonials item -->
                        <!-- testimonials item -->
                        <div class="item">
                            <div class="education-box-main testimonial-style2 center-col text-center margin-three no-margin-top bg-white-opacity-light">
                                <div class="education-box">
                                    <i class="icon-laptop black-text"></i>
                                    <span class="year text-large gray-text display-block margin-five">2012  - 2014</span>
                                    <span class="university text-uppercase display-block black-text letter-spacing-2 font-weight-600">Boston State University</span>
                                    <div class="separator-line bg-black margin-ten"></div>
                                </div>
                                <div class="namerol"><span class="text-uppercase display-block black-text letter-spacing-2 margin-five no-margin-top">Bachelor of Arts</span>
                                    <p>Lorem Ipsum is simply dummy text of the printing.</p>
                                    <span class="result text-uppercase white-text font-weight-600 letter-spacing-1">Grade A++</span>
                                </div>
                            </div>
                        </div>
                        <!-- end testimonials item -->
                        <!-- testimonials item -->
                        <div class="item">
                            <div class="education-box-main testimonial-style2 center-col text-center margin-three no-margin-top bg-white-opacity-light">
                                <div class="education-box">
                                    <i class="icon-laptop black-text"></i>
                                    <span class="year text-large gray-text display-block margin-five">2012  - 2014</span>
                                    <span class="university text-uppercase display-block black-text letter-spacing-2 font-weight-600">Boston State University</span>
                                    <div class="separator-line bg-black margin-ten"></div>
                                </div>
                                <div class="namerol"><span class="text-uppercase display-block black-text letter-spacing-2 margin-five no-margin-top">Bachelor of Arts</span>
                                    <p>Lorem Ipsum is simply dummy text of the printing.</p>
                                    <span class="result text-uppercase white-text font-weight-600 letter-spacing-1">Grade A++</span>
                                </div>
                            </div>
                        </div>
                        <!-- end testimonials item -->
                    </div>
                </div>
            </div>
        </section>
    @elsemobile
        <!-- education section -->
        <section id="education" class="fix-background" style="background-image:url('/images/pcc.jpg');">
            <div class="bg-dark-gray"></div>
            <div class="container">
                <div class="row margin-ten no-margin-top">
                    <!-- section title -->
                    <div class="col-md-12 text-center">
                        <span class="title-number">Alma Maters</span>
                    </div>
                    <!-- end section title -->
                </div>
                <div class="row">
                    <!-- education item -->
                    <div class="col-md-3 col-sm-6 sm-margin-bottom-ten">
                        <div class="education-box-main text-center bg-white-opacity-light">
                            <div class="education-box">
                                <i class="icon-laptop black-text"></i>
                                <span class="year text-large gray-text display-block margin-five">2012  - 2014</span>
                                <span class="university text-uppercase display-block black-text letter-spacing-2 font-weight-600">Boston State University</span>
                                <div class="separator-line bg-black margin-ten"></div>
                            </div>
                            <div class="namerol"><span class="text-uppercase display-block black-text letter-spacing-2 margin-five no-margin-top">Bachelor of Arts</span>
                                <p>Lorem Ipsum is simply dummy text of the printing.</p>
                                <span class="result text-uppercase white-text font-weight-600 letter-spacing-1">Grade A++</span>
                            </div>
                        </div>
                    </div>
                    <!-- end education item -->
                    <!-- education item -->
                    <div class="col-md-3 col-sm-6 sm-margin-bottom-ten">
                        <div class="education-box-main text-center bg-white-opacity-light">
                            <div class="education-box">
                                <i class="icon-video black-text"></i>
                                <span class="year text-large gray-text display-block margin-five">2010  - 2012</span>
                                <span class="university text-uppercase display-block black-text letter-spacing-2 font-weight-600">Boston State University</span>
                                <div class="separator-line bg-black margin-ten"></div>
                            </div>
                            <div class="namerol"><span class="text-uppercase display-block black-text letter-spacing-2 margin-five no-margin-top">Visual Art & Design</span>
                                <p>Lorem Ipsum is simply dummy text of the printing.</p>
                                <span class="result text-uppercase white-text font-weight-600 letter-spacing-1">Grade A++</span>
                            </div>
                        </div>
                    </div>
                    <!-- end education item -->
                    <!-- education item -->
                    <div class="col-md-3 col-sm-6 xs-margin-bottom-ten">
                        <div class="education-box-main text-center bg-white-opacity-light">
                            <div class="education-box">
                                <i class="icon-camera black-text"></i>
                                <span class="year text-large gray-text display-block margin-five">2008  - 2010</span>
                                <span class="university text-uppercase display-block black-text letter-spacing-2 font-weight-600">Boston State University</span>
                                <div class="separator-line bg-black margin-ten"></div>
                            </div>
                            <div class="namerol"><span class="text-uppercase display-block black-text letter-spacing-2 margin-five no-margin-top">Degree of Web Design</span>
                                <p>Lorem Ipsum is simply dummy text of the printing.</p>
                                <span class="result text-uppercase white-text font-weight-600 letter-spacing-1">Grade A++</span>
                            </div>
                        </div>
                    </div>
                    <!-- end education item -->
                    <!-- education item -->
                    <div class="col-md-3 col-sm-6">
                        <div class="education-box-main text-center bg-white-opacity-light">
                            <div class="education-box">
                                <i class="icon-picture black-text"></i>
                                <span class="year text-large gray-text display-block margin-five">2008  - 2006</span>
                                <span class="university text-uppercase display-block black-text letter-spacing-2 font-weight-600">Boston State University</span>
                                <div class="separator-line bg-black margin-ten"></div>
                            </div>
                            <div class="namerol"><span class="text-uppercase display-block black-text letter-spacing-2 margin-five no-margin-top">Visual Art & Graphics</span>
                                <p>Lorem Ipsum is simply dummy text of the printing.</p>
                                <span class="result text-uppercase white-text font-weight-600 letter-spacing-1">Grade A++</span>
                            </div>
                        </div>
                    </div>
                    <!-- end education item -->
                </div>
            </div>
        </section>
        <!-- end education section -->
    @endmobile
@endsection

@section('js')
   
@endsection