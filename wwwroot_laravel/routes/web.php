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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Internal')->group(function() {
    Route::get('internalShop', 'Internal\ShopController@index')->name('internalShop');
    Route::get('internalStart', 'Internal\ShopController@index')->name('internalStart');
    Route::get('internalHangar', 'Internal\ShopController@index')->name('internalHangar');
    Route::get('internalSkillTree', 'Internal\SkillTreeController@index')->name('internalSkillTree');
    Route::get('internalMapRevolution', 'Internal\SkillTreeController@index')->name('internalMapRevolution');
    Route::get('internalCompanyChoose', 'Internal\SkillTreeController@index')->name('internalCompanyChoose');
    Route::get('internalClan', 'Internal\SkillTreeController@index')->name('internalClan');
    Route::get('internalSettings', 'Internal\SkillTreeController@index')->name('internalSettings');
    Route::get('internalSkylab', 'Internal\SkillTreeController@index')->name('internalSkylab');
    //Route::get('internalAuction', 'Internal\SkillTreeController@index')->name('internalAuction');
    Route::get('internalMessaging', 'Internal\SkillTreeController@index')->name('internalMessaging');
    Route::get('internalGalaxyGates', 'Internal\SkillTreeController@index')->name('internalGalaxyGates');
    //Route::get('internalCalendar', 'Internal\SkillTreeController@index')->name('internalCalendar');
    //Route::get('internalPayment', 'Internal\SkillTreeController@index')->name('internalPayment');

    // Admin-Pages
    Route::get('internalAdmin', 'Internal\SkillTreeController@index')->name('internalAdmin');
});