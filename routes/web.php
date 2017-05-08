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

Route::get('/','UsuariosController@login');

Route::post('iniciar-sesion','UsuariosController@autenticar');
Route::post('logout','UsuariosController@logout');

Route::get('dashboard','UsuariosController@dashboard');
Route::get('roles','RolesController@index');
Route::get('tabla-roles','RolesController@tabla');
Route::get('formulario-roles','RolesController@formulario');
Route::post('registrar-roles','RolesController@registrar');
Route::post('actualizar-roles','RolesController@actualizar');
Route::post('eliminar-roles','RolesController@eliminar');

Route::get('procesos','ProcesosController@index');
Route::get('tabla-procesos','ProcesosController@tabla');
Route::get('formulario-procesos','ProcesosController@formulario');
Route::post('registrar-procesos','ProcesosController@registrar');
Route::post('actualizar-procesos','ProcesosController@actualizar');
Route::post('eliminar-procesos','ProcesosController@eliminar');

Route::get('usuarios','UsuariosController@index');
Route::get('formulario-usuarios','UsuariosController@formulario');
Route::get('tabla-usuarios','UsuariosController@tabla');
Route::post('registrar-usuarios','UsuariosController@registrar');
Route::post('actualizar-usuarios','UsuariosController@actualizar');
Route::post('eliminar-usuarios','UsuariosController@eliminar');

Route::get('personal','PersonalesController@index');
Route::get('tabla-personal','PersonalesController@tabla');
Route::get('formulario-personal','PersonalesController@formulario');
Route::post('registrar-personal','PersonalesController@registrar');
Route::post('actualizar-personal','PersonalesController@actualizar');
Route::post('eliminar-personal','PersonalesController@eliminar');

Route::get('productos','ProductosController@index');
Route::get('tabla-productos','ProductosController@tabla');
Route::get('formulario-productos','ProductosController@formulario');
Route::post('registrar-productos','ProductosController@registrar');
Route::post('actualizar-productos','ProductosController@actualizar');
Route::post('eliminar-productos','ProductosController@eliminar');

Route::get('identificate','UsuariosController@identificate');

Route::get('listado-postulantes','VentaController@postulante');
Route::get('ventas','VentaController@index');
Route::post('registrar-venta', 'VentaController@registrar');
Route::get('anular-venta','VentaController@anular');
Route::post('buscar-comprobante','VentaController@buscar');
Route::post('anular-comprobante','VentaController@anularrecibo');
Route::get('PDFRecibo', 'VentaController@EmitirReciboPDF')->name('PDFRecibo');