<?php

use Illuminate\Support\Facades\Route;

//use Intervention\Image\Image;
//use Image;
use Intervention\Image\ImageManagerStatic as Image;

//use Intervention\Image\Filters\FilterInterface;


//Rutas publicas**************************************************************************
//Rutas para descarga de archivos de noticias
Route::get('/download/{id_not}/{nomImg}', 'IndexController@getDownload');
//Transparecia
Route::get('transparencia/acceso_transparencia',function(){return view('content.transparencia.acceso_transparencia');})->name('transparencia.acceso_transparencia');
//Vinculacion
Route::get('calidad/rippa',function(){return view('content.calidad.rippa');})->name('calidad.rippa');
Route::get('vinculacion/bolsa-de-trabajo',function(){return view('content.vinculacion.bolsa-de-trabajo');})->name('vinculacion.bolsa-de-trabajo');

Route::get('vinculacion/banco_de_datos',function(){return view('content.vinculacion.banco_de_datos');})->name('vinculacion.banco_de_datos');


Route::get('vinculacion/convenio_colaboracion',function(){return view('content.vinculacion.convenio_colaboracion');})->name('vinculacion.convenio_colaboracion');

Route::get('vinculacion/convenios',function(){return view('content.vinculacion.convenios');})->name('vinculacion.convenios');

Route::get('vinculacion/cultura_deporte',function(){return view('content.vinculacion.cultura_deporte');})->name('vinculacion.cultura_deporte');

Route::get('vinculacion/informacion',function(){return view('content.vinculacion.informacion');})->name('vinculacion.informacion');

Route::get('vinculacion/residencias',function(){return view('content.vinculacion.residencias');})->name('vinculacion.residencias');

Route::get('vinculacion/servicio-social',function(){return view('content.vinculacion.servicio-social');})->name('vinculacion.servcio-social');


//Rutas de cle
Route::get('cle/acreditacion-de-ingles',function(){return view('content.cle.acreditacion-de-ingles');})->name('cle.acreditacion-de-ingles');
Route::get('cle/acreditacion2013',function(){return view('content.cle.acreditacion2013');})->name('cle.acreditacion2013');
Route::get('cle/acreditacion2014',function(){return view('content.cle.acreditacion2014');})->name('cle.acreditacion2014');
Route::get('cle/becasingles',function(){return view('content.cle.becasingles');})->name('cle.becasingles');
Route::get('cle/cursoConversacion',function(){return view('content.cle.cursoConversacion');})->name('cle.cursoConversacion');
Route::get('cle/cursoToefl',function(){return view('content.cle.cursoToefl');})->name('cle.cursoToefl');
Route::get('cle/diplomado',function(){return view('content.cle.diplomado');})->name('cle.diplomado');
Route::get('cle/examenAcreditacion',function(){return view('content.cle.examenAcreditacion');})->name('cle.examenAcreditacion');
Route::get('cle/informacion',function(){return view('content.cle.informacion');})->name('cle.informacion');
Route::get('cle/ingles-para-adultos',function(){return view('content.cle.ingles-para-adultos');})->name('cle.ingles-para-adultos');
Route::get('cle/ingles-para-ninos',function(){return view('content.cle.ingles-para-ninos');})->name('cle.ingles-para-ninos');
Route::get('cle/ingles-para-secundaria',function(){return view('content.cle.ingles-para-secundaria');})->name('cle.ingles-para-secundaria');
Route::get('cle/traduccionDocumentos',function(){return view('content.cle.traduccionDocumentos');})->name('cle.traduccionDocumentos');





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

//Rutas de instituto
Route::get('investigacion/investigacion',function(){return view('content.investigacion.investigacion');})->name('investigacion.investigacion');
Route::get('calidad/proceso_seleccion',function(){return view('content.calidad.proceso_seleccion');})->name('calidad.proceso_seleccion');
Route::get('calidad/reglamento',function(){return view('content.calidad.reglamento');})->name('calidad.reglamento');
Route::get('calidad/reglamento_int',function(){return view('content.calidad.reglamento_int');})->name('calidad.reglamento_int');
Route::get('calidad/resultados_evaluacion',function(){return view('content.calidad.resultados_evaluacion');})->name('calidad.resultados_evaluacion');
Route::get('calidad/organizacional',function(){return view('content.calidad.organizacional');})->name('calidad.organizacional');
Route::get('calidad/procedimientos',function(){return view('content.calidad.procedimientos');})->name('calidad.procedimientos');
Route::get('calidad/procedimientos',function(){return view('content.calidad.procedimientos');})->name('calidad.procedimientos');


