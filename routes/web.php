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

Route::get('/', function () {
    //return view('welcome');
    return view('frontend.index');
});



//'isUser' is mentioned in Kernal.php go and check
Route::group(['middleware'=>['auth','isUser']],function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/my_profile', 'Frontend\UserController@myprofile')->name('myprofile');
    Route::post('/my_profile_update', 'Frontend\UserController@my_profile_update')->name('my_profile_update');
    Route::get('/changePassword', 'Frontend\UserController@changePassword')->name('changePassword');
    Route::post('/changePasswordupdate','Frontend\UserController@changePasswordupdate')->name('changePasswordupdate');
    
    
});

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth.register', 'auth.RegisterController@showRegistrationForm');
//if u want any dropdowndb in user registration page means, u have to give above Route in before "Auth::routes();"

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth','isAdmin']], function() {
    Route::get('/dashboard', function(){
            return view('admin.dashboard');
    });
    Route::get('registered-user','Admin\RegisteredController@index')->name('registered-user');
    Route::get('role-edit/{id}','Admin\RegisteredController@editrole');
    Route::put('role-update/{id}','Admin\RegisteredController@updaterole');
    Route::get('user-delete/{id}','Admin\RegisteredController@delete')->name('user-delete');
    /*Route::get('user-restore/{id}','Admin\RegisteredController@restore')->name('user-restore');*/
    Route::get('user-restore-all','Admin\RegisteredController@restore_all')->name('user-restore-all');

     Route::get('search_filter','Admin\RegisteredController@search_filter')->name('search_filter');

    




});


