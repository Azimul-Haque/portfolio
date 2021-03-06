@extends('layouts.index')
@section('title') Books @endsection

@section('description') I have written some books, worked on several, find all of the books I have worked on and the originals. @endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stylesheet.css') }}">
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
    <!-- head section -->
    <section class="content-top-margin page-title page-title-small bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7 col-sm-12 wow fadeInUp" data-wow-duration="300ms">
                    <!-- page title -->
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
    
    <!-- content section -->
    <section class="wow fadeIn">
        <!-- container -->
        <div class="container">
            @foreach($books as $book)
                <div class="row margin-five" style="min-height: 350px;">
                    <div class="col-md-3 col-sm-6 xs-margin-bottom-five xs-center-col">
                        <p class="no-margin sm-center">
                            @if($book->image != null && file_exists(public_path('images/books/' . $book->image)))
                                <img src="{{ asset('images/books/' . $book->image) }}" class="img-responsive">
                            @else
                                <img src="{{ asset('images/books/1.png') }}" class="img-responsive">
                            @endif
                        </p>
                    </div>
                    <div class="col-md-9 col-sm-6">
                        <span class="title-large font-weight-600 black-text">{{ $book->name }}</span>
                        <div class="separator-line-thick bg-yellow no-margin-lr"></div>
                        <p class="no-margin-bottom text-med text-justify">
                            {{ $book->description }}
                        </p>
                        @if($book->link != null)
                            <a class="highlight-button-dark btn btn-small xs-no-margin no-margin-bottom inner-link sm-margin-bottom-ten" href="{{ $book->link }}" target="_blank">Buy This Book</a>
                        @else
                            
                        @endif
                    </div>
                </div>
                <div class="wide-separator-line no-margin-lr"></div>
            @endforeach

            <center>
                @include('pagination.default', ['paginator' => $books])
            </center>
        </div>
    </section>
@endsection

@section('js')
   
@endsection