Route::get('calidad/reglamento',function(){return view('content.calidad.reglamento');})->name('calidad.reglamento');
Route::get('calidad/reglamento_int',function(){return view('content.calidad.reglamento_int');})->name('calidad.reglamento_int');

//Servicos escolares
Route::get('servicios_escolares/titulos_cedulas',function(){return view('content.servicios_escolares.titulos_cedulas');})->name('servicios_escolares.titulos_cedulas');
Route::get('servicios_escolares/alumnos-traslados',function(){return view('content.servicios_escolares.alumnos-traslados');})->name('servicios_escolares.alumnos-traslados');
Route::get('servicios_escolares/servicios',function(){return view('content.servicios_escolares.servicios');})->name('servicios_escolares.servicios');

//Alumnos 
Route::get('alumnos/prorrogas',function(){return view('content.alumnos.prorrogas');})->name('alumnos.prorrogas');
Route::get('alumnos/empleadores',function(){return view('content.alumnos.empleadores');})->name('alumnos.empleadores');
Route::get('alumnos/encuestasservicio',function(){return view('content.alumnos.encuestasservicio');})->name('alumnos.encuestasservicio');
Route::get('alumnos/evaluatutor',function(){return view('content.alumnos.evaluatutor');})->name('alumnos.evaluatutor');



//Normativos y lineamientos
Route::get('normativos/calidad',function(){return view('content.normativos.calidad');})->name('normativos.calidad');
Route::get('normativos/igualdad',function(){return view('content.normativos.igualdad');})->name('normativos.igualdad');
Route::get('normativos/ambiental',function(){return view('content.normativos.ambiental');})->name('normativos.ambiental');
Route::get('normativos/rippa',function(){return view('content.normativos.rippa');})->name('normativos.rippa');
Route::get('normativos/plan2004',function(){return view('content.normativos.plan2004');})->name('normativos.plan2004');
Route::get('normativos/plan2010',function(){return view('content.normativos.plan2010');})->name('normativos.plan2010');
Route::get('programa_capacitacion/programacapacitacion2020.pdf',function(){return view('content.programa_capacitacion.programacapacitacion2020.pdf');})->name('programa_capacitacion.programacapacitacion2020.pdf');

Route::get('normativos/plan2015',function(){return view('content.normativos.plan2015');})->name('normativos.plan2015');
Route::get('normativos/piid',function(){return view('content.normativos.piid');})->name('normativos.piid');

Route::get('instituto/ubicacion',function(){return view('content.instituto.ubicacion');})->name('instituto.ubicacion');


Route::get('tutorias/tutorias',function(){return view('content.tutorias.tutorias');})->name('tutorias.tutorias');
Route::get('servicio/medico.medico',function(){return view('content.servicio_medico.medico');})->name('servicio_medico.medico');


//evaluacion docente
Route::get('calidad/resultados_evaluacion',function(){return view('content.calidad.resultados_evaluacion');})->name('calidad.resultados_evaluacion');


//routas de cle
Route::get('cle/avisos',function(){return view('content.cle.avisos');})->name('cle.avios');


//Ruta para visualizar las noticias
Route::get('/','IndexController@index')->name('inicio');
Route::get('Noticias/Ver/{id}','IndexController@ver')->name('ver');
Auth::routes();

//Ruta para imagenes del carousel
Route::get('/carousel/{image_name}', function($image_name)
{
	//Obtenemos la anchura de la pantalla
	$ancho = Image::make(storage_path('app/public/noticias/imagenes/'.$image_name))->width();
	$posX=((1600-$ancho)/2);
	Image::configure(array('driver' => 'gd'));
    $img = Image::canvas(1600, 400, '#000')
    ->insert(storage_path('app/public/noticias/imagenes/'.$image_name),'top-left',$posX,0);
    return $img->response('jpg');

})->name('carousel');

//Ruta para imagenes de las noticias
/*Route::get('/noticia/{image_name}', function($image_name)
{
	//Obtenemos la anchura de la pantalla
	Image::configure(array('driver' => 'gd'));
    $img = Image::make(storage_path('app/public/noticias/imagenes/'.$image_name))

    ->widen(500)
    ->resizeCanvas(500, 280, 'center', false, '000000')
    ->sharpen(10);
    return $img->response('jpg');

})->name('noticia');*/




//Fin Rutas publicas***********************************************************************




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
