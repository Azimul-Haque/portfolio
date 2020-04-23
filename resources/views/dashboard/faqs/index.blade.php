@extends('adminlte::page')

@section('title', 'Faq')

@section('css')

@stop

@section('content_header')
    <h1>
      Faq
      <div class="pull-right">
        
      </div>
    </h1>
@stop

@section('content')
  <div class="row">
    <div class="col-md-4">
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
              <textarea name="answer" class="form-control textarea" placeholder="Write the answer" style="min-height: 150px;"></textarea>
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
              <th>Image</th>
              <th>Caption</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($faqs as $faq)
            <tr>
              <td>
                @if($faq->image != null && file_exists(public_path('images/gallery/' . $faq->image)))
                <img src="{{ asset('images/gallery/'.$faq->image)}}" style="height: 60px; width: auto;" />
                @else
                <img src="{{ asset('images/blank_image.jpg')}}" style="height: 60px; width: auto;" />
                @endif
              </td>
              <td>{{ $faq->caption }}</td>
              <td>
                {{-- <a class="btn btn-sm btn-primary" href="{{ route('dashboard.faq.edit', $faq->id) }}" title="Edit Faq"><i class="fa fa-pencil"></i></a> --}}

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
                        <img src="{{ asset('images/gallery/'.$faq->image)}}" class="img-responsive">
                      </div>
                      <div class="modal-footer">
                        {!! Form::model($faq, ['route' => ['dashboard.gallery.delete', $faq->id], 'method' => 'DELETE', 'class' => 'form-default', 'enctype' => 'multipart/form-data']) !!}
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
      {{ $faqs->links() }}
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
@stop