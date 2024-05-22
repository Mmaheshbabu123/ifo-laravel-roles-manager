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





Route::group(['prefix'=>"ifo-roles",'as' => 'admin.','namespace' => 'Packages\RoleManager\App\Http\Controllers\Admin','middleware' => ['auth','Packages\RoleManager\App\Http\Middleware\AdminPanelAccess']], function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/permission_classfications', 'PermissionClassificationsController')->except(['show']);
    Route::resource('/users', 'UserController');
    Route::resource('/roles', 'RoleController');
    Route::resource('/permissions', 'PermissionController')->except(['show']);

});
