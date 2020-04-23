@extends('adminlte::page')

@section('title', 'Form Messages')

@section('css')

@stop

@section('content_header')
    <h1>
      Form Messages
      <div class="pull-right">
        
      </div>
    </h1>
@stop

@section('content')
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
            <th>DateTime</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($messages as $message)
          <tr>
            <td>{{ $message->name }}</td>
            <td>{{ $message->email }}</td>
            <td>{{ $message->phone }}</td>
            <td>{{ $message->message }}</td>
            <td>{{ date('F d, Y h:i A', strtotime($message->created_at)) }}</td>
            <td>
              <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteMemberModal{{ $message->id }}" data-backdrop="static"><i class="fa fa-trash-o"></i></button>
              <!-- Delete Member Modal -->
              <!-- Delete Member Modal -->
              <div class="modal fade" id="deleteMemberModal{{ $message->id }}" role="dialog">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header modal-header-danger">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Delete Member</h4>
                    </div>
                    <div class="modal-body">
                      Confirm delete this message?<br/>
                      <b>{{ $message->name }}</b>({{ $message->phone }})<br/>
                      <b>-{{ $message->message }}</b>
                    </div>
                    <div class="modal-footer">
                      {!! Form::model($message, ['route' => ['dashboard.messages.delete', $message->id], 'method' => 'DELETE', 'class' => 'form-default', 'enctype' => 'multipart/form-data']) !!}
                          {!! Form::submit('Delete Member', array('class' => 'btn btn-danger')) !!}
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      {!! Form::close() !!}
                    </div>
                  </div>
                </div>
              </div>
              <!-- Delete Member Modal -->
              <!-- Delete Member Modal -->
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    {{ $messages->links() }}
@stop

@section('js')

@stop