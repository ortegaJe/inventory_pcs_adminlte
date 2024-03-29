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

Route::prefix('/dashboard/admin')->middleware('admin')->group(function () {
    Route::resource('/machines', 'MachineController');
    Route::get('/export_excel', 'MachineController@export_excel');
    Route::get('/export_pdf', 'MachineController@exportPdf');
    Route::resource('/reportes-pc', 'ReportController')->names('report.pc');
    Route::get('/crearReporte={id}', 'ReportController@createReport')->name('create.report.pc');
    Route::post('/guardar-reporte', 'ReportController@saveReport')->name('save.report.pc');
    Route::get('/reporte-generado/{id}=Repo={nombrerepo?}=SerialPc={serial?}', 'ReportController@generatedReport')->name('generated.report.pc');

    //Route::get('/crearReporte={id}', 'ReportController@createReport')->name('create.report.acta.entrega.pc');
    Route::post('/guardar-reporte-acta-entrega', 'ReportController@saveReportActaEntrega')->name('save.report.acta.entrega.pc');
    Route::get('/reporte-generado-acta-entrega/{id}', 'ReportController@generatedReportActaEntrega')->name('generated.report.acta.entrega.pc');

    Route::post('/guardar-reporte-hv-equipo-informatico', 'ReportController@saveReportHvPc')->name('save.report.hv.pc');
    Route::get('/reporte-generado-hv-equipo-informatico/{id}', 'ReportController@generatedReportHvPc')->name('generated.report.hv.pc');
});

Route::post('/technicians/script', 'UserController@script');
Route::get('/technicians/export', 'UserController@export')->middleware('admin');
Route::get('/technicians/hi', 'UserController@hi')->middleware('admin');
Route::resource('/dashboard/admin/technicians', 'UserController')->middleware('admin');
Route::resource('/profile/username', 'ProfileController');

Route::resource('/dashboard/admin/roles', 'RoleController')->middleware('admin');
Route::resource('/dashboard/admin/campus', 'CampuController')->middleware('admin'); // colocar un solo controlador para las sedes
Route::get('/campus/export', 'CampuController@export')->middleware('admin'); // colocar un solo controlador para las sedes

Route::resource('/sedes/macarena', 'MacarenaController');
Route::get('/macarena/export_excel', 'MacarenaController@export_excel');
Route::get('/macarena/export_pdf', 'MacarenaController@export_pdf');

Route::resource('/sedes/carrera_16', 'CaDieciseisController');
Route::get('/carrera_16/export_excel', 'CaDieciseisController@export_excel');
Route::get('/carrera_16/export_pdf', 'CaDieciseisController@export_pdf');

Route::resource('/sedes/sura_san_jose', 'SuraSanJoseController');

Route::resource('/sedes/calle_30', 'CaTreintaController'); //->middleware('ctreinta')
Route::get('/calle_30/export_excel', 'CaTreintaController@export_excel');
Route::get('/calle_30/export_pdf', 'CaTreintaController@export_pdf');

Route::resource('/sedes/soledad', 'SoledadController');
Route::get('/soledad/export_excel', 'SoledadController@export_excel');
Route::get('/soledad/export_pdf', 'SoledadController@export_pdf');

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

Route::resource('/dashboard/admin/parts', 'PartController')->middleware('admin');
Route::resource('/dashboard/admin/ram', 'RamController')->middleware('admin');
Route::resource('/dashboard/admin/hdd', 'HddController')->middleware('admin');
Route::resource('/dashboard/admin/type', 'TypeController')->middleware('admin');

//Route::get('/getusersysteminfo', 'UserSystemInfoController@getusersysteminfo');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
