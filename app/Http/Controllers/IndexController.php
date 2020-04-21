<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Blog;
use App\Category;
use App\Multimedia;
use App\Book;
use App\Faq;
use App\Formmessage;

use Carbon\Carbon;
use DB;
use Hash;
use Auth;
use Image;
use File;
use Session;
use Artisan;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->only('getLogin');
        $this->middleware('auth')->only('getProfile');
    }

    public function index()
    {
        $blogs = Blog::where('status', 1)->orderBy('id', 'DESC')->get()->take(3);

        return view('index.index')
                    ->withBlogs($blogs);
    }

    public function getBio()
    {
        return view('index.bio');
    }

    public function getBooks()
    {
        $books = Book::orderBy('serial', 'ASC')->paginate(7);

        return view('index.books')->withBooks($books);
    }

    public function getMultimedia()
    {
        $multimedia = Multimedia::orderBy('id', 'DESC')->paginate(4);
        return view('index.multimedia')->withMultimedia($multimedia);
    }

    public function getSingleMultimedia($slug)
    {
        $multimedia = Multimedia::where('slug', $slug)->first();
        $similars = Multimedia::orderBy('id', 'DESC')->get()->take(7);

        return view('index.singlemultimedia')
                    ->withMultimedia($multimedia)
                    ->withSimilars($similars);
    }

    public function getGSearch(Request $request)
    {
        return view('index.gsearch')->withSearch($request->search);
    }

    public function getFaq()
    {
        return view('index.faq');
    }

    public function getGallery()
    {
        return view('index.gallery');
    }

    public function getContact()
    {
        return view('index.contact');
    }

    public function storeFormMessage(Request $request)
    {
        $this->validate($request,array(
            'name'                      => 'required|max:255',
            'email'                     => 'required',
            'phone'                     => 'required',
            'message'                   => 'required',
            'contact_sum_result_hidden'   => 'required',
            'contact_sum_result'   => 'required'
        ));

        if($request->contact_sum_result_hidden == $request->contact_sum_result) {
            // $message = new Formmessage;
            // $message->name = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->name)));
            // $message->email = htmlspecialchars(preg_replace("/\s+/", " ", $request->email));
            // $message->message = htmlspecialchars(preg_replace("/\s+/", " ", $request->message));
            // $message->save();
            
            Session::flash('success', 'Thank you for your message! I will get back to you.');
            return redirect()->route('index.contact');
        } else {
            return redirect()->route('index.contact')->with('warning', 'The sum is incorrect! Try again.')->withInput();
        }
    }

    // public function testDate()
    // {
    //     $mydata = json_decode(file_get_contents('http://localhost/bangla_date/test.php'));
    //     print_r($mydata->bn_date);
    // }

    // clear configs, routes and serve
    public function clear()
    {
        // Artisan::call('optimize');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('key:generate');
        Artisan::call('route:cache');
        Artisan::call('config:cache');
        Session::flush();
        echo 'Config and Route Cached. All Cache Cleared';
    }
}
