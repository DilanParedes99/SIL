<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::group(['middleware' => ['web', 'XSS']], function() {
	Route::get('/', function () {
   	 	if((Auth::check())){
   	 		Session(['sistema' => 1]);
   	 		return view('administracion.index');
   	 	}else {
   	 		return view('auth.login');
   	 	}
	});

	Route::group(['middleware' => 'auth'], function() {
		Route::get('/sistemas', function () {
			Session(['sistema' => 1]);
			return view('administracion.index');
		});

		Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

		Route::get('/inicio', function() { return view('inicio'); });

		include('administracion.php');//Agregar las rutas para el módulo de administración en este archivo
	});
});
