@extends('adminlte::page')

@section('title', 'Create New Multimedia')

@section('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/summernote/summernote.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/summernote/summernote-bs3.css') }}">
  <style type="text/css">
    .youtibecontainer {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 56.25%;
    }
    .youtubeiframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    .separator-line {
        height: 2px;
        margin: 0 auto;
        width: 30px;
        margin: 3% auto;
    }
  </style>
@stop

@section('content_header')
    <h1>
      Create New Multimedia
      <div class="pull-right">
        {{-- <a class="btn btn-success" href="{{ route('dashboard.multimedia.create') }}" title="Add a New Multimedia"><i class="fa fa-fw fa-plus" aria-hidden="true"></i> Write New Multimedia</a> --}}
      </div>
    </h1>
@stop

@section('content')
  <div class="row">
    <div class="col-md-10">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">
            <i class="fa fa-file-text-o"></i> Create New Multimedia Form
          </h3>
        </div>

        {!! Form::model($multimedia, ['route' => ['dashboard.multimedia.update', $multimedia->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <label for="title">Title of the Multimedia *</label>
              <input type="text" name="title" id="title" class="form-control" value="{{ $multimedia->title }}" placeholder="Title of the Multimedia" required="">
            </div>
            {{-- <div class="col-md-6">
              <label for="slug">URL Slug *</label>
              <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug of the Multimedia" required="">
            </div> --}}
          </div>

          <br/>
          <div class="row">
            <div class="col-md-6">
              <label for="type">Select Type *</label>
              <select name="type" class="form-control" disabled="">
                  <option value="" selected="" disabled="">Category</option>
                  <option value="1" @if($multimedia->type == 1) selected="" @endif>YouTube</option>
                  <option value="2" @if($multimedia->type == 2) selected="" @endif>SoundCloud</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="title">Publish Status *</label><br/>
              <label class="radio-inline">
                <input type="radio" name="status" value="1" @if($multimedia->status == 1) checked="" @endif>Published
              </label>
              <label class="radio-inline">
                <input type="radio" name="status" value="0" @if($multimedia->status == 0) checked="" @endif>Unpublished
              </label>
            </div>
          </div>

          <br/>
          <div class="row">
            @if($multimedia->type == 1)
              <div class="col-md-12" id="">
                <label for="body_youtube_input">YouTube Link *</label>
                <input type="text" name="post_body" id="body_youtube_input" class="form-control" value="https://youtu.be/{{ $multimedia->body }}" placeholder="YouTube video link (URL)" onchange="youtube_parser()" required="">
                <input type="hidden" name="youtube_body_hidden" id="youtube_body_hidden" value="{{ $multimedia->body }}"><br/>
                <div id="youtube_preview" style="max-width: 400px;">
                  <div class="youtibecontainer"> <iframe src="https://www.youtube.com/embed/{{ $multimedia->body }}" frameborder="0" class="youtubeiframe" allowfullscreen></iframe> </div>
                </div>
              </div>
            @elseif($multimedia->type == 2)
              <div class="col-md-12" id="">
                <label for="body_soundcloud_input">SoundCloud Code<br/><small>(Click the &lt;/&gt; button and paste the code)</small> *</label>
                <textarea type="text" name="post_body" id="body_soundcloud_input" class="summernote" required="">{!! $multimedia->body !!}</textarea>
              </div>
            @endif
          </div>
        </div>
        <div class="box-footer">
          <button class="btn btn-success" type="submit">Submit Multimedia</button>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@stop

@section('js')
  <script type="text/javascript" src="{{ asset('vendor/summernote/summernote.min.js') }}"></script>
  
  <script>
      $(document).ready(function(){
          $('.summernote').summernote({
              placeholder: 'Write Multimedia Post',
              tabsize: 2,
              height: 250,
              dialogsInBody: true,
              toolbar: [
                ['view', ['codeview']],
              ]
          });
          $('div.note-group-select-from-files').remove();
      });
  </script>

  <script type="text/javascript">
    function youtube_parser(){
        var regExp = /.*(?:youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=)([^#\&\?]*).*/;
        var match = $('#body_youtube_input').val().match(regExp);
        var youtube_id = (match&&match[1].length==11)? match[1] : false;

        console.log($('#body_youtube_input').val());

        if(youtube_id == false)
        {
          if($(window).width() > 768) {
            toastr.warning('Not a valid YouTube URL! Try Again.', 'WARNING').css('width', '400px');
          } else {
            toastr.warning('Not a valid YouTube URL! Try Again.', 'WARNING').css('width', ($(window).width()-25)+'px');
          }
          $('#body_youtube_input').val(null);
          $('#youtube_body_hidden').val(null);
          $('#youtube_preview').empty();
        } else {
          $('#youtube_body_hidden').val(youtube_id);

          var video_thumbnail = $('<div class="youtibecontainer"> <iframe src="https://www.youtube.com/embed/'+ youtube_id +'" frameborder="0" class="youtubeiframe" allowfullscreen></iframe> </div>');
          $('#youtube_preview').empty();
          $('#youtube_preview').append(video_thumbnail);
        }
        
    }
  </script>
@stop