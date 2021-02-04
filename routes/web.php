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

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Messages
Route::resource('message', 'MessageController');

Route::get('/message/{message}/read', 'MessageController@read')->name('message.read');

// Settings
Route::get('/settings', 'SettingController@index')->name('settings');

Route::post('/new-user', 'UserController@create')->name('user.add');

Route::post('/change-password', 'UserController@changePassword')->name('user.password.change');

// Callendar
// Route::get('calendar', function() {
//     return view('calendar');
// })->name('calendar');

// Analytics
Route::get('/analytics', 'AnalyticsController@index')->name('analytics');

// Patients
Route::put('/patient/payment/add/{patient}', 'PatientController@addPayment')->name('patient.payment.add');

Route::post('/patient/search', 'PatientController@search')->name('patient.search');

Route::get('/patient/healed/{patient}', 'PatientController@healed')->name('patient.healed');

Route::get('/patient/latest', 'PatientController@latest')->name('patient.latest');
Route::resource('/patient', 'PatientController');
Route::resource('/patient-record', 'PatientRecordController');





// Dashoard

Route::get('/home', 'DashboardController@index')->name('home');
