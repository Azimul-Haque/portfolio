@extends('adminlte::page')

@section('title', 'Gallery')

@section('css')
  <script type="text/javascript" src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
@stop

@section('content_header')
    <h1>
      Gallery
      <div class="pull-right">
        
      </div>
    </h1>
@stop

@section('content')
  <div class="row">
    <div class="col-md-4">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-image"></i> Add New Photo Form</h3>
        </div>

        {!! Form::open(['route' => 'dashboard.gallery.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="box-body">
          <label for="title">Caption (Optional)</label>
          <input type="text" name="caption" id="caption" class="form-control" value="{{ old('caption') }}" placeholder="Caption of the Photo (Photo)">

          <br/>
          <div class="row">
            <div class="col-md-12">
              <label>Photo (500Kb Max) *</label>
              <input type="file" id="image" name="image" class="form-control" required="">
            </div>
            <div class="col-md-12">
              <center>
                <img src="{{ asset('images/blank_image.jpg') }}" id='img-upload' style="height: 200px; width: auto; padding: 5px;" class="img-responsive" />
              </center>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <button class="btn btn-success" type="submit">Submit Photo</button>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
    <div class="col-md-8">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Image</th>
              <th>Caption</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($galleries as $gallery)
            <tr>
              <td>
                @if($gallery->image != null && file_exists(public_path('images/gallery/' . $gallery->image)))
                <img src="{{ asset('images/gallery/'.$gallery->image)}}" style="height: 60px; width: auto;" />
                @else
                <img src="{{ asset('images/blank_image.jpg')}}" style="height: 60px; width: auto;" />
                @endif
              </td>
              <td>{{ $gallery->caption }}</td>
              <td>
                <button class="btn btn-sm btn-primary"data-toggle="modal" data-target="#editModal{{ $gallery->id }}" data-backdrop="static" title="Edit Faq"><i class="fa fa-pencil"></i></button>
                <!-- Edit Modal -->
                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $gallery->id }}" role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header modal-header-primary">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Faq</h4>
                      </div>
                      {!! Form::model($gallery, ['route' => ['dashboard.gallery.update', $gallery->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                      <div class="modal-body">
                        <label for="title">Caption (Optional)</label>
                        <input type="text" name="caption" id="caption" class="form-control" value="{{ $gallery->caption }}" placeholder="Caption of the Photo (Photo)">

                        <br/>
                        <div class="row">
                          <div class="col-md-12">
                            <label>Photo (500Kb Max) *</label>
                            <input type="file" id="image{{ $gallery->id }}" name="image" class="form-control">
                          </div>
                          <div class="col-md-12">
                            <center>
                              <img src="{{ asset('images/gallery/' . $gallery->image) }}" id='img-upload{{ $gallery->id }}' style="height: 200px; width: auto; padding: 5px;" class="img-responsive" />
                            </center>
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
                                $('#img-upload{{ $gallery->id }}').attr('src', e.target.result);
                            }
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                    $("#image{{ $gallery->id }}").change(function(){
                        readURL(this);
                        var filesize = parseInt((this.files[0].size)/1024);
                        if(filesize > 500) {
                          $("#image{{ $gallery->id }}").val('');
                          toastr.warning('File size is: '+filesize+' Kb. try uploading less than 500Kb', 'WARNING').css('width', '500px;');
                            setTimeout(function() {
                              $("#img-upload{{ $gallery->id }}").attr('src', '{{ asset('images/blank_image.jpg') }}');
                            }, 1000);
                        }
                    });

                  });
                </script>
                <!-- Edit Modal -->
                <!-- Edit Modal -->

                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $gallery->id }}" data-backdrop="static" title="Delete Photo"><i class="fa fa-trash-o"></i></button>
                <!-- Delete Modal -->
                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal{{ $gallery->id }}" role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header modal-header-danger">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Delete Photo</h4>
                      </div>
                      <div class="modal-body">
                        Confirm Delete the Photo?<br/>
                        <img src="{{ asset('images/gallery/'.$gallery->image)}}" class="img-responsive">
                      </div>
                      <div class="modal-footer">
                        {!! Form::model($gallery, ['route' => ['dashboard.gallery.delete', $gallery->id], 'method' => 'DELETE', 'class' => 'form-default', 'enctype' => 'multipart/form-data']) !!}
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
      {{ $galleries->links() }}
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
          if(filesize > 500) {
            $("#image").val('');
            toastr.warning('File size is: '+filesize+' Kb. try uploading less than 500Kb', 'WARNING').css('width', '500px;');
              setTimeout(function() {
                $("#img-upload").attr('src', '{{ asset('images/blank_image.jpg') }}');
              }, 1000);
          }
      });

    });
  </script>
@stop