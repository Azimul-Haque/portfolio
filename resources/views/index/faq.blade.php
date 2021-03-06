@extends('layouts.index')
@section('title') FAQ - Frequently Asked Questions @endsection

@section('description') FAQ - Frequently Asked Questions. Find the answers of mostly asked questions about me or ask more. @endsection

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
                    <span class="text-large letter-spacing-2 black-text font-weight-600 text-uppercase agency-title">Frequently Asked Questions</span>
                    <!-- end page title -->
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 breadcrumb text-uppercase wow fadeInUp xs-display-none" data-wow-duration="600ms">
                    <!-- breadcrumb -->
                    <ul @desktop class="text-right" @enddesktop>
                        <li><a href="{{ route('index.index') }}">Home</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </section>
    <!-- end head section -->
    
    
    <section class="wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 no-padding">
                    <div class="panel-group toggles-style3 no-border">
                        @foreach($faqs as $faq)
                        <!-- faq item -->
                        <div class="panel panel-default" id="collapse-{{ $faq->id }}">
                            <div role="tablist" id="headingOne" class="panel-heading">
                                <a data-toggle="collapse" data-parent="#collapse-{{ $faq->id }}" href="#collapse-{{ $faq->id }}-link">
                                    <h4 class="panel-title">
                                        {{ $faq->question }}
                                        <span class="pull-right">
                                            <i class="fa fa-plus"></i>
                                        </span>
                                    </h4>
                                </a>
                            </div>
                            <div id="collapse-{{ $faq->id }}-link" class="panel-collapse collapse">
                                <div class="panel-body">
                                    {{ $faq->answer }}
                                </div>
                            </div>
                        </div>
                        <!-- end faq item -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end content section -->

    <!-- content section -->
    <section class="fix-background" style="background-image:url('/images/faq.jpg');">
      <div class="container">
          <div class="row">
              <div class="col-md-8 col-sm-12 wow fadeInLeft center-col text-center margin-ten padding-two">
                  <h1 class="white-text">Hello, any more questions?</h1>
                  <div class="faq-search margin-five no-margin-bottom position-relative">
                    {!! Form::open(['route' => 'index.search', 'method' => 'get']) !!}
                        <input type="text" name="search" class="input-round big-input no-margin" placeholder="Search our Help Center..." required="">
                        <button type="submit" class="fa fa-search close-search search-button faq-search-button"></button>
                    {!! Form::close() !!}
                  </div>
              </div>
              <div class="col-md-8 col-sm-12 wow fadeInRight center-col text-center margin-ten padding-two">
                  <h1 class="white-text margin-three">Or, ask me directly!</h1>
                  <a href="{{ route('index.contact') }}" class="btn-small-white btn btn-large button xs-margin-bottom-five fa fa-warning"> Contact Me</a>
              </div>
          </div>
      </div>
    </section>
@endsection

@section('js')
   
@endsection