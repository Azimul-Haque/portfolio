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
        $capthcatext= random_string(5);
        $img = imagecreate(200, 80);
         
        $background = imagecolorallocate($img, rand(150, 255), rand(150, 255), rand(150, 255));
        $textcolor = imagecolorallocate($img, rand(50, 150), rand(50, 150), rand(50, 150));
        
        imagefilledrectangle($img, 0, 0, 150, 80, $background);
         
        // (D) WRITE TEXT
        $txt = $capthcatext;

        $fontfiles = glob('fonts/*.*');
        $fonts = array_rand($fontfiles);
        $font = public_path($fontfiles[$fonts]);
        // dd($font);
        // $font = "C:\Windows\Fonts\Arial.ttf"; // ! CHANGE THIS TO YOUR OWN !
        // imagettftext(IMAGE, FONT SIZE, ANGLE, X, Y, COLOR, FONT, TEXT)
        imagettftext($img, 30, rand(-7, 7), rand(5, 25), 55, $textcolor, $font, $txt);
        header('Content-type: image/png');
        imagepng($img);
        $imstr = base64_encode(ob_get_clean());
        imagedestroy($img);
        return view('index.contact')
                    ->withCapthcatext($capthcatext)
                    ->withImstr($imstr);
    }

    public function storeFormMessage(Request $request)
    {
        $this->validate($request,array(
            'name'                      => 'required|max:255',
            'email'                     => 'required',
            'phone'                     => 'required|max:11',
            'message'                   => 'required',
            'contact_capthcatext'   => 'required'
        ));

        if($request->contact_capthcatext == $request->hidden_capthcatext)
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
                  'email' => 'atiqueriyad@gmail.com',
                  'cc' => 'orbachinujbuk@gmail.com',
                  'name' => $request->name,
                  'from' => $request->email,
                  'phone' => $request->phone,
                  'message_data' => $request->message,
                  'subject' => 'Message from Website Contact Form',
              );
              Mail::send('emails.contact', $data, function($message) use ($data){
                $message->from($data['from'], 'Atique Riyad Contact');
                $message->to($data['email']);
                $message->cc($data['cc']);
                $message->subject($data['subject']);
              });
              // EMAIL
            } catch(\Exception $e) {
                
            }
            
            Session::flash('success', 'Thank you for your message! I will get back to you.');
            return redirect()->route('index.contact');
        } else {
            return redirect()->route('index.contact')->with('warning', 'The CAPTHCA is incorrect! Try again.')->withInput();
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
