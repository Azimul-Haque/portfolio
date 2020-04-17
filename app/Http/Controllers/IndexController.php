<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Blog;
use App\Category;
use App\Adhocmember;
use App\Multimedia;

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
        $blogs = Blog::orderBy('id', 'DESC')->get()->take(3);
        $alumnis = User::where('payment_status', 1)
                       ->where('role', 'alumni')->count();

        return view('index.index')
                    ->withBlogs($blogs)
                    ->withAlumnis($alumnis);
    }

    public function getBio()
    {
        return view('index.bio');
    }

    public function getBooks()
    {
        return view('index.books');
    }

    public function getMultimedia()
    {
        $multimedia = Multimedia::orderBy('id', 'DESC')->paginate(6);
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













    public function getJourney()
    {
        return view('index.journey');
    }

    public function getConstitution()
    {
        return view('index.constitution');
    }

    public function getFaq()
    {
        return view('index.faq');
    }

    public function getGallery()
    {
        return view('index.gallery');
    }

    public function getMembers()
    {
        $members = User::where('role', 'alumni')
                       ->where('payment_status', 1)
                       ->orderBy('degree', 'asc')
                       ->orderBy('batch', 'asc')
                       ->orderBy('roll', 'asc')
                       ->get();
        return view('index.members')->withMembers($members);
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
