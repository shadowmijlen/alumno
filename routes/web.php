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

#Accion Listar Alumna
Route::get('/', 'AlumnoController@index')->name('alumno');
#Accion Formulario crear Alumna
Route::get('/crear-alumno', 'AlumnoController@create')->name('crear_alumno');
#Accion Registrar Alumna
Route::post('/registrar-alumno', 'AlumnoController@store')->name('registrar_alumno');
#Accion Editar Alumna
Route::get('/editar-alumno/{alumno}', 'AlumnoController@edit')->name('editar_alumno');
#Accion Actualizar Alumna
Route::put('/actualizar-alumno', 'AlumnoController@update')->name('actualizar_alumno');
#Accion Eliminar Alumna
Route::put('/eliminar-alumno', 'AjaxController@eliminar_alumno')->name('eliminar_alumno');