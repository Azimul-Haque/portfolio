@extends('adminlte::page')

@section('title', 'IIT Alumni | Applications')

@section('css')

@stop

@section('content_header')
    <h1>
      Applications
      <div class="pull-right">
        <a class="btn btn-success" href="{{ route('index.application') }}" target="_blank"><i class="fa fa-fw fa-plus" aria-hidden="true"></i> Add Member</a>
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
        @foreach($applications as $application)
        <tr>
          <td>{{ $application->name }}</td>
          <td>{{ $application->email }}<br/>{{ $application->phone }}</td>
          <td>{{ $application->degree }} {{ $application->batch }}, {{ $application->roll }}</td>
          <td>{{ $application->designation }}<br/>{{ $application->current_job }}</td>
          <td>
            @if($application->image != null)
            <img src="{{ asset('images/users/'.$application->image)}}" style="height: 40px; width: auto;" />
            @else
            <img src="{{ asset('images/user.png')}}" style="height: 40px; width: auto;" />
            @endif
          </td>
          <td>
            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#approveMemberModal{{ $application->id }}" data-backdrop="static" title="Approve Application"><i class="fa fa-check"></i></button>
            <!-- Approve Application Modal -->
            <!-- Approve Application Modal -->
            <div class="modal fade" id="approveMemberModal{{ $application->id }}" role="dialog">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header modal-header-success">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Approve Application</h4>
                  </div>
                  <div class="modal-body">
                    {!! Form::model($application, ['route' => ['dashboard.approveapplication', $application->id], 'method' => 'PATCH', 'class' => 'form-default', 'enctype' => 'multipart/form-data']) !!}
                        Confirm approve this application of <b>{{ $application->name }}</b>?<br/>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group no-margin-bottom">
                                <label for="amount">Amount</label>
                                <input type="text" name="amount" id="amount" class="form-control" required="">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group no-margin-bottom">
                                <label for="trxid">Transaction ID (Optional)</label>
                                <input type="text" name="trxid" id="trxid" class="form-control"> 
                            </div>
                          </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                        {!! Form::submit('Approve', array('class' => 'btn btn-success')) !!}
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>
                  {!! Form::close() !!}
                </div>
              </div>
            </div>
            <!-- Approve Application Modal -->
            <!-- Approve Application Modal -->

            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteApplicationModal{{ $application->id }}" data-backdrop="static" title="Delete Application"><i class="fa fa-trash-o"></i></button>
            <!-- Delete Application Modal -->
            <!-- Delete Application Modal -->
            <div class="modal fade" id="deleteApplicationModal{{ $application->id }}" role="dialog">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header modal-header-danger">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete Application</h4>
                  </div>
                  <div class="modal-body">
                    Confirm Delete the application of <b>{{ $application->name }}</b>
                  </div>
                  <div class="modal-footer">
                    {!! Form::model($application, ['route' => ['dashboard.deleteapplication', $application->id], 'method' => 'DELETE', 'class' => 'form-default', 'enctype' => 'multipart/form-data']) !!}
                        {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>
            </div>
            <!-- Delete Application Modal -->
            <!-- Delete Application Modal -->
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>


    
@stop

@section('js')

@stop