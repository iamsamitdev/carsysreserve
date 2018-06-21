<?php
/*
|--------------------------------------------------------------------------
| Frontend
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('backend','BackendController@index');
/*
|--------------------------------------------------------------------------
| Backend
|--------------------------------------------------------------------------
|
*/
// *** USER ****/
Route::group([
    'prefix' => 'backend', 
    'middleware' => 'auth'
], function(){
     // Normal User
     Route::get('dashboard','BackendController@dashboard');
     Route::get('nopermission','BackendController@nopermission'); // หน้าแจ้งเตือนกรณี สิทธิ์ไม่ถูกต้อง หากพยายมเข้าหน้า admin page
     Route::get('calendars','BackendController@calendars');
     Route::get('bookings','BackendController@bookings');
     Route::get('cardetails','BackendController@cardetails');
});


// *** ADMIN****/
Route::group([
    'prefix' => 'backend', 
    'middleware' => 'admin'
], function(){
     // Admin User
     Route::get('department','BackendController@department');
});

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('admin/area','HomeController@admin')->middleware('admin');
