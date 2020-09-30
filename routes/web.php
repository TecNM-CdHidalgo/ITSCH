<?php

use Illuminate\Support\Facades\Route;


//Rutas publicas**************************************************************************
//Transparecia
Route::get('transparencia/acceso_transparencia',function(){return view('content.transparencia.acceso_transparencia');})->name('transparencia.acceso_transparencia');
//Vinculacion
Route::get('calidad/rippa',function(){return view('content.calidad.rippa');})->name('calidad.rippa');
Route::get('vinculacion/bolsa-de-trabajo',function(){return view('content.vinculacion.bolsa-de-trabajo');})->name('vinculacion.bolsa-de-trabajo');

Route::get('vinculacion/bolsa-de-trabajo',function(){return view('content.vinculacion.convenio_colaboraciongi');})->name('vinculacion.convenio_colaboracion');
Route::get('vinculacion/banco_de_datos',function(){return view('content.vinculacion.banco_de_datos');})->name('vinculacion.banco_de_datos');


Route::get('vinculacion/convenio_colaboracion',function(){return view('content.vinculacion.convenios');})->name('vinculacion.convenios');

Route::get('vinculacion/convenios',function(){return view('content.vinculacion.convenios');})->name('vinculacion.convenios');

Route::get('vinculacion/cultura_deporte',function(){return view('content.vinculacion.cultura_deporte');})->name('vinculacion.cultura_deporte');

Route::get('vinculacion/informacion',function(){return view('content.vinculacion.informacion');})->name('vinculacion.informacion');

Route::get('vinculacion/residencias',function(){return view('content.vinculacion.residencias');})->name('vinculacion.residencias');

Route::get('vinculacion/servicio-social',function(){return view('content.vinculacion.servicio-social');})->name('vinculacion.servcio-social');

Route::get('vinculacion/incubadora_empresas',function(){return view('content.vinculacion.incubadora_empresas');})->name('vinculacion.incubadora_empresas');

//Rutas de oferta educativa
Route::get('oferta_educativa/sistemas',function(){return view('content.oferta_educativa.sistemas');})->name('oferta.sistemas');
Route::get('oferta_educativa/tics',function(){return view('content.oferta_educativa.tics');})->name('oferta.tics');
Route::get('oferta_educativa/industrial',function(){return view('content.oferta_educativa.industrial');})->name('oferta.industrial');
Route::get('oferta_educativa/bioquimica',function(){return view('content.oferta_educativa.bioquimica');})->name('oferta.bioquimica');
Route::get('oferta_educativa/nano',function(){return view('content.oferta_educativa.nano');})->name('oferta.nano');
Route::get('oferta_educativa/gestion',function(){return view('content.oferta_educativa.gestion');})->name('oferta.gestion');
Route::get('oferta_educativa/mecatronica',function(){return view('content.oferta_educativa.mecatronica');})->name('oferta.mecatronica');


//Rutas de instituto
Route::get('instituto/nuestro_tec',function(){return view('content.instituto.nuestro_tec');})->name('instituto.nuestro_tec');
Route::get('instituto/directorio',function(){return view('content.instituto.directorio');})->name('instituto.directorio');
Route::get('instituto/ubicacion',function(){return view('content.instituto.ubicacion');})->name('instituto.ubicacion');
//Rutas departamentos
Route::get('departamentos/caja',function(){return view('content.departamentos.caja');})->name('departamentos.caja');


//Servicos escolares
Route::get('servicios_escolares/titulos_cedulas',function(){return view('content.servicios_escolares.titulos_cedulas');})->name('servicios_escolares.titulos_cedulas');
Route::get('servicios_escolares/alumnos-traslados',function(){return view('content.servicios_escolares.alumnos-traslados');})->name('servicios_escolares.alumnos-traslados');

//Normativos y lineamientos
Route::get('normativos/calidad',function(){return view('content.normativos.calidad');})->name('normativos.calidad');
Route::get('normativos/igualdad',function(){return view('content.normativos.igualdad');})->name('normativos.igualdad');
Route::get('normativos/ambiental',function(){return view('content.normativos.ambiental');})->name('normativos.ambiental');
Route::get('normativos/rippa',function(){return view('content.normativos.rippa');})->name('normativos.rippa');
Route::get('normativos/plan2004',function(){return view('content.normativos.plan2004');})->name('normativos.plan2004');
Route::get('normativos/plan2010',function(){return view('content.normativos.plan2010');})->name('normativos.plan2010');


Route::get('normativos/plan2015',function(){return view('content.normativos.plan2015');})->name('normativos.plan2015');
Route::get('normativos/piid',function(){return view('content.normativos.piid');})->name('normativos.piid');



//Ruta para tutorias 
Route::get('tutotias/tutorias',function(){return view('content.tutorias.tutorias');})->name('tutorias.tutorias');







//Ruta para visualizar las noticias
Route::get('/','IndexController@index')->name('inicio');
Route::get('Noticias/Ver/{id}','IndexController@ver')->name('ver');
Auth::routes();

//Rutas publicas




//Rutas privadas****************************************************************************
Route::group(['middleware' => 'auth'],function(){
	Route::get('/home', 'HomeController@index')->name('home');

	//Rutas de usuarios
	Route::get('users/index','UserController@index')->name('admin.usuarios.inicio');
	Route::get('users/crear','UserController@create')->name('admin.usuarios.crear');
	Route::get('users/editar/{id}','UserController@edit')->name('admin.usuarios.editar');
	Route::post('users/mod/{id}','UserController@update')->name('admin.usuarios.modificar');
	Route::get('users/eliminar','UserController@destroy')->name('admin.usuarios.eliminar');
	Route::post('usuarios/guardar','UserController@save')->name('admin.usuarios.guardar');

	//Rutas de noticias
	Route::get('noticias/index','NoticiasController@index')->name('admin.noticias.inicio');
	Route::get('noticias/crear','NoticiasController@create')->name('admin.noticias.crear');
	Route::post('noticias/guardar','NoticiasController@save')->name('admin.noticias.guardar');
	Route::get('noticias/editar/{id}','NoticiasController@edit')->name('admin.noticias.editar');
	Route::post('noticias/modificar/{id}','NoticiasController@update')->name('admin.noticias.modificar');
	Route::get('noticias/eliminar','NoticiasController@destroy')->name('admin.noticias.eliminar');
	Route::get('noticias/vista_previa/{id}','NoticiasController@view')->name('admin.noticias.ver');

	//Rutas de perfil
	Route::get('usuarios/perfil','PerfilController@index')->name('admin.usuarios.mi_perfil');
    Route::get('usuarios/perfil/editar','PerfilController@miPerfilEditar')->name('admin.usuarios.mi_perfil_editar');
    Route::post('usuarios/perfil/modificar','PerfilController@miPerfilModificar')->name('admin.usuarios.mi_perfil_modificar');
    Route::get('usuarios/perfil/editar_password','PerfilController@miPerfilEditarPassword')->name('admin.usuarios.mi_perfil_editar_password');
    Route::post('usuarios/perfil/modificar_password','PerfilController@miPerfilModificarPassword')->name('admin.usuarios.mi_perfil_modificar_password');

});
