@extends('adminlte::page')

@section('title', 'Blogs')

@section('css')

@stop

@section('content_header')
    <h1>
      Blogs
      <div class="pull-right">
        <a class="btn btn-success" href="{{ route('dashboard.blogs.create') }}" title="Add a New Blog"><i class="fa fa-fw fa-plus" aria-hidden="true"></i> Write New Blog</a>
      </div>
    </h1>
@stop

@section('content')
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>Title</th>
            <th>Category</th>
            @handheld @elsehandheld <th width="30%">Body</th> @endhandheld
            <th>Image</th>
            <th>Date Published</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($blogs as $blog)
          <tr>
            <td>
              <a href="{{ route('blog.single', $blog->slug) }}" target="_blank">{{ $blog->title }}</a><br/>
              @if($blog->status == 1)
                <span class="badge" style="background: #D73925;"><i class="fa fa-check"></i> Published</span>
              @else
                <span class="badge"><i class="fa fa-bell-slash-o"></i> Unpublished</span>
              @endif
              
            </td>
            <td><span class="label label-success">{{ $blog->category->name }}</span></td>
            @handheld

            @elsehandheld
            <td>
              @if(strlen(strip_tags($blog->body))>100)
                  {{ mb_substr(strip_tags($blog->body), 0, stripos($blog->body, " ", stripos(strip_tags($blog->body), " ")+100))." [...] " }}

              @else
                  {{ strip_tags($blog->body) }}
              @endif
            </td>
            @endhandheld
            <td>
              @if($blog->featured_image != null && file_exists(public_path('images/blogs/' . $blog->featured_image)))
              <img src="{{ asset('images/blogs/'.$blog->featured_image)}}" style="height: 40px; width: auto;" />
              @else
              <img src="{{ asset('images/blogs/default.jpg')}}" style="height: 40px; width: auto;" />
              @endif
            </td>
            <td>{{ date('F d, Y h:i A', strtotime($blog->created_at)) }}</td>
            <td>
              <a class="btn btn-sm btn-primary" href="{{ route('dashboard.blogs.edit', $blog->id) }}" title="Edit Blog"><i class="fa fa-pencil"></i></a>

              <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $blog->id }}" data-backdrop="static" title="Delete Blog"><i class="fa fa-trash-o"></i></button>
              <!-- Delete Modal -->
              <!-- Delete Modal -->
              <div class="modal fade" id="deleteModal{{ $blog->id }}" role="dialog">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header modal-header-danger">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Delete Blog</h4>
                    </div>
                    <div class="modal-body">
                      Confirm Delete the Blog<br/><big><b>{{ $blog->title }}</b></big>
                    </div>
                    <div class="modal-footer">
                      {!! Form::model($blog, ['route' => ['dashboard.blogs.delete', $blog->id], 'method' => 'DELETE', 'class' => 'form-default', 'enctype' => 'multipart/form-data']) !!}
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

    {{ $blogs->links() }}

@stop

@section('js')

@stop