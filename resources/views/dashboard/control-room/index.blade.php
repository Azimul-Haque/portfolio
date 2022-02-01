@extends('adminlte::page')

@section('title', 'Control Room Duty Alert System')

@section('css')

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
                    <th>Action</th>
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
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal{{ $faq->id }}" data-backdrop="static" title="Edit Faq"><i class="fa fa-pencil"></i></button>
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

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-image"></i> Add New Faq Form</h3>
            </div>

            {!! Form::open(['route' => 'dashboard.faq.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="box-body">
                <label for="title">Question *</label>
                <input type="text" name="question" id="question" class="form-control" value="{{ old('question') }}" placeholder="Write the question">

                <br/>
                <div class="row">
                <div class="col-md-12">
                    <label>Answer *</label>
                    <textarea name="answer" class="form-control textarea" placeholder="Write the answer" style="min-height: 150px;">{{ old('answer') }}</textarea>
                </div>
                </div>
            </div>
            <div class="box-footer">
                <button class="btn btn-success" type="submit">Submit Faq</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="col-md-8">
      <div class="table-responsive">
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

    <!-- Edit Modal -->
    <!-- Edit Modal -->
    <div class="modal fade" id="addOfficerModal" role="dialog">
        <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Faq</h4>
            </div>
            {!! Form::open(['route' => 'dashboard.faq.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
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
@stop