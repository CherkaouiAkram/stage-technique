<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/event','EventCalender@index');

Route::get('/','FrontendController@index');


Route::get('/new-appointment/{doctorId}/{date}','FrontendController@show')->name('create.appointment');



Route::group(['middleware'=>['auth','patient']],function(){

	Route::post('/book/appointment','FrontendController@store')->name('booking.appointment');

	Route::get('/my-booking','FrontendController@myBookings')->name('my.booking');

	Route::get('/user-profile','ProfileController@index');
	Route::post('/user-profile','ProfileController@store')->name('profile.store');
	Route::post('/profile-pic','ProfileController@profilePic')->name('profile.pic');
	Route::get('/my-prescription','FrontendController@myPrescription')->name('my.prescription');


});


Route::get('/dashboard','DashboardController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['middleware'=>['auth','admin']],function(){
	Route::resource('doctor','DoctorController');
	Route::get('/patients','PatientlistController@index')->name('patient');
	Route::get('/patients/all','PatientlistController@allTimeAppointment')->name('all.appointments');
	Route::get('/status/update/{id}','PatientlistController@toggleStatus')->name('update.status');
	Route::resource('department','DepartmentController');


});

Route::group(['middleware'=>['auth','doctor']],function(){

	Route::post('access','accessController@store')->name('access');

	Route::resource('appointment','AppointmentController');
	Route::post('/appointment/check','AppointmentController@check')->name('appointment.check');
	Route::post('/appointment/update','AppointmentController@updateTime')->name('update');

	Route::get('patient-today','PrescriptionController@index')->name('patients.today');

	Route::get('prescription-changeStatus/{identifiant}','PrescriptionController@changeStatus')->name('prescription.changeStatus');
	Route::get('prescription-changeStatus_2/{identifiant}','PrescriptionController@changeStatus_2')->name('prescription.changeStatus_2');

	Route::post('/prescription','PrescriptionController@store')->name('prescription');

	Route::get('/prescription/{userId}/{date}','PrescriptionController@show')->name('prescription.show');
	Route::post('/prescription/{id}','PrescriptionController@edit')->name('prescription.edit');
	Route::get('/prescription-shared','PrescriptionController@shared')->name('prescribed.shared');
	Route::get('/prescription-My_records','PrescriptionController@My_records')->name('prescribed.My_records');
	Route::get('/prescription-Other_records','PrescriptionController@Other_records')->name('prescribed.Other_records');
	Route::get('/prescription-all-my-medical-record','PrescriptionController@all_my_medical_record')->name('prescribed.allmedicalrecord');
	Route::get('/prescription-request_doctors_for_your_records','PrescriptionController@request')->name('prescribed.request');
	Route::get('/prescribed-patients','PrescriptionController@patientsFromPrescription')->name('prescribed.patients');


});

// Route::post('/api/doctors','FrontendController@getDoctors');
// Route::get('/api/doctors/today','FrontendController@doctorToday');



