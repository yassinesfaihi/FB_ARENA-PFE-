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



Route::get('/', function () {
    return view('welcome');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('about');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//************** users routes ************
Route::resource('/users', 'UsersController');
Route::get('/users-search', 'UsersController@search')->name('users.search');
//************************ 

//************** clients routes ************
Route::resource('/clients', 'ClientsController');
Route::get('/clients-search', 'ClientsController@search')->name('clients.search');
//************************ 

//************** pitches routes ************
Route::resource('/pitches', 'pitchesController')->middleware('checkrole');
Route::get('/pitches-search', 'PitchesController@search')->name('pitches.search');
//************************ 

//************** academies routes ************
Route::resource('/academies', 'AcademiesController');
Route::get('/academies-search', 'AcademiesController@search')->name('academies.search');
//************************ 


//************** members routes ************
Route::resource('/members', 'MembersController');
Route::get('/members-search', 'MembersController@search')->name('members.search');
//************************ 

//************** coachs routes ************
Route::resource('/coachs', 'CoachsController');
Route::get('/coachs-search', 'CoachsController@search')->name('coachs.search');
//************************ 

//************** Reservations routes ************
Route::resource('/Reservations', 'ReservationsController');
Route::get('/Reservations/display', 'ReservationsController@show');
//************************ 

//************** Statistiques routes ************
Route::resource('/stats', 'statsController')->middleware('checkrole');
//***********************

Route::get('/profil', 'PagesController@profil')->name('profil');
Route::get('/profilUser', 'PagesController@profilUser')->name('profilUser');