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
            'image'          => 'sometimes|image|max:400'
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

    public function deleteBook($id)
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











    
    public function getCommittee()
    {
        $adhocmembers = Adhocmember::orderBy('id', 'desc')->get();
        return view('dashboard.committee')->withAdhocmembers($adhocmembers);
    }

    public function storeCommittee(Request $request)
    {
        $this->validate($request,array(
            'name'                      => 'required|max:255',
            'email'                     => 'sometimes|email',
            'phone'                     => 'sometimes|numeric',
            'designation'               => 'required|max:255',
            'fb'                        => 'sometimes|max:255',
            'twitter'                   => 'sometimes|max:255',
            'gplus'                     => 'sometimes|max:255',
            'linkedin'                  => 'sometimes|max:255',
            'image'                     => 'sometimes|image|max:400'
        ));

        $adhocmember = new Adhocmember();
        $adhocmember->name = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->name)));
        $adhocmember->email = htmlspecialchars(preg_replace("/\s+/", " ", $request->email));
        $adhocmember->phone = htmlspecialchars(preg_replace("/\s+/", " ", $request->phone));
        $adhocmember->designation = htmlspecialchars(preg_replace("/\s+/", " ", $request->designation));
        $adhocmember->fb = htmlspecialchars(preg_replace("/\s+/", " ", $request->fb));
        $adhocmember->twitter = htmlspecialchars(preg_replace("/\s+/", " ", $request->twitter));
        $adhocmember->gplus = htmlspecialchars(preg_replace("/\s+/", " ", $request->gplus));
        $adhocmember->linkedin = htmlspecialchars(preg_replace("/\s+/", " ", $request->linkedin));

        // image upload
        if($request->hasFile('image')) {
            $image      = $request->file('image');
            $filename   = str_replace(' ','',$request->name).time() .'.' . $image->getClientOriginalExtension();
            $location   = public_path('/images/committee/adhoc/'. $filename);
            Image::make($image)->resize(400, 400)->save($location);
            $adhocmember->image = $filename;
        }

        $adhocmember->save();
        
        Session::flash('success', 'Saved Successfully!');
        return redirect()->route('dashboard.committee');
    }

    public function updateCommittee(Request $request, $id) {
        $this->validate($request,array(
            'name'                      => 'required|max:255',
            'email'                     => 'sometimes|email',
            'phone'                     => 'sometimes|numeric',
            'designation'               => 'required|max:255',
            'fb'                        => 'sometimes|max:255',
            'twitter'                   => 'sometimes|max:255',
            'gplus'                     => 'sometimes|max:255',
            'linkedin'                  => 'sometimes|max:255',
            'image'                     => 'sometimes|image|max:400'
        ));

        $adhocmember = Adhocmember::find($id);
        $adhocmember->name = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->name)));
        $adhocmember->email = htmlspecialchars(preg_replace("/\s+/", " ", $request->email));
        $adhocmember->phone = htmlspecialchars(preg_replace("/\s+/", " ", $request->phone));
        $adhocmember->designation = htmlspecialchars(preg_replace("/\s+/", " ", $request->designation));
        $adhocmember->fb = htmlspecialchars(preg_replace("/\s+/", " ", $request->fb));
        $adhocmember->twitter = htmlspecialchars(preg_replace("/\s+/", " ", $request->twitter));
        $adhocmember->gplus = htmlspecialchars(preg_replace("/\s+/", " ", $request->gplus));
        $adhocmember->linkedin = htmlspecialchars(preg_replace("/\s+/", " ", $request->linkedin));

        // image upload
        if($adhocmember->image == null) {
            if($request->hasFile('image')) {
                $image      = $request->file('image');
                $filename   = str_replace(' ','',$request->name).time() .'.' . $image->getClientOriginalExtension();
                $location   = public_path('/images/committee/adhoc/'. $filename);
                Image::make($image)->resize(400, 400)->save($location);
                $adhocmember->image = $filename;
            }
        } else {
            if($request->hasFile('image')) {
                $image_path = public_path('images/committee/adhoc/'. $adhocmember->image);
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
                $image      = $request->file('image');
                $filename   = str_replace(' ','',$request->name).time() .'.' . $image->getClientOriginalExtension();
                $location   = public_path('/images/committee/adhoc/'. $filename);
                Image::make($image)->resize(400, 400)->save($location);
                $adhocmember->image = $filename;
            }
        }
            
        $adhocmember->save();
        
        Session::flash('success', 'Updated Successfully!');
        return redirect()->route('dashboard.committee');
    }

    public function deleteCommittee($id)
    {
        $adhocmember = Adhocmember::find($id);
        $image_path = public_path('images/committee/adhoc/'. $adhocmember->image);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $adhocmember->delete();

        Session::flash('success', 'Deleted Successfully!');
        return redirect()->route('dashboard.committee');
    }

    public function getGallery()
    {
        return view('dashboard.index');
    }

    
}
