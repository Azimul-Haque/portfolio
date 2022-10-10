<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Officer;
use App\Officerduty;

use Session, Config;
use Carbon\Carbon;
class CRController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('sendAlert');
        $this->middleware('admin')->except('sendAlert');
    }
    
    public function sendAlert() {
        $today = Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
        $tomorrow = date('Y-m-d', strtotime($today->addDay()));
        
        $tomorrowduties = Officerduty::where('duty_date', $tomorrow)->get();
        // dd($tomorrowduties);
        
        // send sms
        $ch     = curl_init();  // Initialize cURL
        $result = [];
        $json_smsdata = [];
        foreach($tomorrowduties as $tomorrowduty) {
            $mobile_number = 0;
            if(strlen($tomorrowduty->officer->phone) == 11) {
                $mobile_number = '88'.$tomorrowduty->officer->phone;
            } elseif(strlen($tomorrowduty->officer->phone) > 11) {
                if (strpos($tomorrowduty->officer->phone, '+') !== false) {
                    $mobile_number = substr($tomorrowduty->officer->phone,0,1);
                }
            }

            $url = config('sms.url');
            $number = $mobile_number;
            $classtime = $tomorrowduty->shift == 1 ? '8.00/8.30 PM' : '10.00/10.20 PM';
            $text = 'Dear Sir,%0a%0aTomorrow (' . date('F d, Y', strtotime($tomorrowduty->duty_date)) . ') you have a class at ' . $classtime . ' on our Preli Course.%0a%0aRegards.';
            
            $data= array(
                'username' => config('sms.username'),
                'password' => config('sms.password'),
                'number'   => "$number",
                'message'  => urldecode("$text")
            );
            // dd($data);

            $ch     = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this is important
            $result[]  = curl_exec($ch);
            // if(!(count($result) > 0)) {
            //     continue;
            // }
            // sleep(1);
            dd($result);

            // TEMP CODE
            // TEMP CODE
            // TEMP CODE
            $json_smsdata[] = ['to'=>$number,'message'=>$text];
            // TEMP CODE
            // TEMP CODE
            // TEMP CODE

            
        }
        curl_close($ch);

        // TEMP CODE
        // TEMP CODE
        // TEMP CODE
        $smsdata = json_encode($json_smsdata);

        $token = "575a9b45f0fb2282a8c3fa1ac7eaa5ec";
        $smsdata = $smsdata;

        $url = "http://api.greenweb.com.bd/api.php";


        $data= array(
        'smsdata'=>"$smsdata",
        'token'=>"$token"
        ); // Add parameters in key value
        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);

        //Result
        // echo $smsresult;

        //Error Display
        echo curl_error($ch);
        // TEMP CODE
        // TEMP CODE
        // TEMP CODE


        // dd($smsresult);
    }

    public function index()
    {
        $officers = Officer::all();
        $officerduties = Officerduty::groupBy('officer_id')->get();
        // dd($officerduties);

        return view('dashboard.control-room.index')
                        ->withOfficers($officers)
                        ->withOfficerduties($officerduties);
    }

    public function storeOfficer(Request $request)
    {
        $this->validate($request,array(
            'name'            => 'required|max:255',
            'phone'           => 'required|max:11'
        ));

        $officer = new Officer;
        $officer->name = $request->name;
        $officer->phone = $request->phone;
        $officer->save();

        //redirect
        Session::flash('success', 'Added Successfully!');
        return redirect()->route('dashboard.control-room.index');
    }

    public function updateOfficer(Request $request, $id)
    {
        $this->validate($request,array(
            'name'            => 'required|max:255',
            'phone'           => 'required|max:11'
        ));

        $officer = Officer::findOrFail($id);
        $officer->name = $request->name;
        $officer->phone = $request->phone;
        $officer->save();

        //redirect
        Session::flash('success', 'Updated Successfully!');
        return redirect()->route('dashboard.control-room.index');
    }

    public function deleteOfficer($id)
    {
        $officer = Officer::find($id);
        $officer->delete();

        Session::flash('success', 'Deleted Successfully!');
        return redirect()->route('dashboard.control-room.index');
    }

    public function storeOfficerDuty(Request $request)
    {
        $this->validate($request,array(
            'officer_id'           => 'required',
            'first_shift_dates'    => 'sometimes',
            'second_shift_dates'   => 'sometimes'
        ));

        // dd($request->first_shift_dates);
        if($request->first_shift_dates) {
            foreach($request->first_shift_dates as $duty) {
                $officerduty = new Officerduty;
                $officerduty->officer_id = $request->officer_id;
                $officerduty->duty_date = $duty;
                $officerduty->shift = 1; // 1 = 1st shift, 2 = 2nd shift
                $officerduty->save();
            }
        }
        
        if($request->second_shift_dates) {
            foreach($request->second_shift_dates as $duty) {
                $officerduty = new Officerduty;
                $officerduty->officer_id = $request->officer_id;
                $officerduty->duty_date = $duty;
                $officerduty->shift = 2; // 1 = 1st shift, 2 = 2nd shift
                $officerduty->save();
            }
        }

        //redirect
        Session::flash('success', 'Added Successfully!');
        return redirect()->route('dashboard.control-room.index');
    }

    public function updateOfficerDuty(Request $request, $id)
    {
        $this->validate($request,array(
            'officer_id'           => 'required',
            'first_shift_dates'    => 'sometimes',
            'second_shift_dates'   => 'sometimes'
        ));

        // dd($request->second_shift_dates);
        $officerduties = Officerduty::where('officer_id', $id)->get();
        foreach($officerduties as $duty) {
            $duty->delete();
        }

        if($request->first_shift_dates) {
            foreach($request->first_shift_dates as $duty) {
                $officerduty = new Officerduty;
                $officerduty->officer_id = $request->officer_id;
                $officerduty->duty_date = $duty;
                $officerduty->shift = 1; // 1 = 1st shift, 2 = 2nd shift
                $officerduty->save();
            }
        }
        
        if($request->second_shift_dates) {
            foreach($request->second_shift_dates as $duty) {
                $officerduty = new Officerduty;
                $officerduty->officer_id = $request->officer_id;
                $officerduty->duty_date = $duty;
                $officerduty->shift = 2; // 1 = 1st shift, 2 = 2nd shift
                $officerduty->save();
            }
        }

        //redirect
        Session::flash('success', 'Updated Successfully!');
        return redirect()->route('dashboard.control-room.index');
    }

    public function deleteOfficerDuty($id)
    {
        $officerduties = Officerduty::where('officer_id', $id)->get();
        foreach($officerduties as $duty) {
            $duty->delete();
        }

        Session::flash('success', 'Deleted Successfully!');
        return redirect()->route('dashboard.control-room.index');
    }
}
