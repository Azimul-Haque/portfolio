@extends('adminlte::page')

@section('title', 'Control Room Duty Alert System')

@section('css')
  <style>
    .select2-close-mask{
        z-index: 2099;
    }
    .select2-dropdown{
        z-index: 3051;
    }
  </style>
  {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
  <script type="text/javascript" src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> --}}
@stop

@section('content_header')
    <h1>
      Control Room Duties
      <div class="pull-right">
        
      </div>
    </h1>
@stop

@section('content')
  <div class="row">
    <div class="col-md-4">
        <div class="table-responsive">
            <h4 style="padding: 10px; margin: 0px;">
                <b>Officer List</b>
                <div class="pull-right" style="margin: -5px;">
                    <button class="btn btn-sm btn-success" title="Add new Officer" data-toggle="modal" data-target="#addOfficerModal" data-backdrop="static">
                        <i class="fa fa-user-plus"></i>
                    </button>    
                </div>
            </h4>
            <table class="table">
                <thead>
                <tr>
                    <th>Officer</th>
                    <th width="30%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($officers as $officer)
                <tr>
                    <td>
                        {{ $officer->name }}<br/>
                        <small><i class="fa fa-phone"></i> {{ $officer->phone }}</small>
                    </td>
                    <td>
                      <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editOfficerModal{{ $officer->id }}" data-backdrop="static" title="Edit Officer"><i class="fa fa-pencil"></i></button>
                      <!-- Edit Modal -->
                      <!-- Edit Modal -->
                      <div class="modal fade" id="editOfficerModal{{ $officer->id }}" role="dialog">
                          <div class="modal-dialog modal-md">
                          <div class="modal-content">
                              <div class="modal-header modal-header-primary">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Edit Officer</h4>
                              </div>
                              {!! Form::model($officer, ['route' => ['dashboard.control-room.updateofficer', $officer->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                                <div class="modal-body">
                                  <label for="title">Name *</label>
                                  <input type="text" name="name" id="name" class="form-control" value="{{ $officer->name }}" placeholder="Write Officer Name" required>

                                  <br/>
                                  <label for="title">Phone *</label>
                                  <input type="text" name="phone" id="phone" class="form-control" value="{{ $officer->phone }}" placeholder="Write Officer Name" required>
                                </div>
                                <div class="modal-footer">
                                    {!! Form::submit('Update', array('class' => 'btn btn-primary')) !!}
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                </div>
                              {!! Form::close() !!}
                          </div>
                          </div>
                      </div>
                      <!-- Edit Modal -->
                      <!-- Edit Modal -->

                      <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteOfficerModal{{ $officer->id }}" data-backdrop="static" title="Delete Officer"><i class="fa fa-trash-o"></i></button>
                      <!-- Delete Modal -->
                      <!-- Delete Modal -->
                      <div class="modal fade" id="deleteOfficerModal{{ $officer->id }}" role="dialog">
                          <div class="modal-dialog modal-md">
                          <div class="modal-content">
                              <div class="modal-header modal-header-danger">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete Officer</h4>
                              </div>
                              <div class="modal-body">
                              Confirm Delete the Faq?<br/>
                              <big><b>{{ $officer->name }}</b></big>
                              </div>
                              <div class="modal-footer">
                              {!! Form::model($officer, ['route' => ['dashboard.control-room.deleteofficer', $officer->id], 'method' => 'DELETE', 'class' => 'form-default', 'enctype' => 'multipart/form-data']) !!}
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
    </div>
    <div class="col-md-8">
      <div class="table-responsive">
        <h4 style="padding: 10px; margin: 0px;">
          <b>Duty List</b>
          <div class="pull-right" style="margin: -5px;">
              <button class="btn btn-sm btn-success" title="Add new Duty" data-toggle="modal" data-target="#addOfficerDutyModal" data-backdrop="static">
                  <i class="fa fa-calendar-plus-o"></i>
              </button>    
          </div>
      </h4>
        <table class="table">
          <thead>
            <tr>
              <th>Question</th>
              <th>Answer</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($officerduties as $faq)
            <tr>
              <td>{{ $faq->question }}</td>
              <td>{{ $faq->answer }}</td>
              <td>
                <button class="btn btn-sm btn-primary"data-toggle="modal" data-target="#editModal{{ $faq->id }}" data-backdrop="static" title="Edit Faq"><i class="fa fa-pencil"></i></button>
                <!-- Edit Modal -->
                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $faq->id }}" role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header modal-header-primary">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Faq</h4>
                      </div>
                      {!! Form::model($faq, ['route' => ['dashboard.faq.update', $faq->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                      <div class="modal-body">
                        <label for="title">Question *</label>
                        <input type="text" name="question" id="question" class="form-control" value="{{ $faq->question }}" placeholder="Write the question">

                        <br/>
                        <div class="row">
                          <div class="col-md-12">
                            <label>Answer *</label>
                            <textarea name="answer" class="form-control textarea" placeholder="Write the answer" style="min-height: 150px;">{{ $faq->answer }}</textarea>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                            {!! Form::submit('Update', array('class' => 'btn btn-primary')) !!}
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      </div>
                      {!! Form::close() !!}
                    </div>
                  </div>
                </div>
                <!-- Edit Modal -->
                <!-- Edit Modal -->

                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $faq->id }}" data-backdrop="static" title="Delete Faq"><i class="fa fa-trash-o"></i></button>
                <!-- Delete Modal -->
                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal{{ $faq->id }}" role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header modal-header-danger">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Delete Faq</h4>
                      </div>
                      <div class="modal-body">
                        Confirm Delete the Faq?<br/>
                        <big><b>{{ $faq->question }}</b></big>
                      </div>
                      <div class="modal-footer">
                        {!! Form::model($faq, ['route' => ['dashboard.faq.delete', $faq->id], 'method' => 'DELETE', 'class' => 'form-default', 'enctype' => 'multipart/form-data']) !!}
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
      {{ $officerduties->links() }}
    </div>
  </div>

    <!-- Add Officer Modal -->
    <!-- Add Officer Modal -->
    <div class="modal fade" id="addOfficerModal" role="dialog">
        <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add New Officer</h4>
            </div>
            {!! Form::open(['route' => 'dashboard.control-room.storeofficer', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="modal-body">
              <label for="title">Name *</label>
              <input type="text" name="name" id="name" class="form-control" value="" placeholder="Write Officer Name" required>

              <br/>
              <label for="title">Phone *</label>
              <input type="text" name="phone" id="phone" class="form-control" value="" placeholder="Write Officer Phone Number" required>
            </div>
            <div class="modal-footer">
                {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
            {!! Form::close() !!}
        </div>
        </div>
    </div>
    <!-- Add Officer Modal -->
    <!-- Add Officer Modal -->

    <!-- Add Officer Duty Modal -->
    <!-- Add Officer Duty Modal -->
    <div class="modal fade" id="addOfficerDutyModal" role="dialog">
        <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add New Duty</h4>
            </div>
            {!! Form::open(['route' => 'dashboard.control-room.storeofficer', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="modal-body">
              <label for="title">Officer *</label>
              <select name="officer_id" id="officer_id" class="form-control" required>
                <option value="" disabled selected>Select Officer</option>
                @foreach ($officers as $officer)
                  <option value="{{ $officer->id }}">{{ $officer->name }}</option>
                @endforeach
              </select>

              <br/>
              <label for="title">1st Shift *</label>
              <select name="first_shift_dates[]" id="first_shift_dates" class="form-control" multiple required style="width: 100%;">
                <option disabled>Select Data</option>
                <option value="1">123123</option>
                <option value="2">1223423</option>
              </select>

              <br/><br/>
              <label for="title">2nd Shift *</label>
              <input type="text" name="second_shift_dates[]" id="second_shift_dates" class="form-control" value="" placeholder="Second Shift Dates" required>
            </div>
            <div class="modal-footer">
                {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
            {!! Form::close() !!}
        </div>
        </div>
    </div>
    <!-- Add Officer Duty Modal -->
    <!-- Add Officer Duty Modal -->
@stop

@section('js')
  <script>
    $('#first_shift_dates').select2({
      dropdownParent: $("#addOfficerDutyModal .modal-content")
    });
  </script>
  {{-- <script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script>
    $(function() {
      $("#first_shift_dates").datepicker({
        format: 'MM dd, yyyy',
        todayHighlight: true,
        autoclose: true,
        onSelect: function(d) {
            var i = $.inArray(d, days);

            if (i == -1)
                days.push(d);
            else
                days.splice(i, 1);
        },
        beforeShowDay: function(d) {
            return ([true, $.inArray($.datepicker.format('yymmdd'), days) == -1 ? 'ui-state-free' : 'ui-state-busy']);
        }
      });
      $("#second_shift_dates").datepicker({
        format: 'MM dd, yyyy',
        todayHighlight: true,
        autoclose: true,
      });
    });
  </script> --}}
@stop