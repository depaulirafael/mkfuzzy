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

//Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@index')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// User Routes...
Route::get('user', 'Auth\RegisterController@user')->name('user');
Route::post('user', 'Auth\RegisterController@update');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/agua', 'AguaController@index')->name('agua');
Route::post('/agua', 'AguaController@save')->name('agua');
Route::get('/carboidratos', 'CarboidratosController@index')->name('carboidratos');
Route::post('/carboidratos', 'CarboidratosController@save')->name('carboidratos');
Route::get('/proteinas', 'ProteinasController@index')->name('proteinas');
Route::post('/proteinas', 'ProteinasController@save')->name('proteinas');
Route::get('/micronutrientes', 'MicronutrientesController@index')->name('micronutrientes');
Route::post('/micronutrientes', 'MicronutrientesController@save')->name('micronutrientes');
Route::get('/resultado', 'ResultadoController@index')->name('resultado');
Route::post('/resultado', 'ResultadoController@save')->name('resultado');

Route::resource('animais','AnimalController')->middleware('auth');
Route::resource('racas','RacaController')->middleware('auth');
Route::resource('regras','RegraController')->middleware('auth');