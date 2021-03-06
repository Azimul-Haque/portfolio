@extends('adminlte::page')

@section('title', 'Multimedia')

@section('css')
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
      Multimedia
      <div class="pull-right">
        <a class="btn btn-success" href="{{ route('dashboard.multimedia.create') }}" title="Add a New Blog"><i class="fa fa-fw fa-plus" aria-hidden="true"></i> Add New Multimedia</a>
      </div>
    </h1>
@stop

@section('content')
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>Title</th>
            <th>Type</th>
            <th>Embedded</th>
            <th>Date Published</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($multimedia as $single)
          <tr>
            <td>
              <a href="{{ route('index.multimedia.single', $single->slug) }}" target="_blank">{{ $single->title }}</a><br/>
              @if($single->status == 1)
                <span class="badge" style="background: #D73925;"><i class="fa fa-check"></i> Published</span>
              @else
                <span class="badge"><i class="fa fa-bell-slash-o"></i> Unpublished</span>
              @endif
            </td>
            <td>
              @if($single->type == 1)
                <span class="badge" style="background: #FF0000;"><i class="fa fa-youtube-play"></i> YouTube</span>
              @elseif($single->type == 2)
                <span class="badge" style="background: #B62284;"><i class="fa fa-soundcloud"></i> SoundCloud</span>
              @endif
            </td>
            
            <td>
              @if($single->type == 1)
                <div style="max-width: 120px;">
                  <div class="youtibecontainer">
                    <iframe src="https://www.youtube.com/embed/{{ $single->body }}" frameborder="0" class="youtubeiframe" allowfullscreen></iframe>
                  </div>
                </div>
              @elseif($single->type == 2)
                <h3>
                  <a href="{{ route('index.multimedia.single', $single->slug) }}" target="_blank">
                    <i class="fa fa-soundcloud"></i> SoundCloud
                  </a>
                </h3>
              @endif
            </td>

            <td>{{ date('F d, Y h:i A', strtotime($single->created_at)) }}</td>
            <td>
              <a class="btn btn-sm btn-primary" href="{{ route('dashboard.multimedia.edit', $single->id) }}" title="Edit Multimedia"><i class="fa fa-pencil"></i></a>

              <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $single->id }}" data-backdrop="static" title="Delete Multimedia"><i class="fa fa-trash-o"></i></button>
              <!-- Delete Modal -->
              <!-- Delete Modal -->
              <div class="modal fade" id="deleteModal{{ $single->id }}" role="dialog">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header modal-header-danger">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Delete Multimedia</h4>
                    </div>
                    <div class="modal-body">
                      Confirm Delete the Multimedia<br/><big><b>{{ $single->title }}</b></big>
                    </div>
                    <div class="modal-footer">
                      {!! Form::model($single, ['route' => ['dashboard.multimedia.delete', $single->id], 'method' => 'DELETE', 'class' => 'form-default', 'enctype' => 'multipart/form-data']) !!}
                          {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      {!! Form::close() !!}
                    </div>
                  </div>
                </div>
              </div>
              <!-- Delete Modal -->
              <!-- Delete Modal -->
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    {{ $multimedia->links() }}

@stop

@section('js')

@stop