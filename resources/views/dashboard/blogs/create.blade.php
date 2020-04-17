@extends('adminlte::page')

@section('title', 'Create New Blog')

@section('css')

@stop

@section('content_header')
    <h1>
      Create New Blog
      <div class="pull-right">
        {{-- <a class="btn btn-success" href="{{ route('dashboard.blogs.create') }}" title="Add a New Blog"><i class="fa fa-fw fa-plus" aria-hidden="true"></i> Write New Blog</a> --}}
      </div>
    </h1>
@stop

@section('content')
    {!! Form::open(['route' => 'dashboard.blogs.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
      <div class="row">
        <div class="col-md-6">
          <label for="title">Title of the Blog *</label>
          <input type="text" name="title" id="title" class="form-control" placeholder="Title of the Blog" required="">
        </div>
        <div class="col-md-6">
          <label for="slug">URL Slug *</label>
          <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug of the Blog" required="">
        </div>
      </div>

      <br/>
      <div class="row">
        <div class="col-md-6">
          <label for="category_id">Select Category *</label>
          <select name="category_id" id="category_id" class="form-control" required="">
              <option value="" selected="" disabled="">Category</option>
              @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
          </select>
        </div>
        <div class="col-md-6">
          <label for="title">Publish Status *</label>
          <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug of the Blog" required="">
        </div>
      </div>


        <div class="form-group no-margin-bottom margin-two">
            
        </div>
        <div class="form-group no-margin-bottom">
            
        </div>
        <div class="form-group no-margin-bottom">
            <label for="body" class="text-uppercase">Body</label>
            <textarea type="text" name="body" id="body" class="summernote" required=""></textarea>
        </div>
        <div class="row margin-three">
          <div class="col-md-8">
              <div class="form-group no-margin-bottom">
                  <label><strong>Featured Image (750 X 430 &amp; 300Kb Max): (Optional)</strong></label>
                  <input type="file" id="image" name="featured_image">
              </div>
          </div>
          <div class="col-md-4">
            <img src="{{ asset('images/600x315.png')}}" id='img-upload' style="height: 200px; width: auto; padding: 5px;" class="img-responsive" />
          </div>
        </div>
        <button class="btn highlight-button-dark btn-bg btn-round margin-two no-margin-right" type="submit">Post Blog</button>
    {!! Form::close() !!}
@stop

@section('js')

@stop