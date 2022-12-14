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

    Route::delete('subCategory/{id}', 'App\Http\Controllers\Back\SubCategoryController@delete')->name('subCategory.delete');
    Route::put('subCategory/{id}', 'App\Http\Controllers\Back\SubCategoryController@restore')->name('subCategory.restore');
    Route::resource('subCategory', 'App\Http\Controllers\Back\SubCategoryController')->parameters('subCategory', 'id');
    Route::post('subCategory/update', 'App\Http\Controllers\Back\SubCategoryController@update')->name('subCategory.update');

    Route::delete('childCategory/{id}', 'App\Http\Controllers\Back\ChildCategoryController@delete')->name('childCategory.delete');
    Route::put('childCategory/{id}', 'App\Http\Controllers\Back\ChildCategoryController@restore')->name('childCategory.restore');
    Route::resource('childCategory', 'App\Http\Controllers\Back\ChildCategoryController')->parameters('childCategory', 'id');
    Route::post('childCategory/update', 'App\Http\Controllers\Back\ChildCategoryController@update')->name('childCategory.update');

    Route::delete('appliance/{id}', 'App\Http\Controllers\Back\ApplianceController@delete')->name('appliance.delete');
    Route::put('appliance/{id}', 'App\Http\Controllers\Back\ApplianceController@restore')->name('appliance.restore');
    Route::resource('appliance', 'App\Http\Controllers\Back\ApplianceController')->parameters('appliance', 'id');
    Route::post('appliance/update', 'App\Http\Controllers\Back\ApplianceController@update')->name('appliance.update');

    Route::delete('accessories/{id}', 'App\Http\Controllers\Back\AccessoriesController@delete')->name('accessories.delete');
    Route::put('accessories/{id}', 'App\Http\Controllers\Back\AccessoriesController@restore')->name('accessories.restore');
    Route::resource('accessories', 'App\Http\Controllers\Back\AccessoriesController')->parameters('accessories', 'id');
    Route::post('accessories/update', 'App\Http\Controllers\Back\AccessoriesController@update')->name('accessories.update');

    Route::delete('applianceAttribute/{id}', 'App\Http\Controllers\Back\ApplianceAttributeController@delete')->name('applianceAttribute.delete');
    Route::put('applianceAttribute/{id}', 'App\Http\Controllers\Back\ApplianceAttributeController@restore')->name('applianceAttribute.restore');
    Route::resource('applianceAttribute', 'App\Http\Controllers\Back\ApplianceAttributeController')->parameters('applianceAttribute', 'id');
    Route::post('applianceAttribute/update', 'App\Http\Controllers\Back\ApplianceAttributeController@update')->name('applianceAttribute.update');

    Route::delete('salesman/{id}', 'App\Http\Controllers\Back\SalesmanController@delete')->name('salesman.delete');
    Route::put('salesman/{id}', 'App\Http\Controllers\Back\SalesmanController@restore')->name('salesman.restore');
    Route::resource('salesman', 'App\Http\Controllers\Back\SalesmanController')->parameters('salesman', 'id');
    Route::post('salesman/{id}/update', 'App\Http\Controllers\Back\SalesmanController@update')->name('salesman.update');

});

Route::get('getSubCatAgainstCat', 'App\Http\Controllers\CommonController@getSubCatAgainstCat')->name('getSubCatAgainstCat');
Route::get('getEachApplianceAttr', 'App\Http\Controllers\CommonController@getEachApplianceAttr')->name('getEachApplianceAttr');
