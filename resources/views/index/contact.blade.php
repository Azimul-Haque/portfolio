@extends('layouts.index')
@section('title') Contact Us @endsection

@section('description') Feel free to write to me whatever thought you want to share or any query you have on your mind; I will try to reach you. @endsection

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
                    <span class="text-large letter-spacing-2 black-text font-weight-600 text-uppercase agency-title">Contact Us</span>
                    <!-- end page title -->
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 breadcrumb text-uppercase wow fadeInUp xs-display-none" data-wow-duration="600ms">
                    <!-- breadcrumb -->
                    <ul @desktop class="text-right" @enddesktop>
                        <li><a href="{{ route('index.index') }}">Home</a></li>
                        <li><a href="#">Contact</a></li>
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
                <!-- office address -->
                <div class="col-md-4 col-sm-6 xs-margin-bottom-ten">
                    <p class="text-med text-uppercase letter-spacing-1 black-text font-weight-600">Write to me</p>
                    <p class="text-med">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                    <p class="text-med">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                <!-- end office address -->

                <div class="col-md-6 col-sm-6  col-md-offset-2">
                    {!! Form::open(['route' => 'index.storeformmessage', 'method' => 'POST']) !!}
                        <input name="name" type="text" value="{{ old('name') }}" placeholder="Name *" required="" />
                        <div class="row">
                            <div class="col-md-6">
                                <input name="email" type="email" value="{{ old('email') }}" placeholder="Email *"  required="" />
                            </div>
                            <div class="col-md-6">
                                <input name="phone" type="text" value="{{ old('phone') }}" placeholder="Contact No *"  required="" />
                            </div>
                        </div>
                        <textarea name="message" placeholder="Message *"  required="">{{ old('message') }}</textarea>
                        
                        @php
                          $contact_num1 = rand(1,20);
                          $contact_num2 = rand(1,20);
                          $contact_sum_result_hidden = $contact_num1 + $contact_num2;
                        @endphp
                        <input type="hidden" name="contact_sum_result_hidden" value="{{ $contact_sum_result_hidden }}">
                        <input type="text" name="contact_sum_result" id="" class="form-control" placeholder="{{ $contact_num1 }} + {{ $contact_num2 }} = ?" required="">
                        
                        <button id="" type="submit" class="highlight-button-dark btn btn-small button xs-margin-bottom-five"><i class="fa fa-paper-plane"></i> Send</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>

    <section class="wow fadeIn no-padding">
        <div class="container-fuild">
            <div class="row no-margin">
                <div id="canvas1" class="col-md-12 col-sm-12 no-padding contact-map map">
                    <iframe id="map_canvas1" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d82616.60524822788!2d90.3620565187904!3d23.77686687309586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1586987877985!5m2!1sen!2sbd"></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
   
@endsection