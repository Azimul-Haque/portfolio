<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\User;
use App\Blog;
use App\Category;
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
        $totalblogs = Blog::count();
        $totalbooks = Book::count();
        $totalphotos = Gallery::count();
        $totalmultimedia = Multimedia::count();
        $totalfaqs = Faq::count();
        $totalformmessages = Formmessage::count();

        return view('dashboard.index')
                        ->withTotalblogs($totalblogs)
                        ->withTotalbooks($totalbooks)
                        ->withTotalphotos($totalphotos)
                        ->withTotalmultimedia($totalmultimedia)
                        ->withTotalfaqs($totalfaqs)
                        ->withTotalformmessages($totalformmessages);
    }

    public function getBlogs()
    {
        $blogs = Blog::orderBy('id', 'desc')->paginate(7);
        return view('dashboard.blogs.index')
                            ->withBlogs($blogs);
    }

    public function createBlog()
    {
        $categories = Category::orderBy('id', 'asc')->get();
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
        $blog->slug        = str_replace(['?',':', '\\', '/', '*', ' '], '-', strtolower($request->title)). '-' .time();
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
        $categories = Category::orderBy('id', 'asc')->get();

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
            $blog->slug = str_replace(['?',':', '\\', '/', '*', ' '], '-', strtolower($request->title)). '-' .time();
            Session::flash('info', 'Please note that, URL has changed!');
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

    public function updateGallery(Request $request, $id)
    {
        $gallery = Gallery::find($id);

        $this->validate($request,array(
            'caption'        => 'sometimes|max:255',
            'image'          => 'sometimes|image|max:500'
        ));

        //store to DB
        $gallery->caption = $request->caption;

        // image upload
        if($request->hasFile('image'))
        {
            $image_path = public_path('images/gallery/'. $gallery->image);
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $image      = $request->file('image');
            $filename   = 'image_' . random_string(4) . time() .'.' . $image->getClientOriginalExtension();
            $location   = public_path('images/gallery/'. $filename);
            Image::make($image)->resize(null, 520, function ($constraint) { $constraint->aspectRatio(); })->save($location, 80);
            $gallery->image = $filename;
        }

        $gallery->save();

        //redirect
        Session::flash('success', 'Updated Successfully!');
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

    public function getMultimedia()
    {
        $multimedia = Multimedia::orderBy('id', 'desc')->paginate(7);

        return view('dashboard.multimedia.index')->withMultimedia($multimedia);
    }

    public function createMultimedia()
    {
        return view('dashboard.multimedia.create');
    }

    public function storeMultimedia(Request $request)
    {
        $this->validate($request,array(
            'title'          => 'required|max:255',
            'type'           => 'required',
            'status'         => 'required|integer',
            'post_body'      => 'required'
        ));

        //store to DB
        $single              = new Multimedia;
        $single->title       = $request->title;
        $single->user_id     = Auth::user()->id;
        $single->slug        = str_replace(['?',':', '\\', '/', '*', ' '], '-', strtolower($request->title)). '-' .time();
        $single->type        = $request->type; // 1 for youtube, 2 for soundcloud
        $single->status      = $request->status;
        if($request->type == 1) {
            $single->body    = $request->youtube_body_hidden;
        } elseif ($request->type == 2) {
            $single->body    = Purifier::clean($request->post_body, 'youtube');
        }

        $single->save();

        //redirect
        Session::flash('success', 'Saved Successfully!');
        return redirect()->route('dashboard.multimedia');
    }

    public function editMultimedia($id)
    {
        $multimedia = Multimedia::find($id);

        return view('dashboard.multimedia.edit')
                        ->withMultimedia($multimedia);
    }

    public function updateMultimedia(Request $request, $id)
    {
        $single = Multimedia::find($id);

        $this->validate($request,array(
            'title'          => 'required|max:255',
            // 'type'           => 'required',
            'status'         => 'required|integer',
            'post_body'      => 'required'
        ));

        //store to DB
        if($single->title != $request->title) {
            $single->slug = str_replace(['?',':', '\\', '/', '*', ' '], '-', strtolower($request->title)). '-' .time();
            Session::flash('info', 'Please note that, URL has changed!');
        }
        $single->title       = $request->title;
        // $single->type        = $request->type; // 1 for youtube, 2 for soundcloud
        $single->status      = $request->status;
        if($single->type == 1) {
            $single->body    = $request->youtube_body_hidden;
        } elseif ($single->type == 2) {
            $single->body    = Purifier::clean($request->post_body, 'youtube');
        }

        $single->save();

        //redirect
        Session::flash('success', 'Saved Successfully!');
        return redirect()->route('dashboard.multimedia');
    }

    public function deleteMultimedia($id)
    {
        $multimedia = Multimedia::find($id);
        $multimedia->delete();

        Session::flash('success', 'Deleted Successfully!');
        return redirect()->route('dashboard.multimedia');
    }

    public function getFaq()
    {
        $faqs = Faq::orderBy('id', 'desc')->paginate(7);

        return view('dashboard.faqs.index')->withFaqs($faqs);
    }

    public function storeFaq(Request $request)
    {
        $this->validate($request,array(
            'question'       => 'required|max:255',
            'answer'         => 'required'
        ));

        //store to DB
        $faq              = new Faq;
        $faq->question       = $request->question;
        $faq->answer       = $request->answer;
        $faq->save();

        //redirect
        Session::flash('success', 'Saved Successfully!');
        return redirect()->route('dashboard.faq');
    }

    public function updateFaq(Request $request, $id)
    {
        $faq = Faq::find($id);

        $this->validate($request,array(
            'question'       => 'required|max:255',
            'answer'         => 'required'
        ));

        $faq->question       = $request->question;
        $faq->answer       = $request->answer;
        $faq->save();

        //redirect
        Session::flash('success', 'Saved Successfully!');
        return redirect()->route('dashboard.faq');
    }

    public function deleteFaq($id)
    {
        $faq = Faq::find($id);
        $faq->delete();

        Session::flash('success', 'Deleted Successfully!');
        return redirect()->route('dashboard.faq');
    }
    
    public function getMessages()
    {
        $messages = Formmessage::orderBy('id', 'desc')->paginate(10);
        return view('dashboard.messages.index')->withMessages($messages);
    }

    public function deleteMessage($id)
    {
        $message = Formmessage::find($id);
        $message->delete();

        Session::flash('success', 'Deleted Successfully!');
        return redirect()->route('dashboard.messages');
    }
    
}
