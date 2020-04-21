@extends('adminlte::page')

@section('title', 'Add New Book')

@section('css')
  {{-- <link rel="stylesheet" type="text/css" href="{{ asset('vendor/summernote/summernote.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/summernote/summernote-bs3.css') }}"> --}}
@stop

@section('content_header')
    <h1>
      Add New Book
      <div class="pull-right">
        {{-- <a class="btn btn-success" href="{{ route('dashboard.books.create') }}" title="Add a New Book"><i class="fa fa-fw fa-plus" aria-hidden="true"></i> Write New Book</a> --}}
      </div>
    </h1>
@stop

@section('content')
    <div class="row">
      <div class="col-md-10">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">
              <i class="fa fa-book"></i> Add New Book Form
            </h3>
          </div>

          {!! Form::open(['route' => 'dashboard.books.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <label for="title">Name of the Book *</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Name of the Book" required="">
              </div>
              <div class="col-md-6">
                <label for="serial">Serial Number (For Web Page) *</label>
                <input type="number" name="serial" id="serial" class="form-control" value="{{ old('serial') }}" placeholder="Serial of the Book" required="">
              </div>
            </div>

            <br/>
            <div class="row">
              <div class="col-md-12">
                <label for="link">Buy Link (Optional)</label>
                <input type="text" name="link" id="link" class="form-control" value="{{ old('link') }}" placeholder="Buy Link of the Book (Optional)">
              </div>
            </div>

            <br/>
            <div class="row">
              <div class="col-md-12">
                <label for="description">Description *</label>
                <textarea type="text" name="description" id="description" class="form-control" required="" placeholder="Description of the Book" style="min-height: 200px;">{{ old('description') }}</textarea>
              </div>
            </div>

            <br/>
            <div class="row">
              <div class="col-md-6">
                <label>Cover of the Book (400Kb Max): (Optional)</label>
                <input type="file" id="image" name="image" class="form-control">
              </div>
              <div class="col-md-6">
                <img src="{{ asset('images/blank_book.jpg') }}" id='img-upload' style="height: 200px; width: auto; padding: 5px;" class="img-responsive" />
              </div>
            </div>
          </div>
          <div class="box-footer">
            <button class="btn btn-success" type="submit">Submit Book</button>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
@stop

@section('js')
  {{-- <script type="text/javascript" src="{{ asset('vendor/summernote/summernote.min.js') }}"></script> --}}
  
  <script>
      // $(document).ready(function(){
      //     $('.summernote').summernote({
      //         placeholder: 'Write Book Post',
      //         tabsize: 2,
      //         height: 250,
      //         dialogsInBody: true
      //     });
      //     $('div.note-group-select-from-files').remove();
      // });
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
                $("#img-upload").attr('src', '{{ asset('images/blank_book.jpg') }}');
              }, 1000);
          }
      });

    });
  </script>
@stop