@extends('adminlte::page')

@section('title', 'Create New Blog')

@section('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/summernote/summernote.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/summernote/summernote-bs3.css') }}">
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
        <div class="col-md-10">
          <label for="title">Title of the Blog *</label>
          <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" placeholder="Title of the Blog" required="">
        </div>
        {{-- <div class="col-md-5">
          <label for="slug">URL Slug *</label>
          <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug of the Blog" required="">
        </div> --}}
      </div>

      <br/>
      <div class="row">
        <div class="col-md-5">
          <label for="category_id">Select Category *</label>
          <select name="category_id" id="category_id" class="form-control" required="">
              <option value="" selected="" disabled="">Category</option>
              @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
          </select>
        </div>
        <div class="col-md-5">
          <label for="title">Publish Status *</label><br/>
          <label class="radio-inline">
            <input type="radio" name="status" checked>Published
          </label>
          <label class="radio-inline">
            <input type="radio" name="status">Unpublished
          </label>
        </div>
      </div>

      <br/>
      <div class="row">
        <div class="col-md-10">
          <label for="body">Body *</label>
          <textarea type="text" name="body" id="body" class="summernote" required=""></textarea>
        </div>
      </div>

      <div class="row">
        <div class="col-md-5">
          <label>Featured Image (600 X 315 &amp; 400Kb Max): (Optional)</label>
          <input type="file" id="image" name="featured_image" class="form-control">
        </div>
        <div class="col-md-5">
          <img src="{{ asset('images/600x315.png')}}" id='img-upload' style="height: 200px; width: auto; padding: 5px;" class="img-responsive" />
        </div>
      </div>

      <button class="btn btn-success" type="submit">Submit Blog</button>
    {!! Form::close() !!}
@stop

@section('js')
  <script type="text/javascript" src="{{ asset('vendor/summernote/summernote.min.js') }}"></script>
  
  <script>
      $(document).ready(function(){
          $('.summernote').summernote({
              placeholder: 'Write Blog Post',
              tabsize: 2,
              height: 200,
              dialogsInBody: true
          });
          $('div.note-group-select-from-files').remove();
      });
  </script>

  <script type="text/javascript">
    $(document).ready( function() {
      $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
      });

      $('.btn-file :file').on('fileselect', function(event, label) {
          var input = $(this).parents('.input-group').find(':text'),
              log = label;
          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }
      });
      function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                  $('#img-upload').attr('src', e.target.result);
              }
              reader.readAsDataURL(input.files[0]);
          }
      }
      $("#image").change(function(){
          readURL(this);
          var filesize = parseInt((this.files[0].size)/1024);
          if(filesize > 400) {
            $("#image").val('');
            toastr.warning('File size is: '+filesize+' Kb. try uploading less than 400Kb', 'WARNING').css('width', '400px;');
              setTimeout(function() {
                $("#img-upload").attr('src', '{{ asset('images/600x315.png') }}');
              }, 1000);
          }
      });

    });
  </script>
@stop