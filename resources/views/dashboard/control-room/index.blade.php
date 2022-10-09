@extends('adminlte::page')

@section('title', 'Preli Course Duty Alert System')

@section('css')
  <style>
    .select2-close-mask{
        z-index: 2099;
    }
    .select2-dropdown{
        z-index: 3051;
    }
  </style>
  {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datepicker.min.css') }}"> --}}
  <script type="text/javascript" src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
  {{-- <script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> --}}
  <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
@stop

@section('content_header')
    <h1>
      Preli Course Duties
      <div class="pull-right">
        
      </div>
    </h1>
@stop

@section('content')
  <div class="row">
    <div class="col-md-4">
        <div class="table-responsive">
            <h4 style="padding: 10px; margin: 0px;">
                <b>Instructor List</b>
                <div class="pull-right" style="margin: -5px;">
                    <button class="btn btn-sm btn-success" title="Add new Instructor" data-toggle="modal" data-target="#addOfficerModal" data-backdrop="static">
                        <i class="fa fa-user-plus"></i>
                    </button>    
                </div>
            </h4>
            <table class="table">
                <thead>
                <tr>
                    <th>Instructor</th>
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
                              Confirm Delete the Officer?<br/>
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
        <table class="table onlyPrint print ">
          <thead>
            <tr>
              <th>Instructor</th>
              <th>Duties</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($officers as $officer)
            <tr>
              <td>{{ $officer->name }}</td>
              <td>
                @foreach ($officer->officerduties->where('shift', 1) as $duty)
                    <span class="label label-info">{{ date('F d, Y', strtotime($duty->duty_date)) }}</span>
                @endforeach
                <br/>
                @foreach ($officer->officerduties->where('shift', 2) as $duty)
                    <span class="label label-success">{{ date('F d, Y', strtotime($duty->duty_date)) }}</span>
                @endforeach
              </td>
              <td>
                <button class="btn btn-sm btn-primary"data-toggle="modal" data-target="#editDutyModal{{ $officer->id }}" data-backdrop="static" title="Edit Duty"><i class="fa fa-pencil"></i></button>
                <!-- Edit Modal -->
                <!-- Edit Modal -->
                <div class="modal fade" id="editDutyModal{{ $officer->id }}" role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header modal-header-primary">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Duty</h4>
                      </div>
                      {!! Form::model($officer, ['route' => ['dashboard.control-room.updateofficerduty', $officer->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                      <div class="modal-body">
                        <label for="title">Officer *</label>
                        @php
                          $shift1duties = [];
                          $shift2duties = [];
                          foreach($officer->officerduties->where('shift', 1) as $duty) {
                            $shift1duties[] = $duty->duty_date;
                          }
                          foreach($officer->officerduties->where('shift', 2) as $duty) {
                            $shift2duties[] = $duty->duty_date;
                          }
                        @endphp
                        <select name="officer_id" id="officer_id" class="form-control" required readonly>
                          <option value="" disabled selected>Select Officer</option>
                          <option value="{{ $officer->id }}" selected>{{ $officer->name }}</option>
                        </select>

                        <br/>
                        <label for="first_shift_dates{{ $officer->id }}">1st Shift *</label>
                        <select name="first_shift_dates[]" id="first_shift_dates{{ $officer->id }}" class="form-control" multiple required style="width: 100%;">
                          <option disabled>Select Date</option>
                          @php
                            $today = \Carbon\Carbon::createFromFormat('F d, Y', date('F d, Y'));
                          @endphp
                          @for($i=0; $i<60; $i++)
                            <option value="{{ date('Y-m-d', strtotime($today)) }}" @if(in_array(date('Y-m-d', strtotime($today)), $shift1duties)) selected @endif>{{ date('F d, Y', strtotime($today)) }}</option>
                            @php
                              $today = $today->addDay();
                            @endphp
                          @endfor
                        </select>

                        <br/><br/>
                        <label for="second_shift_dates{{ $officer->id }}">2nd Shift *</label>
                        <select name="second_shift_dates[]" id="second_shift_dates{{ $officer->id }}" class="form-control" multiple style="width: 100%;">
                          <option disabled>Select Date</option>
                          @php
                            $today = \Carbon\Carbon::createFromFormat('F d, Y', date('F d, Y'));
                          @endphp
                          @for($i=0; $i<60; $i++)
                            <option value="{{ date('Y-m-d', strtotime($today)) }}" @if(in_array(date('Y-m-d', strtotime($today)), $shift2duties)) selected @endif>{{ date('F d, Y', strtotime($today)) }}</option>
                            @php
                              $today = $today->addDay();
                            @endphp
                          @endfor
                        </select>
                      </div>
                      <div class="modal-footer">
                            {!! Form::submit('Update', array('class' => 'btn btn-primary')) !!}
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      </div>
                      {!! Form::close() !!}
                    </div>
                  </div>
                </div>
                <script>
                  $('#first_shift_dates{{ $officer->id }}').select2({
                    dropdownParent: $("#editDutyModal{{ $officer->id }} .modal-content")
                  });
                  $('#second_shift_dates{{ $officer->id }}').select2({
                    dropdownParent: $("#editDutyModal{{ $officer->id }} .modal-content")
                  });
                </script>
                <!-- Edit Modal -->
                <!-- Edit Modal -->

                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteDutyModal{{ $officer->id }}" data-backdrop="static" title="Delete Duty"><i class="fa fa-trash-o"></i></button>
                <!-- Delete Modal -->
                <!-- Delete Modal -->
                <div class="modal fade" id="deleteDutyModal{{ $officer->id }}" role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header modal-header-danger">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Delete Duty</h4>
                      </div>
                      <div class="modal-body">
                        Confirm Delete the Duty?<br/>
                      </div>
                      <div class="modal-footer">
                        {!! Form::model($officer, ['route' => ['dashboard.control-room.deleteofficerduty', $officer->id], 'method' => 'DELETE', 'class' => 'form-default', 'enctype' => 'multipart/form-data']) !!}
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
  </div>

    <!-- Add Officer Modal -->
    <!-- Add Officer Modal -->
    <div class="modal fade" id="addOfficerModal" role="dialog">
        <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header modal-header-success">
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
                {!! Form::submit('Save', array('class' => 'btn btn-success')) !!}
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
            <div class="modal-header modal-header-success">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add New Duty</h4>
            </div>
            {!! Form::open(['route' => 'dashboard.control-room.storeofficerduty', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="modal-body">
              <label for="title">Officer *</label>
              <select name="officer_id" id="officer_id" class="form-control" required>
                <option value="" disabled selected>Select Officer</option>
                @foreach ($officers as $officer)
                  <option value="{{ $officer->id }}">{{ $officer->name }}</option>
                @endforeach
              </select>

              <br/>
              <label for="first_shift_dates">1st Shift *</label>
              <select name="first_shift_dates[]" id="first_shift_dates" class="form-control" multiple required style="width: 100%;">
                <option disabled>Select Date</option>
                @php
                  $today = \Carbon\Carbon::createFromFormat('F d, Y', date('F d, Y'));
                @endphp
                @for($i=0; $i<60; $i++)
                  <option value="{{ date('Y-m-d', strtotime($today)) }}">{{ date('F d, Y', strtotime($today)) }}</option>
                  @php
                    $today = $today->addDay();
                  @endphp
                @endfor
              </select>

              <br/><br/>
              <label for="second_shift_dates">2nd Shift *</label>
              <select name="second_shift_dates[]" id="second_shift_dates" class="form-control" multiple style="width: 100%;">
                <option disabled>Select Date</option>
                @php
                  $today = \Carbon\Carbon::createFromFormat('F d, Y', date('F d, Y'));
                @endphp
                @for($i=0; $i<60; $i++)
                  <option value="{{ date('Y-m-d', strtotime($today)) }}">{{ date('F d, Y', strtotime($today)) }}</option>
                  @php
                    $today = $today->addDay();
                  @endphp
                @endfor
              </select>
            </div>
            <div class="modal-footer">
                {!! Form::submit('Save', array('class' => 'btn btn-success')) !!}
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
    $('#second_shift_dates').select2({
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