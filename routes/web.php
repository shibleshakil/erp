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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::match(['get', 'post'], 'profile/{id}/edit', 'App\Http\Controllers\HomeController@updateProfile')->name('updateProfile');
Route::match(['get', 'post'], 'password/{id}/edit', 'App\Http\Controllers\HomeController@changePassword')->name('changePassword');
Route::get('/make-quotation', 'App\Http\Controllers\HomeController@makeQuotation')->name('makeQuotation');

Route::match(['get', 'post'], 'app-setting', 'App\Http\Controllers\Setup\AppController@appSetting')->name('appSetting');
Route::match(['get', 'post'], 'email-setting', 'App\Http\Controllers\Setup\AppController@emailSetup')->name('emailSetup');

Route::prefix('admin')->group(function(){
    Route::delete('category/{id}', 'App\Http\Controllers\Back\CategoryController@delete')->name('category.delete');
    Route::put('category/{id}', 'App\Http\Controllers\Back\CategoryController@restore')->name('category.restore');
    Route::resource('category', 'App\Http\Controllers\Back\CategoryController')->parameters('category', 'id');
    Route::post('category/update', 'App\Http\Controllers\Back\CategoryController@update')->name('category.update');

});
