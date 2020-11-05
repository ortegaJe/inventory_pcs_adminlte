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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('machines', 'MachineController');
Route::resource('technicians', 'UserController');
Route::resource('/profile/username', 'ProfileController');
Route::resource('roles', 'RoleController');
Route::resource('campus', 'CampuController'); // colocar un solo controlador para las sedes
Route::resource('/sedes/macarena', 'MacarenaController');
Route::resource('/sedes/carrera_16', 'CaDieciseisController');
Route::resource('/sedes/sura_san_jose', 'SuraSanJoseController');
Route::resource('/sedes/calle_30', 'CaTreintaController');
Route::resource('/sedes/soledad', 'SoledadController');
Route::resource('parts', 'PartController');
Route::resource('ram', 'RamController');
Route::resource('hdd', 'HddController');
Route::resource('type', 'TypeController');

//Route::get('/getusersysteminfo', 'UserSystemInfoController@getusersysteminfo');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
