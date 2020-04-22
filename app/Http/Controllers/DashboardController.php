<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Adhocmember;
use App\User;
use App\Blog;
use App\Category;
use App\Like;
use App\Book;
use App\Gallery;
use App\Multimedia;
use App\Faq;
use App\Formmessage;

use DB, Hash, Auth, Image, File, Session, Cookie;
use Purifier;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index');
    }

    public function getBlogs()
    {
        $blogs = Blog::orderBy('id', 'desc')->paginate(7);
        return view('dashboard.blogs.index')
                            ->withBlogs($blogs);
    }

    public function createBlog()
    {
        $categories = Category::all();
        return view('dashboard.blogs.create')
                        ->withCategories($categories);
    }

    public function storeBlog(Request $request)
    {
        $this->validate($request,array(
            'title'          => 'required|max:255',
            'body'           => 'required',
            'category_id'    => 'required|integer',
            'status'         => 'required|integer',
            'featured_image' => 'sometimes|image|max:400'
        ));

        //store to DB
        $blog              = new Blog;
        $blog->title       = $request->title;
        $blog->user_id     = Auth::user()->id;
        $blog->slug        = str_replace(['?',':', '\\', '/', '*', ' '], '-', $request->title). '-' .time();
        $blog->category_id = $request->category_id;
        $blog->status = $request->status;
        $blog->body        = Purifier::clean($request->body, 'youtube');
        
        // image upload
        if($request->hasFile('featured_image'))
        {
            $image      = $request->file('featured_image');
            $filename   = 'featured_image_' . random_string(4) . time() .'.' . $image->getClientOriginalExtension();
            $location   = public_path('images/blogs/'. $filename);
            Image::make($image)->fit(600, 315)->save($location);
            $blog->featured_image = $filename;
        }

        $blog->save();

        //redirect
        Session::flash('success', 'Saved Successfully!');
        return redirect()->route('dashboard.blogs');
    }

    public function editBlog($id)
    {
        $blog = Blog::find($id);
        $categories = Category::all();

        return view('dashboard.blogs.edit')
                        ->withBlog($blog)
                        ->withCategories($categories);
    }

    public function updateBlog(Request $request, $id)
    {
        $blog = Blog::find($id);

        $this->validate($request,array(
            'title'          => 'required|max:255',
            'body'           => 'required',
            'category_id'    => 'required|integer',
            'status'         => 'required|integer',
            'featured_image' => 'sometimes|image|max:400'
        ));

        //store to DB
        if($blog->title != $request->title) {
            $blog->slug = str_replace(['?',':', '\\', '/', '*', ' '], '-', $request->title). '-' .time();
        }
        $blog->title = $request->title;
        $blog->category_id = $request->category_id;
        $blog->status = $request->status;
        $blog->body = Purifier::clean($request->body, 'youtube');
        
        // image upload
        if($request->hasFile('featured_image'))
        {
            $image_path = public_path('images/blogs/'. $blog->featured_image);
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $image      = $request->file('featured_image');
            $filename   = 'featured_image_' . random_string(4) . time() .'.' . $image->getClientOriginalExtension();
            $location   = public_path('images/blogs/'. $filename);
            Image::make($image)->fit(600, 315)->save($location);
            $blog->featured_image = $filename;
        }

        $blog->save();

        //redirect
        Session::flash('success', 'Updated Successfully!');
        return redirect()->route('dashboard.blogs');
    }

    public function deleteBlog($id)
    {
        $blog = Blog::find($id);
        $image_path = public_path('images/blogs/'. $blog->featured_image);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $blog->delete();

        Session::flash('success', 'Deleted Successfully!');
        return redirect()->route('dashboard.blogs');
    }

    public function getBooks()
    {
        $books = Book::orderBy('id', 'desc')->paginate(7);
        return view('dashboard.books.index')->withBooks($books);
    }

    public function createBook()
    {
        return view('dashboard.books.create');
    }

    public function storeBook(Request $request)
    {
        $this->validate($request,array(
            'name'           => 'required|max:255',
            'serial'         => 'required',
            'description'    => 'required',
            'link'           => 'sometimes',
            'image'          => 'required|image|max:400'
        ));

        //store to DB
        $book = new Book;
        $book->name = $request->name;
        $book->serial = $request->serial;
        $book->description = Purifier::clean($request->description, 'youtube');
        $book->link = $request->link;
        
        // image upload
        if($request->hasFile('image'))
        {
            $image      = $request->file('image');
            $filename   = 'image_' . random_string(4) . time() .'.' . $image->getClientOriginalExtension();
            $location   = public_path('images/books/'. $filename);
            Image::make($image)->resize(300, null, function ($constraint) { $constraint->aspectRatio(); })->save($location);
            $book->image = $filename;
        }

        $book->save();

        //redirect
        Session::flash('success', 'Saved Successfully!');
        return redirect()->route('dashboard.books');
    }

    public function editBook($id)
    {
        $book = Book::find($id);
        return view('dashboard.books.edit')->withBook($book);
    }

    public function updateBook(Request $request, $id)
    {
        $book = Book::find($id);

        $this->validate($request,array(
            'name'           => 'required|max:255',
            'serial'         => 'required',
            'description'    => 'required',
            'link'           => 'sometimes',
            'image'          => 'sometimes|image|max:400'
        ));

        //store to DB
        $book->name = $request->name;
        $book->serial = $request->serial;
        $book->description = Purifier::clean($request->description, 'youtube');
        $book->link = $request->link;
        
        // image upload
        if($request->hasFile('image'))
        {
            $image_path = public_path('images/books/'. $book->image);
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $image      = $request->file('image');
            $filename   = 'image_' . random_string(4) . time() .'.' . $image->getClientOriginalExtension();
            $location   = public_path('images/books/'. $filename);
            Image::make($image)->resize(300, null, function ($constraint) { $constraint->aspectRatio(); })->save($location);
            $book->image = $filename;
        }

        $book->save();

        //redirect
        Session::flash('success', 'Saved Successfully!');
        return redirect()->route('dashboard.books');
    }

    public function deleteBook($id)
    {
        $book = Book::find($id);
        $image_path = public_path('images/books/'. $book->image);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $book->delete();

        Session::flash('success', 'Deleted Successfully!');
        return redirect()->route('dashboard.books');
    }

    public function getGallery()
    {
        $galleries = Gallery::orderBy('id', 'DESC')->paginate(7);

        return view('dashboard.gallery.index')->withGalleries($galleries);
    }

    public function storeGallery(Request $request)
    {
        $this->validate($request,array(
            'caption'        => 'sometimes|max:255',
            'image'          => 'required|image|max:500'
        ));

        //store to DB
        $gallery = new Gallery;
        $gallery->caption = $request->caption;

        // image upload
        if($request->hasFile('image'))
        {
            $image      = $request->file('image');
            $filename   = 'image_' . random_string(4) . time() .'.' . $image->getClientOriginalExtension();
            $location   = public_path('images/gallery/'. $filename);
            Image::make($image)->resize(null, 520, function ($constraint) { $constraint->aspectRatio(); })->save($location, 80);
            $gallery->image = $filename;
        }

        $gallery->save();

        //redirect
        Session::flash('success', 'Saved Successfully!');
        return redirect()->route('dashboard.gallery');
    }

    public function deleteGallery($id)
    {
        $gallery = Gallery::find($id);
        $image_path = public_path('images/gallery/'. $gallery->image);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $gallery->delete();

        Session::flash('success', 'Deleted Successfully!');
        return redirect()->route('dashboard.gallery');
    }








    
    public function getCommittee()
    {
        $adhocmembers = Adhocmember::orderBy('id', 'desc')->get();
        return view('dashboard.committee')->withAdhocmembers($adhocmembers);
    }


    

    
}
