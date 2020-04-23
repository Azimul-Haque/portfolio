@extends('adminlte::page')

@section('title', 'Atique Riyad')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
    	<div class="col-md-3">
    		<div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-file-text-o"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Blogs</span>
                  <span class="info-box-number">
                    {{ $totalblogs }}
                  </span>
                  <span class="info-box-text">
                  	<a href="{{ route('dashboard.blogs') }}">See More</a>
                  </span>
                </div>
                <!-- /.info-box-content -->
            </div>
		</div>
		<div class="col-md-3">
			<div class="info-box">
	            <span class="info-box-icon bg-red"><span class="fa fa-book"></span></span>

	            <div class="info-box-content">
	              <span class="info-box-text">Total Books</span>
	              <span class="info-box-number">
	                {{ $totalbooks }}
	              </span>
	              <span class="info-box-text">
	              	<a href="{{ route('dashboard.books') }}">See More</a>
	              </span>
	            </div>
	            <!-- /.info-box-content -->
	        </div>
		</div>
		<div class="col-md-3">
			<div class="info-box">
	            <span class="info-box-icon bg-blue"><span class="fa fa-picture-o"></span></span>

	            <div class="info-box-content">
	              <span class="info-box-text">Total Photos</span>
	              <span class="info-box-number"> 
	                {{ $totalphotos }}
	              </span>
	              <span class="info-box-text">
	              	<a href="{{ route('dashboard.gallery') }}">See More</a>
	              </span>
	            </div>
	            <!-- /.info-box-content -->
	        </div>
		</div>
		<div class="col-md-3">
			<div class="info-box">
	            <span class="info-box-icon bg-yellow"><i class="fa fa-file-video-o"></i></span>

	            <div class="info-box-content">
	              <span class="info-box-text">Total Multimedia</span>
	              <span class="info-box-number"> 
	                {{ $totalmultimedia }}
	              </span>
	              <span class="info-box-text">
	              	<a href="{{ route('dashboard.multimedia') }}">See More</a>
	              </span>
	            </div>
	            <!-- /.info-box-content -->
	        </div>
		</div>
    </div>

    <div class="row">
    	<div class="col-md-3">
    		<div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-question-circle-o"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total FAQs</span>
                  <span class="info-box-number">
                    {{ $totalfaqs }}
                  </span>
                  <span class="info-box-text">
                  	<a href="{{ route('dashboard.faq') }}">See More</a>
                  </span>
                </div>
                <!-- /.info-box-content -->
            </div>
		</div>
		<div class="col-md-3">
			<div class="info-box">
	            <span class="info-box-icon bg-red"><span class="fa fa-envelope-o"></span></span>

	            <div class="info-box-content">
	              <span class="info-box-text">Total Messages</span>
	              <span class="info-box-number">
	                {{ $totalformmessages }}
	              </span>
	              <span class="info-box-text">
	              	<a href="{{ route('dashboard.messages') }}">See More</a>
	              </span>
	            </div>
	            <!-- /.info-box-content -->
	        </div>
		</div>
    </div>
@stop