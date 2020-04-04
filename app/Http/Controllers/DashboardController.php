<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Adhocmember;
use App\User;

use DB;
use Auth;
use Image;
use File;
use Session;

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

    public function getNews()
    {
        return view('dashboard.index');
    }

    public function getEvents()
    {
        return view('dashboard.index');
    }

    public function getGallery()
    {
        return view('dashboard.index');
    }

    public function getBlogs()
    {
        return view('dashboard.index');
    }

    public function getMembers()
    {
        $members = User::where('payment_status', 1)
                            ->where('role', 'alumni')
                            ->get();
        return view('dashboard.members')->withMembers($members);
    }

    public function deleteMember($id)
    {
        //
    }

    public function getApplications()
    {
        $applications = User::where('payment_status', 0)
                            ->where('role', 'alumni')
                            ->get();
        return view('dashboard.applications')->withApplications($applications);
    }

    public function approveApplication(Request $request, $id)
    {
        $this->validate($request,array(
            'amount'    => 'required',
            'trxid'     => 'sometimes'
        ));

        $application = User::findOrFail($id);
        $application->payment_status = 1;
        $application->amount = $request->amount;
        $application->trxid = $request->trxid;
        $application->save();

        Session::flash('success', 'Approved Successfully!');
        return redirect()->route('dashboard.applications');
    }

    public function deleteApplication($id)
    {
        // $adhocmember = Adhocmember::find($id);
        // $image_path = public_path('images/committee/adhoc/'. $adhocmember->image);
        // if(File::exists($image_path)) {
        //     File::delete($image_path);
        // }
        // $adhocmember->delete();

        // Session::flash('success', 'Deleted Successfully!');
        // return redirect()->route('dashboard.committee');
    }
}
