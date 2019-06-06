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
    return view('welcome');
});

// Authentication Routes...
Route::get('', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('External')->group(function () {
    /** Assets found in public/chattool **/
    Route::get('chattool', 'BaseController@index')->name('chattool');
});

Route::namespace('Internal')->group(function() {
    Route::get('internalShop', 'ShopController@index')->name('internalShop');
    Route::get('internalStart', 'ShopController@index')->name('internalStart');
    Route::get('internalHangar', 'ShopController@index')->name('internalHangar');
    Route::get('internalSkillTree', 'SkillTreeController@index')->name('internalSkillTree');
    Route::get('internalMapRevolution', 'SkillTreeController@index')->name('internalMapRevolution');
    Route::get('internalCompanyChoose', 'SkillTreeController@index')->name('internalCompanyChoose');
    Route::get('internalClan', 'SkillTreeController@index')->name('internalClan');
    Route::get('internalSettings', 'SkillTreeController@index')->name('internalSettings');
    Route::get('internalSkylab', 'SkillTreeController@index')->name('internalSkylab');
    //Route::get('internalAuction', 'SkillTreeController@index')->name('internalAuction');
    Route::get('internalMessaging', 'SkillTreeController@index')->name('internalMessaging');
    Route::get('internalGalaxyGates', 'SkillTreeController@index')->name('internalGalaxyGates');
    //Route::get('internalCalendar', 'SkillTreeController@index')->name('internalCalendar');
    //Route::get('internalPayment', 'SkillTreeController@index')->name('internalPayment');

    // Admin-Pages
    Route::get('internalAdmin', 'SkillTreeController@index')->name('internalAdmin');
});