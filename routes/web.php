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

Route::prefix('inventor')->group(function () {
    Route::resource('/machines', 'MachineController')->middleware('admin');
    Route::get('/export_excel', 'MachineController@export_excel')->middleware('admin');
    Route::get('/export_pdf', 'MachineController@exportPdf')->middleware('admin');
});

Route::post('/technicians/script', 'UserController@script');
Route::get('/technicians/export', 'UserController@export')->middleware('admin');
Route::get('/technicians/hi', 'UserController@hi')->middleware('admin');
Route::resource('technicians', 'UserController')->middleware('admin');
Route::resource('/profile/username', 'ProfileController');

Route::resource('roles', 'RoleController')->middleware('admin');
Route::resource('campus', 'CampuController')->middleware('admin'); // colocar un solo controlador para las sedes
Route::get('/campus/export', 'CampuController@export')->middleware('admin'); // colocar un solo controlador para las sedes

Route::resource('/sedes/macarena', 'MacarenaController');
Route::get('/macarena/export_excel', 'MacarenaController@export_excel');
Route::get('/macarena/export_pdf', 'MacarenaController@export_pdf');

Route::resource('/sedes/carrera_16', 'CaDieciseisController');
Route::get('/carrera_16/export_excel', 'CaDieciseisController@export_excel');
Route::get('/carrera_16/export_pdf', 'CaDieciseisController@export_pdf');

Route::resource('/sedes/sura_san_jose', 'SuraSanJoseController');
Route::resource('/sedes/calle_30', 'CaTreintaController'); //->middleware('ctreinta')
Route::resource('/sedes/soledad', 'SoledadController');
Route::resource('/sedes/kennedy', 'KennedyController');

Route::resource('/sedes/sura_85', 'SuraOchoCincoController');
Route::get('/sura_85/export_excel', 'SuraOchoCincoController@export_excel');
Route::get('/sura_85/export_pdf', 'SuraOchoCincoController@export_pdf');

Route::resource('/sedes/compensar', 'CompensarController');
Route::get('/compensar/export_excel', 'CompensarController@export_excel');
Route::get('/compensar/export_pdf', 'CompensarController@export_pdf');

Route::resource('/sedes/country', 'CountryController');
Route::get('/country/export_excel', 'CountryController@export_excel');
Route::get('/country/export_pdf', 'CountryController@export_pdf');

Route::prefix('/santa_marta')->group(function () {
    Route::resource('/sedes/cienaga', 'SantaMarta\Cienaga\CienagaController');
    Route::resource('/sedes/marinelo', 'SantaMarta\Marinelo\MarineloController');
    Route::resource('/sedes/riohacha', 'SantaMarta\Riohacha\RiohachaController');
    Route::resource('/sedes/carrera_12', 'SantaMarta\CarreraDoce\CarreraDoceController');
    Route::resource('/sedes/valledupar', 'SantaMarta\Valledupar\ValleduparController');
});

Route::resource('parts', 'PartController')->middleware('admin');
Route::resource('ram', 'RamController')->middleware('admin');
Route::resource('hdd', 'HddController')->middleware('admin');
Route::resource('type', 'TypeController')->middleware('admin');

//Route::get('/getusersysteminfo', 'UserSystemInfoController@getusersysteminfo');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
