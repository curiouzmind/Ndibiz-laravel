<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
//Route::get('bizreg', 'HomeController@regbiz');
Route::resource('biz', 'BizController');
Route::get('search', 'HomeController@search');
ROute::get('lga', 'HomeController@lga');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('activate/{confirmation_code}', 'Auth\AuthController@activateAccount');
Route::get('confirm','HomeController@confirm');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('api', function()
    {
      // Retrieve user's input ('q' query parameter)
       $query = Input::get('q','');

       if(trim(urldecode($query))=='')
          return Response::json(['data'=> []], 200);

        // Search the data in DB and retrieve a list of items matching the search query
      $data = \DB::table('states')
    ->where('name','like','%'.$query.'%')
    ->orderBy('name','asc')
    ->take(10)
    ->get(['id', 'name']);

        // Return JSON-encoded list of items inside of "data" object as a response to the request
        return Response::json(['data' => $data]);
    });
// Admin area
get('admin', function () {
  return redirect('/admin/cat');
});

$router->group([
  'namespace' => 'Admin',
  'middleware' => 'auth',
], function () {
  resource('admin/biz', 'BizController');
  resource('admin/cat', 'CatController', ['except' => 'show']);
  get('admin/upload', 'UploadController@index');
  post('admin/upload/file', 'UploadController@uploadFile');
  delete('admin/upload/file', 'UploadController@deleteFile');
  post('admin/upload/folder', 'UploadController@createFolder');
  delete('admin/upload/folder', 'UploadController@deleteFolder');
});

Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');