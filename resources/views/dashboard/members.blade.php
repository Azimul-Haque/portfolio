@extends('adminlte::page')

@section('title', 'IIT Alumni | Members')

@section('css')

@stop

@section('content_header')
    <h1>
      Members
      <div class="pull-right">
        
      </div>
    </h1>
@stop

@section('content')
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email & Phone</th>
          <th>Degree, Batch & Roll</th>
          <th>Job & Designation</th>
          <th>Photo</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @php $addmodalflag = 0; $editmodalflag = 0; @endphp
        @foreach($members as $members)
        <tr>
          <td>{{ $members->name }}</td>
          <td>{{ $members->email }}<br/>{{ $members->phone }}</td>
          <td>{{ $members->degree }} {{ $members->batch }}, {{ $members->roll }}</td>
          <td>{{ $members->designation }}<br/>{{ $members->current_job }}</td>
          <td>
            @if($members->image != null)
            <img src="{{ asset('images/users/'.$members->image)}}" style="height: 40px; width: auto;" />
            @else
            <img src="{{ asset('images/user.png')}}" style="height: 40px; width: auto;" />
            @endif
          </td>
          <td>
            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteMemberModal{{ $members->id }}" data-backdrop="static" title="Delete Application" disabled=""><i class="fa fa-trash-o"></i></button>
            <!-- Delete Member Modal -->
            <!-- Delete Member Modal -->
            <div class="modal fade" id="deleteMemberModal{{ $members->id }}" role="dialog">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header modal-header-danger">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete Member</h4>
                  </div>
                  <div class="modal-body">
                    Confirm Delete the member of <b>{{ $members->name }}</b>
                  </div>
                  <div class="modal-footer">
                    {!! Form::model($members, ['route' => ['dashboard.deletemember', $members->id], 'method' => 'DELETE', 'class' => 'form-default', 'enctype' => 'multipart/form-data']) !!}
                        {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
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


    
@stop

@section('js')

@stop