<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Blog;
use App\Category;
use App\Book;
use App\Gallery;
use App\Multimedia;
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
use Mail;

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
        $multimedia = Multimedia::where('status', 1)->orderBy('id', 'DESC')->paginate(6);
        return view('index.multimedia')->withMultimedia($multimedia);
    }

    public function getSingleMultimedia($slug)
    {
        $multimedia = Multimedia::where('status', 1)->where('slug', $slug)->first();
        $similars = Multimedia::where('status', 1)->orderBy('id', 'DESC')->get()->take(7);

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
        $faqs = Faq::all();
        return view('index.faq')->withFaqs($faqs);
    }

    public function getGallery()
    {
        $galleries = Gallery::orderBy('id', 'DESC')->paginate(15);

        return view('index.gallery')->withGalleries($galleries);
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
            'phone'                     => 'required|max:11',
            'message'                   => 'required',
            'contact_sum_result_hidden'   => 'required',
            'contact_sum_result'   => 'required'
        ));

        if($request->contact_sum_result_hidden == $request->contact_sum_result) 
        {
            $message = new Formmessage;
            $message->name = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->name)));
            $message->email = htmlspecialchars(preg_replace("/\s+/", " ", $request->email));
            $message->phone = htmlspecialchars(preg_replace("/\s+/", " ", $request->phone));
            $message->message = htmlspecialchars(preg_replace("/\s+/", " ", $request->message));
            $message->save();

            try{
              // EMAIL
              $data = array(
                  'email' => 'atiqueriyad@gmail.com ',
                  'name' => $request->name,
                  'from' => $request->email,
                  'phone' => $request->phone,
                  'message_data' => $request->message,
                  'subject' => 'Message from Website Contact Form',
              );
              Mail::send('emails.contact', $data, function($message) use ($data){
                $message->from($data['from'], 'Atique Riyad Contact');
                $message->to($data['email']);
                $message->subject($data['subject']);
              });
              // EMAIL
            } catch(\Exception $e) {
                
            }
            
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
