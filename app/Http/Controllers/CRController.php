<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Officer;
use App\Officerduty;

class CRController extends Controller
{
    public function index()
    {
        $officers = Officer::all();
        $officerduties = Officerduty::paginate(24);

        return view('dashboard.control-room.index')
                        ->withOfficers($officers)
                        ->withOfficerduties($officerduties);
    }
}
