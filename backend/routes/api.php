<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;


// Route for creating account
Route::post('/create', [UserController::class, 'register']);


// Patients
Route::get('/patients', 'PatientController@index');
Route::post('/patients', 'API\PatientController@store');
Route::get('/patients/{id}', 'API\PatientController@show');
Route::put('/patients/{id}', 'API\PatientController@update');
Route::delete('/patients/{id}', 'API\PatientController@destroy');

// Doctors
Route::get('/doctors', 'API\DoctorController@index');
Route::post('/doctors', 'API\DoctorController@store');
Route::get('/doctors/{id}', 'API\DoctorController@show');
Route::put('/doctors/{id}', 'API\DoctorController@update');
Route::delete('/doctors/{id}', 'API\DoctorController@destroy');

// Appointments
Route::get('/appointments', 'API\AppointmentController@index');
Route::post('/appointments', 'API\AppointmentController@store');
Route::get('/appointments/{id}', 'API\AppointmentController@show');
Route::put('/appointments/{id}', 'API\AppointmentController@update');
Route::delete('/appointments/{id}', 'API\AppointmentController@destroy');

// Medical Records
Route::get('/records', 'API\MedicalRecordController@index');
Route::post('/records', 'API\MedicalRecordController@store');
Route::get('/records/{id}', 'API\MedicalRecordController@show');
Route::put('/records/{id}', 'API\MedicalRecordController@update');
Route::delete('/records/{id}', 'API\MedicalRecordController@destroy');
