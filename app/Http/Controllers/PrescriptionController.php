<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Prescription;
use DB;
use App\Access;
class PrescriptionController extends Controller
{
    public function index()
    {

    	date_default_timezone_set('Europe/Paris');
		$bookings =  Booking::where('date',date('Y-m-d'))->where('doctor_id',auth()->user()->id)->get();
       // $bookings = DB::select("select * from bookings as b where doctor_id =" . auth()->user()->id . " and b.status = 1");
        //print_r($bookings);
        //print_r(date('Y-m-d'));
        return view('prescription.index',compact('bookings'));
    }
   

    public function store(Request $request)
    {
    	$data  = $request->all();
    	// $data['medicine'] = implode(',',$request->medicine);
    	Prescription::create($data);
    	return redirect()->back()->with('message','Prescription created');
    }

    public function edit(Request $request,$id){
    	$data  = $request->all();
    	// $data['medicine'] = implode(',',$request->medicine);
        $user = Prescription::find($id);
       // print_r($id);
        $user->update($data);
        return redirect()->back()->with('message','dotor record updated succesfully');
    }

    public function show($userId,$date)
    {
        $prescription = Prescription::where('user_id',$userId)->where('date',$date)->first();
        return view('prescription.show',compact('prescription'));
    }

    //get all patients from prescription table
    public function patientsFromPrescription()
    {
        $patients = Prescription::join("bookings","bookings.id","=","prescriptions.booking_id")

        ->where('prescriptions.doctor_id',auth()->user()->id)
        ->select('prescriptions.*',"bookings.id AS bk_id","bookings.user_id","bookings.doctor_id","bookings.status","bookings.time","bookings.created_at","bookings.updated_at","bookings.date")
        ->get();

        $dossierPartager = Prescription::join("accesses AS a","a.prescription_id","=","prescriptions.id")
        ->where('a.doctor_id',auth()->user()->id)
        ->where('a.status',1)
        ->join("bookings AS b","b.id","=","prescriptions.booking_id")
        ->get();

        //print_r($dossierPartager);

       /* SELECT * FROM prescriptions JOIN bookings ON 
        bookings.id = prescriptions.booking_id WHERE prescriptions.doctor_id !=6 and prescriptions.id Not in 
        (SELECT prescription_id from accesses where doctor_id = 6 and status = 1);*/

        $send_prescription1 = DB::table('accesses')
        ->select('prescription_id')
        ->where('doctor_id',auth()->user()->id)
        ->where('status',1);

        $all_patients = Prescription::join("bookings","bookings.id","=","prescriptions.booking_id")->select("prescriptions.*","bookings.status")
        ->where(function($query) use ($send_prescription1){
                $query->where('prescriptions.doctor_id','!=',auth()->user()->id);
                $query->whereNotIn('prescriptions.id',$send_prescription1);
        })->get();

        /*$all_patients = Prescription::join("bookings","bookings.id","=","prescriptions.booking_id")
        ->where('prescriptions.doctor_id','!=',auth()->user()->id)->select("prescriptions.*","bookings.status")->get();*/

        //print_r($all_patients);


        $send_prescription = DB::table('accesses')
        ->select('prescription_id')
        ->where('doctor_id',auth()->user()->id)
        ->where('status',1);

        $acc_patients = DB::table('accesses as a')->join('prescriptions AS p','p.id',"=","a.prescription_id")
        ->where(
            function($query) use ($send_prescription){
                $query->where('p.doctor_id',auth()->user()->id);
                $query->orWhere(function($querya)  use ($send_prescription)
                {
                    $querya->whereIn('a.prescription_id',$send_prescription);
                });

        })
        ->where('a.status',0)
        ->join('users AS u','u.id','a.doctor_id')
        ->select("a.id AS identifient","a.*","p.*","u.*")
        ->get();


		$bookings =  Booking::where('date',date('Y-m-d'))->where('doctor_id',auth()->user()->id)->get();

        //print_r($acc_patients);
        return view('prescription.all',compact(['patients','all_patients','acc_patients','dossierPartager','bookings']));
    }

    //get the patients whos shared with you 
    public function shared(){

        $dossierPartager = Prescription::join("accesses AS a","a.prescription_id","=","prescriptions.id")
        ->where('a.doctor_id',auth()->user()->id)
        ->where('a.status',1)
        ->join("bookings AS b","b.id","=","prescriptions.booking_id")
        ->select('prescriptions.*',"b.id AS bk_id","b.user_id","b.doctor_id","b.status","b.time","b.created_at","b.updated_at","b.date","a.id AS ac_id","a.doctor_id","a.prescription_id","a.status","a.created_at","a.updated_at")
        ->get();

        return view('prescription.shared',compact('dossierPartager'));

    }

    //get  all_my_medical_record

    public function all_my_medical_record(){

        $exist = Prescription::
        select('booking_id');

        $bookings = Booking::where('doctor_id',auth()->user()->id)
        ->where(
            function($query) use ($exist){
                $query->where('date','!=',date('Y-m-d'));
                $query->whereNotIn('id',$exist);
            })
        ->get();
       // print_r($bookings);
        return view('prescription.All_my_medical_record',compact('bookings'));
    }

    public function request(){
        $send_prescription = DB::table('accesses')
        ->select('prescription_id')
        ->where('doctor_id',auth()->user()->id)
        ->where('status',1);

        $acc_patients = DB::table('accesses as a')->join('prescriptions AS p','p.id',"=","a.prescription_id")
        ->where(
            function($query) use ($send_prescription){
                $query->where('p.doctor_id',auth()->user()->id);
                $query->orWhere(function($querya)  use ($send_prescription)
                {
                    $querya->whereIn('a.prescription_id',$send_prescription);
                });

        })
        ->where('a.status',0)
        ->join('users AS u','u.id','a.doctor_id')
        ->select("a.id AS identifient","a.*","p.*","u.*")
        ->get();

        return view('prescription.request',compact('acc_patients'));
    }

    public function My_records(){
        $patients = Prescription::join("bookings","bookings.id","=","prescriptions.booking_id")
        ->where('prescriptions.doctor_id',auth()->user()->id)
        ->select('prescriptions.*',"bookings.id AS bk_id","bookings.user_id","bookings.doctor_id","bookings.status","bookings.time","bookings.created_at","bookings.updated_at","bookings.date")
        ->get();
        return view('prescription.My_records',compact('patients'));
    }


    public function Other_records(){
        $send_prescription1 = DB::table('accesses')
        ->select('prescription_id')
        ->where('doctor_id',auth()->user()->id)
        ->where('status',1);

        $all_patients = Prescription::join("bookings","bookings.id","=","prescriptions.booking_id")->select("prescriptions.*","bookings.status")
        ->where(function($query) use ($send_prescription1){
                $query->where('prescriptions.doctor_id','!=',auth()->user()->id);
                $query->whereNotIn('prescriptions.id',$send_prescription1);
        })->get();

        return view('prescription.Other_records',compact('all_patients'));
    }

    public function changeStatus($id){
        $access  = Access::find($id);
        $access->status = 1;
        $access->save();

        return redirect()->back();
    }
    public function changeStatus_2($id){
        $access  = Access::find($id);
        $access->status = 2;
        $access->save();

        return redirect()->back();
    }

}
