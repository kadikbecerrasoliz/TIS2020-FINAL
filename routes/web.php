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

Route::post('postulantes/store', 'PostulanteController@store')->name('postulantes.store');
Route::get('postulantes/create', 'PostulanteController@create')->name('postulantes.create');
//Convocatorias publicas
Route::get('convoc', 'ConvocatoriaController@view')->name('convoc.view');
Route::get('convoc/{convocatoria}', 'ConvocatoriaController@viewshow')->name('convoc.show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
	//Roles
	Route::get('roles', 'RoleController@index')->name('roles.index')
		->middleware('permission:roles.index');
	Route::post('roles/store', 'RoleController@store')->name('roles.store')
		->middleware('permission:roles.create');
	Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
		->middleware('permission:roles.edit');
	Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
		->middleware('permission:roles.destroy');

	//Users
	Route::get('users', 'UserController@index')->name('users.index')
		->middleware('permission:users.index');
    Route::post('users/store', 'UserController@store')->name('users.store')
		->middleware('permission:users.create');
	Route::put('users/{user}', 'UserController@update')->name('users.update')
		->middleware('permission:users.edit');
	Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
		->middleware('permission:users.destroy');

	//Materias
	Route::get('materias', 'MateriaController@index')->name('materias.index')
		->middleware('permission:materias.index');
	Route::post('materias/store', 'MateriaController@store')->name('materias.store')
	->middleware('permission:materias.create');
	Route::put('materias/{materia}', 'MateriaController@update')->name('materias.update')
		->middleware('permission:materias.edit');
	Route::delete('materias/{materia}', 'MateriaController@destroy')->name('materias.destroy')
		->middleware('permission:materias.destroy');

	//Convocatorias
	Route::get('convocatorias', 'ConvocatoriaController@index')->name('convocatorias.index')
		->middleware('permission:convocatorias.index');
	Route::get('convocatorias/revision', 'ConvocatoriaController@showVistaParaRevision')->name('convocatorias.revision.index')
		->middleware('permission:archivos.show');
	Route::post('convocatorias/store', 'ConvocatoriaController@store')->name('convocatorias.store')
	->middleware('permission:convocatorias.create');
	Route::put('convocatorias/{convocatoria}', 'ConvocatoriaController@update')->name('convocatorias.update')
		->middleware('permission:convocatorias.edit');
	Route::delete('convocatorias/{convocatoria}', 'ConvocatoriaController@destroy')->name('convocatorias.destroy')
		->middleware('permission:convocatorias.destroy');
	Route::get('convocatorias/{convocatoria}', 'ConvocatoriaController@show')->name('convocatorias.show')
		->middleware('permission:convocatorias.show');

	//Requerimientos
	Route::post('requerimientos/store', 'RequerimientoController@store')->name('requerimientos.store')
	->middleware('permission:convocatorias.create');
	Route::put('requerimientos/{requerimiento}', 'RequerimientoController@update')->name('requerimientos.update')
		->middleware('permission:convocatorias.edit');
	Route::delete('requerimientos/{requerimiento}', 'RequerimientoController@destroy')->name('requerimientos.destroy')
		->middleware('permission:convocatorias.destroy');

	//Requisitos
	Route::post('requisitos/store', 'RequisitoController@store')->name('requisitos.store')
	->middleware('permission:convocatorias.create');
	Route::put('requisitos/{requisito}', 'RequisitoController@update')->name('requisitos.update')
		->middleware('permission:convocatorias.edit');
	Route::delete('requisitos/{requisito}', 'RequisitoController@destroy')->name('requisitos.destroy')
		->middleware('permission:convocatorias.destroy');

	//Documentos
	Route::post('documentos/store', 'DocumentoController@store')->name('documentos.store')
	->middleware('permission:convocatorias.create');
	Route::put('documentos/{documento}', 'DocumentoController@update')->name('documentos.update')
	->middleware('permission:convocatorias.edit');
	Route::delete('documentos/{documento}', 'DocumentoController@destroy')->name('documentos.destroy')
	->middleware('permission:convocatorias.destroy');

	//Fechas
	Route::post('fechas/store', 'FechaController@store')->name('fechas.store')
	->middleware('permission:convocatorias.create');
	Route::put('fechas/{fecha}', 'FechaController@update')->name('fechas.update')
		->middleware('permission:convocatorias.edit');
	Route::delete('fechas/{fecha}', 'FechaController@destroy')->name('fechas.destroy')
		->middleware('permission:convocatorias.destroy');

	//Meritos
	Route::post('meritos/store', 'MeritoController@store')->name('meritos.store')
		->middleware('permission:convocatorias.create');
	Route::put('meritos/{merito}', 'MeritoController@update')->name('meritos.update')
		->middleware('permission:convocatorias.edit');
	Route::delete('meritos/{merito}', 'MeritoController@destroy')->name('meritos.destroy')
		->middleware('permission:convocatorias.destroy');

	//Meritos Items
	Route::post('items/store', 'ItemController@store')->name('items.store')
		->middleware('permission:convocatorias.create');
	Route::put('items/{item}', 'ItemController@update')->name('items.update')
		->middleware('permission:convocatorias.edit');
	Route::delete('items/{item}', 'ItemController@destroy')->name('items.destroy')
		->middleware('permission:convocatorias.destroy');

	//Meritos Items Subitems
	Route::post('subitems/store', 'SubitemController@store')->name('subitems.store')
		->middleware('permission:convocatorias.create');
	Route::put('subitems/{subitem}', 'SubitemController@update')->name('subitems.update')
		->middleware('permission:convocatorias.edit');
	Route::delete('subitems/{subitem}', 'SubitemController@destroy')->name('subitems.destroy')
		->middleware('permission:convocatorias.destroy');

	//Meritos Items Subitems Detalle
	Route::post('detalles/store', 'DetalleController@store')->name('detalles.store')
		->middleware('permission:convocatorias.create');
	Route::put('detalles/{detalle}', 'DetalleController@update')->name('detalles.update')
		->middleware('permission:convocatorias.edit');
	Route::delete('detalles/{detalle}', 'DetalleController@destroy')->name('detalles.destroy')
		->middleware('permission:convocatorias.destroy');

	//Solicitudes
	Route::get('solicituds', 'SolicitudController@index')->name('solicituds.index')
		->middleware('permission:solicituds.index');
	Route::post('solicituds/store', 'SolicitudController@store')->name('solicituds.store')
		->middleware('permission:solicituds.create');
	Route::get('solicituds/apply/{id}', 'SolicitudController@apply')->name('solicituds.apply')
		->middleware('permission:solicituds.edit');
	Route::get('solicituds/deny/{id}', 'SolicitudController@deny')->name('solicituds.deny')
		->middleware('permission:solicituds.edit');

	//Postulation
	Route::get('postulations', 'PostulationController@index')->name('postulations.index')
		->middleware('permission:postulations.index');
	Route::get('postulations/{convocatoria}/revisiones', 'PostulationController@showPostulationsPerConvocatoria')->name('postulations.perConvocatoria')
		->middleware('permission:postulations.index');
	Route::put('postulation/{postulation}/examen', 'PostulationController@editarCalificacionFinal')->name('postulations.editPuntajeExamen')
		->middleware('permission:certificados.edit');
	Route::delete('postulations/{postulation}', 'PostulationController@destroy')->name('postulations.destroy')
		->middleware('permission:postulations.destroy');

	//Postulante
	Route::get('postulantes/solicitudes', 'PostulanteController@solicitudes')->name('postulantes.solicitudes')
		->middleware('permission:postulantes.index');
	Route::get('postulantes/postulaciones', 'PostulanteController@postulations')->name('postulantes.postulations')
		->middleware('permission:postulantes.index');
	Route::get('postulantes/cargar/{postulation}', 'PostulanteController@cargar')->name('postulantes.cargar')
		->middleware('permission:postulantes.index');

	//Archivo
	Route::post('archivos/store', 'ArchivoController@store')->name('archivos.store')
		->middleware('permission:postulantes.index');
	Route::get('postulacion/{archivo}', 'ArchivoController@showArchivosPerPostulation')->name('archivos.perPostulation')
		->middleware('permission:archivos.show');
	Route::get('archivo/aceptar/{id}', 'ArchivoController@accept')->name('archivos.accept')
		->middleware('permission:archivos.edit');
	Route::put('archivo/denegar/{archivo}', 'ArchivoController@deny')->name('archivos.deny')
		->middleware('permission:archivos.edit');
	Route::delete('archivos/{archivo}', 'ArchivoController@destroy')->name('archivos.destroy')
		->middleware('permission:postulantes.index');

	//Certificados
	Route::post('certificados/store', 'CertificadoController@store')->name('certificados.store')
		->middleware('permission:postulantes.index');
	Route::get('{postulation}/certificados', 'CertificadoController@showCertificadosPerPostulation')->name('certificados.perPostulation')
		->middleware('permission:certificados.show');
	Route::put('certificado/{certificado}', 'CertificadoController@update')->name('certificados.update')
		->middleware('permission:certificados.edit');
	Route::delete('certificados/{certificado}', 'CertificadoController@destroy')->name('certificados.destroy')
		->middleware('permission:postulantes.index');
});