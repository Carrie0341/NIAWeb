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

/* Test PHP Function Route */
Route::any('/TEST', 'TestController@test');
Route::any('/SendMail', 'MailController@sendTest');
Route::any('/Permission/{link?}', function ($link = "Empty hyper-link") {
    return "Permission: $link";
})->name('TestPermission');

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/alliance', function () {
    return view('alliance');
});

Route::get('/news', function () {
    return view('news');
});

Route::group(['prefix' => 'alliance'], function () {
    Route::get('/era', function () {
        return view('alliances.era-alliance');
    });

    Route::get('/rrclp', function () {
        return view('alliances.rrclp-alliance');
    });

    Route::get('/sport', function () {
        return view('alliances.sport-alliance');
    });
});

Route::group(['middleware' => 'AuthMiddleware'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/edit/{token}', 'AuthController@editView')->name('edit');
    Route::put('/edit/{token}', 'AuthController@editData');

    Route::group(['middleware' => 'AdminMiddleware'], function () {
        Route::get('/administrator', 'AdministratorController@index')->name('administrator');
        Route::get('/administrator/user', 'AdministratorController@userView')->name('administrator.user');
        Route::get('/administrator/request/all', 'AdministratorController@requestView')->name('administrator.request');
        Route::get('/administrator/request/filter/{allianceID?}', 'AdministratorController@requestAllianceView')->name('administrator.request.alliance');
        Route::get('/administrator/alliance', 'AdministratorController@allianceView')->name('administrator.alliance');
        Route::get('/administrator/reject/{id}', 'AdministratorController@toggleReq')->name('administrator.toggleReq');
        Route::get('/approved/{id}', 'AdministratorController@approved')->name('administrator.approved');

        Route::get('/remove/alliance/{id}', 'AdministratorController@removeAlliance')->name('administrator.removeAlliance');
        Route::post('/addAlliance', 'submitController@addAlliance')->name('administrator.addAlliance');
    });

    Route::get('/request', 'submitController@requestView')->name('request');
    Route::post('/request', 'submitController@request');

    Route::post('/industryreq', 'submitController@listReq');
});

/* AuthContoller: Login, Logout , Register */
Route::get('/login', "AuthController@formOfLogin")->name('login');
Route::get('/logout/{lang?}', "AuthController@logout")->name('logout');
Route::get('/register', "AuthController@formOfRegister")->name('register');
Route::post('/login', "AuthController@submitOfLogin");
Route::post('/passwordForget', "AuthController@submitOfpswdForget")->name('passwordForget');
Route::post('/register', "AuthController@submitOfRegister");
