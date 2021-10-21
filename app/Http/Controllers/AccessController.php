<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Prescription;
use DB;
use App\Access;
class AccessController extends Controller
{
   
    public function store(Request $request)
    {
        //print_r($request->input());
        $exist = Access::where('doctor_id',$request->doctor_id)->where('prescription_id',$request->prescription_id)->first();
        if($exist){
            return redirect()->back()->with('message','demande deja envoyer please wait for addmition');
        }
        else{
            Access::create($request->all());
            return redirect()->back()->with('message','demande envoyer');
        }

    }
    
}
