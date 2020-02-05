<?php

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



// Route::get('/hello', function () {
//     //return view('welcome');
//     return '<h1>Hello World</h1>';
// });



// Route::get('/users/{id}/{name}', function($id, $name){
//     return 'This is user '.$name.' with an id of '.$id;
// });

Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('posts/archive', 'PostController@archive');
Route::post('posts/restore/{id}', 'PostController@restore');
Route::get('igoara', 'IgoaraController@member');
Route::resource('posts', 'PostController');
Route::resource('user', 'UserController');
Route::resource('igoara', 'IgoaraController');
Route::resource('loops', 'LoopController');
Route::resource('cisco', 'CiscoController');
Route::resource('codegeeks', 'CodeGeeksController');
Route::resource('accesspoint', 'AccessPointController');
Route::resource('article', 'ArticleController');
Route::resource('member', 'MemberController');
Route::resource('igoaramemberdb', 'IgoaraMemberController');
Route::resource('accesspointmemberdb', 'AccessPointMemberController');
Route::resource('loopmemberdb', 'LoopMemberController');
Route::resource('ciscomemberdb', 'CiscoMemberController');
Route::resource('codegeeksmemberdb', 'CodeGeeksMemberController');

//MIEL RENI KEBIT KUNG ROUTES
Route::get('/contact', 'PagesController@getContact')->name('contact');
Route::get('/faculty', 'PagesController@getFaculty')->name('faculty');
// END

Route::get('/register', function(){
 return view('/register');
})->middleware('admin');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
Route::get('/igoaradb', 'IgoaraDashboardController@index');
Route::get('/loopdb', 'LoopDashboardController@index');
Route::get('/ciscodb', 'CiscoDashboardController@index');
Route::get('/codegeeksdb', 'CodeGeeksDashboardController@index');
Route::get('/accesspointdb', 'AccessPointDashboardController@index');
Route::get('/articledb', 'ArticleDashboardController@index');
Route::get('/memberdb', 'MemberDashboardController@index');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/auth/success', [
    'as'   => 'auth.success',
    'uses' => 'AuthController@success'
]);
