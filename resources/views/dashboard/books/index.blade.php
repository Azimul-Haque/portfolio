@extends('adminlte::page')

@section('title', 'Books')

@section('css')

@stop

@section('content_header')
    <h1>
      Books
      <div class="pull-right">
        <a class="btn btn-success" href="{{ route('dashboard.books.create') }}" title="Add a New Blog"><i class="fa fa-fw fa-plus" aria-hidden="true"></i> Add New Book</a>
      </div>
    </h1>
@stop

@section('content')
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>Book Name</th>
            @handheld @elsehandheld <th width="30%">Description</th> @endhandheld
            <th>Cover</th>
            <th>Serial</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($books as $book)
          <tr>
            <td>{{ $book->name }}</td>
            @handheld

            @elsehandheld
            <td>
              @if(strlen(strip_tags($book->description))>100)
                  {{ mb_substr(strip_tags($book->description), 0, stripos($book->description, " ", stripos(strip_tags($book->description), " ")+100))." [...] " }}

              @else
                  {{ strip_tags($book->description) }}
              @endif
            </td>
            @endhandheld
            <td>
              @if($book->image != null && file_exists(public_path('images/books/' . $book->image)))
              <img src="{{ asset('images/books/'.$book->image)}}" style="height: 40px; width: auto;" />
              @else
              <img src="{{ asset('images/books/default.jpg')}}" style="height: 40px; width: auto;" />
              @endif
            </td>
            <td>{{ $book->serial }}</td>
            <td>
              <a class="btn btn-sm btn-primary" href="{{ route('dashboard.books.edit', $book->id) }}" title="Edit Book"><i class="fa fa-pencil"></i></a>

              <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $book->id }}" data-backdrop="static" title="Delete Book"><i class="fa fa-trash-o"></i></button>
              <!-- Delete Modal -->
              <!-- Delete Modal -->
              <div class="modal fade" id="deleteModal{{ $book->id }}" role="dialog">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header modal-header-danger">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Delete Book</h4>
                    </div>
                    <div class="modal-body">
                      Confirm Delete the Book<br/><big><b>{{ $book->name }}</b></big>
                    </div>
                    <div class="modal-footer">
                      {!! Form::model($book, ['route' => ['dashboard.books.delete', $book->id], 'method' => 'DELETE', 'class' => 'form-default', 'enctype' => 'multipart/form-data']) !!}
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

    {{ $books->links() }}

@stop

@section('js')

@stop