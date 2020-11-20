<?php

use App\Http\Controllers\RamController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');

Route::resource('machines', 'MachineController')->middleware('admin');
//Route::resource('machines/charts', 'MachineController@charts')->middleware('admin');
Route::resource('technicians', 'UserController')->middleware('admin');
Route::resource('/profile/username', 'ProfileController');
Route::resource('roles', 'RoleController')->middleware('admin');
Route::resource('campus', 'CampuController')->middleware('admin'); // colocar un solo controlador para las sedes
Route::resource('/sedes/macarena', 'MacarenaController');
Route::resource('/sedes/carrera_16', 'CaDieciseisController');
Route::resource('/sedes/sura_san_jose', 'SuraSanJoseController');
Route::resource('/sedes/calle_30', 'CaTreintaController'); //->middleware('ctreinta')
Route::resource('/sedes/soledad', 'SoledadController');
Route::resource('/sedes/kennedy', 'KennedyController');
Route::resource('parts', 'PartController')->middleware('admin');
Route::resource('ram', 'RamController')->middleware('admin');
Route::resource('hdd', 'HddController')->middleware('admin');
Route::resource('type', 'TypeController')->middleware('admin');

//Route::get('/getusersysteminfo', 'UserSystemInfoController@getusersysteminfo');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
