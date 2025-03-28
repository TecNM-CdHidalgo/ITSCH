<?php

use App\Http\Controllers\CarrerasController;
use App\Http\Controllers\ProgramasController;
use App\Http\Controllers\TransparenciaController;
use App\Http\Controllers\ConvenioController;
use App\Http\Controllers\BuzonController;
use App\Http\Controllers\DenunciasController;
use App\Http\Controllers\BancoController;
use App\Http\Controllers\BibliotecaController;
use App\Http\Controllers\PasesController;
use App\Http\Controllers\AdeudosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AreasController;


//Rutas publicas**************************************************************************
//Rutas para descarga de archivos de noticias
Route::get('/download/{id_not}/{nomImg}', 'IndexController@getDownload');

 // Muestra el formulario de login
 Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
 // Procesa el formulario de login
 Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
 // Muestra el formulario de recuperación de contraseña
 Route::get('/password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

//Ruta del examen de nuevo ingreso
Route::get('alumnos/exani',function(){return view('content.alumnos.exani');})->name('alumnos.exani');

//Transparecia
Route::get('transparencia/aviso_privacidad',function(){return view('content.transparencia.aviso_privacidad');})->name('transparencia.aviso_privacidad');
Route::get('transparencia/informes', function(){return view('content.transparencia.informes');})->name('transparencia.informes');
Route::get('contenido/periodo/index', [TransparenciaController::class, 'index'])->name('periodo.index');
Route::get('contenido/periodo/consultar', [TransparenciaController::class, 'perConsultar'])->name('periodo.consultar');

//Rutas de vinculación
Route::get('vinculacion/bolsa-de-trabajo',function(){return view('content.vinculacion.bolsa-de-trabajo');})->name('vinculacion.bolsa-de-trabajo');
Route::get('vinculacion/banco_proyectos/{op}','BancoController@show')->name('vinculacion.banco_proyectos');
Route::get('vinculacion/banco_proyectos/verPublico/{id}','BancoController@verPublico')->name('vinculacion.banco_proyectos.verPublico');
Route::get('vinculacion/fichas2021',function(){return view('content.vinculacion.fichas2021');})->name('vinculacion.fichas2021');
Route::get('vinculacion/convenios', [ConvenioController::class, 'convenios'])->name('vinculacion.convenios');
Route::get('vinculacion/cultura_deporte',function(){return view('content.vinculacion.cultura_deporte');})->name('vinculacion.cultura_deporte');
Route::get('vinculacion/informacion',function(){return view('content.vinculacion.informacion');})->name('vinculacion.informacion');
Route::get('vinculacion/residencias',function(){return view('content.vinculacion.residencias');})->name('vinculacion.residencias');
Route::get('vinculacion/servicio-social',function(){return view('content.vinculacion.servicio-social');})->name('vinculacion.servcio-social');


//Rutas de cle
Route::get('cle/acreditacion-de-ingles',function(){return view('content.cle.acreditacion-de-ingles');})->name('cle.acreditacion-de-ingles');
Route::get('cle/acreditacion2013',function(){return view('content.cle.acreditacion2013');})->name('cle.acreditacion2013');
Route::get('cle/acreditacion2014',function(){return view('content.cle.acreditacion2014');})->name('cle.acreditacion2014');
Route::get('cle/cursoConversacion',function(){return view('content.cle.cursoConversacion');})->name('cle.cursoConversacion');
Route::get('cle/cursoToefl',function(){return view('content.cle.cursoToefl');})->name('cle.cursoToefl');
Route::get('cle/diplomado',function(){return view('content.cle.diplomado');})->name('cle.diplomado');
Route::get('cle/informacion',function(){return view('content.cle.informacion');})->name('cle.informacion');
Route::get('cle/ingles-para-adultos',function(){return view('content.cle.ingles-para-adultos');})->name('cle.ingles-para-adultos');
Route::get('cle/ingles-para-ninos',function(){return view('content.cle.ingles-para-ninos');})->name('cle.ingles-para-ninos');
Route::get('cle/ingles-para-secundaria',function(){return view('content.cle.ingles-para-secundaria');})->name('cle.ingles-para-secundaria');
Route::get('cle/traduccionDocumentos',function(){return view('content.cle.traduccionDocumentos');})->name('cle.traduccionDocumentos');
Route::get('cle/avisos',function(){return view('content.cle.avisos');})->name('cle.avios');


//Rutas de oferta educativa
Route::get('oferta_educativa/index/{tipo}', [ProgramasController::class, 'index'])->name('oferta.index');
Route::get('oferta_educativa/showCarrera/{id}', [ProgramasController::class, 'show'])->name('oferta.showCarrera');
Route::get('contenido/carreras/storeContacto/{id_pro}', [CarrerasController::class, 'storeContacto'])->name('carreras.storeContacto');
Route::get('contenido/carreras/actualizarTabla/{id_esp}', [CarrerasController::class, 'act_tab_esp'])->name('carreras.actualizarTabla');

//Rutas de instituto
Route::get('instituto/nuestro_tec',function(){return view('content.instituto.nuestro_tec');})->name('instituto.nuestro_tec');
Route::get('instituto/directorio',function(){return view('content.instituto.directorio');})->name('instituto.directorio');
Route::get('instituto/ubicacion',function(){return view('content.instituto.ubicacion');})->name('instituto.ubicacion');

//Rutas departamentos
Route::get('departamentos/caja',function(){return view('content.departamentos.caja');})->name('departamentos.caja');

//Rutas de instituto
Route::get('investigacion/pitsc',function(){return view('content.investigacion.pitsc');})->name('investigacion.pitsc');
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
Route::get('calidad/rippa',function(){return view('content.calidad.rippa');})->name('calidad.rippa');

//Rutas institución
Route::get('institución/sidi',function(){return view('content.institucion.sidi');})->name('institucion.sidi');

//Servicos escolares
Route::get('servicios_escolares/titulos_cedulas',function(){return view('content.servicios_escolares.titulos_cedulas');})->name('servicios_escolares.titulos_cedulas');
Route::get('servicios_escolares/alumnos-traslados',function(){return view('content.servicios_escolares.alumnos-traslados');})->name('servicios_escolares.alumnos-traslados');
Route::get('servicios_escolares/servicios',function(){return view('content.servicios_escolares.servicios');})->name('servicios_escolares.servicios');
Route::get('servicios_escolares/constancia',function(){return view('content.servicios_escolares.constancias');})->name('servicios_escolares.constancias');
//Alumnos
Route::get('alumnos/eventos',function(){return view('content.alumnos.eventos');})->name('alumnos.eventos');
Route::get('alumnos/encuestasservicio',function(){return view('content.alumnos.encuestasservicio');})->name('alumnos.encuestasservicio');
Route::get('alumnos/evaluatutor',function(){return view('content.alumnos.evaluatutor');})->name('alumnos.evaluatutor');
Route::get('alumnos/evaluacion_docente',function(){return view('content.alumnos.evaluacion_docente');})->name('alumnos.evaluacion_docente');
Route::get('alumnos/prorrogas',function(){return view('content.alumnos.prorrogas');})->name('alumnos.prorrogas');
Route::get('alumnos/asesorias',function(){return view('content.alumnos.asesorias');})->name('alumnos.asesorias');
Route::get('alumnos/adeudos',function(){return view('content.servicios_escolares.adeudos');})->name('alumnos.adeudos');
Route::get('alumnos/adeudos/buscar',[AdeudosController::class,'buscarAdeudo'])->name('alumnos.adeudos.buscar');
Route::get('alumnos/adeudos/imprimir',[AdeudosController::class,'imprimirConstancia'])->name('alumnos.adeudos.imprimir');


//Seguimiento empleadores y egresados
Route::get('proceso/egreso',function(){return view('content.seguimiento.egreso');})->name('proceso.egreso');
Route::get('seguimiento/egresados',function(){return view('content.seguimiento.egresados');})->name('seguimiento.egresados');
Route::get('seguimiento/empleadores',function(){return view('content.seguimiento.empleadores');})->name('seguimiento.empleadores');

//Normativos y lineamientos
Route::get('normativos/etica',function(){return view('content.normativos.etica');})->name('normativos.etica');
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

//Ruta para visualizar las noticias
Route::get('/','IndexController@index')->name('inicio');
Route::get('Noticias/Ver/{id}','IndexController@ver')->name('ver');



//Ruta para imagenes del carousel
Route::get('/carousel/{image_name}', function($image_name) {
    $path = storage_path('app/public/noticias/imagenes/'.$image_name);

    // Verifica si el archivo existe
    if (!file_exists($path)) {
        abort(404);
    }

    // Devuelve la imagen directamente
    return response()->file($path);
})->name('carousel');

//Ruta para imagenes de las noticias
Route::get('/noticia/{image_name}', function($image_name) {
    $path = public_path('storage/noticias/imagenes/'.$image_name);

    // Verifica si el archivo existe
    if (!file_exists($path)) {
        abort(404);
    }

    // Devuelve la imagen directamente
    return response()->file($path);
})->name('noticia');

//Rutas del buzón
Route::get('contenido/buzon/index',[BuzonController::class,'index'])->name('contenido.buzon.index');
Route::get('contenido/buzon/store',[BuzonController::class,'store'])->name('contenido.buzon.store');

//Rutas de denuncia de acoso o discriminación
Route::get('contenido/denuncia/index',[DenunciasController::class,'index'])->name('contenido.denuncia.index');
Route::post('contenido/denuncia/store',[DenunciasController::class,'store'])->name('contenido.denuncia.store');

//Rutas del sistema de la biblioteca
Route::get('biblioteca/index',function(){return view('content.institucion.biblioteca');})->name('biblioteca.index');
Route::get('biblioteca/findAlumno',[BibliotecaController::class,'findAlumno'])->name('biblioteca.findAlumno');
Route::get('biblioteca/store',[BibliotecaController::class,'store'])->name('biblioteca.store');
Route::get('biblioteca/salida',[BibliotecaController::class,'bibliotecaSalida'])->name('biblioteca.salida');

//Rutas de posgrado
Route::get('posgrado/maestrias',function(){return view('content.posgrado.maestrias');})->name('posgrado.maestrias');


//Fin Rutas publicas***********************************************************************



//Rutas privadas****************************************************************************
Route::group(['middleware' => 'auth'],function(){
	Route::get('/home', 'HomeController@index')->name('home');

    //Rutas de roles y permisos
    Route::get('roles_permisos/index','RolesPermisosController@index')->name('admin.roles.index')->middleware('permission:VIP|ver_roles');
    Route::get('roles_permisos/roles_crear','RolesPermisosController@crearRole')->name('admin.roles.roles_crear')->middleware('permission:VIP|crear_rol');
    Route::post('roles_permisos/roles_guardar','RolesPermisosController@guardarRole')->name('admin.roles.roles_guardar')->middleware('permission:VIP|crear_rol');
    Route::get('roles_permisos/{id}/asignar_permiso_vista','RolesPermisosController@rolesAsignarPermisosVista')->name('admin.roles.roles_asignar_permisos_vista')->middleware('permission:VIP|asignar_roles');
    Route::get('roles/{id}/ver_permisos','RolesPermisosController@roleVerPermisos')->name('admin.roles.role_ver_permisos')->middleware('permission:VIP|ver_roles|ver_permisos');
    Route::post('roles_permisos/role_asignar_permiso','RolesPermisosController@rolesAsignarPermiso')->name('admin.roles.roles_asignar_permisos')->middleware('permission:VIP|asignar_roles');
    Route::get('roles_permisos/{id}/editar','RolesPermisosController@editarRole')->name('admin.roles.role_editar')->middleware('permission:VIP|editar_rol');
    Route::post('roles_permisos/{id}/actualizar','RolesPermisosController@actualizarRole')->name('admin.roles.role_actualizar')->middleware('permission:VIP|editar_rol');
    Route::get('roles_permisos/{id}/eliminar','RolesPermisosController@eliminarRole')->name('admin.roles.role_eliminar')->middleware('permission:VIP|eliminar_rol');
    Route::get('roles_permisos/{id}/usuarios','RolesPermisosController@usuarios')->name('admin.roles.usuarios')->middleware('permission:VIP|ver_roles');
    Route::get('roles_permisos/{id}/usuarios/revocar_role','RolesPermisosController@usuariosRevocarRol')->name('admin.roles.usuarios_revocar')->middleware('permission:VIP|eliminar_rol');

	//Rutas de usuarios
    Route::get('usuarios/{id}/asignar_roles','UserController@asignarRoles')->name('admin.usuarios.asignar_roles')->middleware('permission:VIP|asignar_roles');
    Route::post('usuarios/guardar_roles','UserController@guardarRoles')->name('admin.usuarios.guardar_roles')->middleware('permission:VIP|asignar_roles');
	Route::get('users/index','UserController@index')->name('admin.usuarios.inicio')->middleware('permission:VIP|ver_usuarios');
	Route::get('users/crear','UserController@create')->name('admin.usuarios.crear')->middleware('permission:VIP|crear_usuario');
	Route::get('users/editar/{id}','UserController@edit')->name('admin.usuarios.editar')->middleware('permission:VIP|editar_usuarios');
	Route::post('users/mod/{id}','UserController@update')->name('admin.usuarios.modificar')->middleware('permission:VIP|editar_usuarios');
	Route::post('users/eliminar','UserController@destroy')->name('admin.usuarios.eliminar')->middleware('permission:VIP|eliminar_usuarios');
	Route::post('usuarios/guardar','UserController@save')->name('admin.usuarios.guardar')->middleware('permission:VIP|crear_usuario');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


	//Rutas de noticias
	Route::get('noticias/index','NoticiasController@index')->name('admin.noticias.inicio')->middleware('permission:VIP|ver_noticias');
	Route::get('noticias/crear','NoticiasController@create')->name('admin.noticias.crear')->middleware('permission:VIP|crear_noticias');
	Route::post('noticias/guardar','NoticiasController@save')->name('admin.noticias.guardar')->middleware('permission:VIP|crear_noticias');
	Route::get('noticias/editar/{id}','NoticiasController@edit')->name('admin.noticias.editar')->middleware('permission:VIP|editar_noticias');
	Route::post('noticias/modificar/{id}','NoticiasController@update')->name('admin.noticias.modificar')->middleware('permission:VIP|editar_noticias');
	Route::get('noticias/eliminar','NoticiasController@destroy')->name('admin.noticias.eliminar')->middleware('permission:VIP|eliminar_noticias');
	Route::get('noticias/vista_previa/{id}','NoticiasController@view')->name('admin.noticias.ver')->middleware('permission:VIP|ver_noticias');

	//Rutas de perfil
	Route::get('usuarios/perfil','PerfilController@index')->name('admin.usuarios.mi_perfil');
    Route::get('usuarios/perfil/editar','PerfilController@miPerfilEditar')->name('admin.usuarios.mi_perfil_editar');
    Route::post('usuarios/perfil/modificar','PerfilController@miPerfilModificar')->name('admin.usuarios.mi_perfil_modificar');
    Route::get('usuarios/perfil/editar_password','PerfilController@miPerfilEditarPassword')->name('admin.usuarios.mi_perfil_editar_password');
    Route::post('usuarios/perfil/modificar_password','PerfilController@miPerfilModificarPassword')->name('admin.usuarios.mi_perfil_modificar_password');

	//Rutas de banco de proyectos
	Route::get('contenido/banco_pro','BancoController@index')->name('admin.contenido.banco.index');
	Route::get('contenido/banco_pro/crear','BancoController@create')->name('admin.contenido.banco.crear');
	Route::get('contenido/banco_pro/guardar',[BancoController::class,'store'])->name('proyectos.store');
	Route::get('contenido/banco_pro/mostrar','BancoController@show')->name('admin.contenido.banco.mostrar');
	Route::get('contenido/banco_pro/eliminar/{id}','BancoController@destroy')->name('admin.contenido.banco.eliminar');
	Route::get('contenido/banco_pro/editar/{id}','BancoController@edit')->name('admin.contenido.banco.editar');
	Route::get('contenido/banco_pro/modificar/{id}','BancoController@update')->name('admin.contenido.banco.modificar');
    Route::get('contenido/banco_pro/ver/{id}','BancoController@ver')->name('admin.contenido.banco.ver');
    Route::get('contenido/banco_pro/colaboradores/{id}',[BancoController::class,'createColaboradores'])->name('admin.contenido.banco.createColaboradores');
    Route::get('contenido/banco_pro/colaboradores/guardar/{id}',[BancoController::class,'storeColaboradores'])->name('admin.contenido.banco.storeColaboradores');

    //Rutas de los reportes de los proyectos
    Route::get('contenido/banco_pro/reportes/Index',[BancoController::class,'reportesIndex'])->name('admin.contenido.banco.reportesIndex');
    Route::get('contenido/banco_pro/reportes/convenios',[BancoController::class,'reportesConvenios'])->name('admin.contenido.banco.reportesConvenios');
    Route::get('contenido/banco_pro/reportes/Convenios/Proyectos',[BancoController::class,'repConvProy'])->name('admin.contenido.banco.repConvProy');
    Route::get('contenido/banco_pro/reportes/Convenios/Area',[BancoController::class,'repConvArea'])->name('admin.contenido.repConvArea');

	//Carreras
	Route::get('contenido/carreras', [CarrerasController::class, 'index'])->name('carreras.index');
    Route::post('contenido/carreras/Inicializar', [CarrerasController::class, 'inicializar'])->name('carreras.inicializar');
	Route::get('contenido/carreras/editcarrera', [CarrerasController::class, 'editCarrera'])->name('carreras.editCarrera');
	Route::get('contenido/carreras/storeCarrera', [CarrerasController::class, 'storeCarrera'])->name('carreras.storeCarrera');
	Route::get('contenido/carreras/updateCarrera/{id}', [CarrerasController::class, 'updateCarrera'])->name('carreras.updateCarrera');
	Route::get('contenido/carreras/destroyCarrera/{id}', [CarrerasController::class, 'destroyCarrera'])->name('carreras.destroyCarrera');
	Route::get('contenido/carreras/showCarrera/{id}', [CarrerasController::class, 'show'])->name('carreras.showCarrera');
	Route::post('contenido/carreras/updateCarreraCom/{id}', [CarrerasController::class, 'updatecarreracom'])->name('carreras.updateCarreraCom');
    Route::get('contenido/carreras/editEspecialidad/{id}', [CarrerasController::class, 'editEspecialidad'])->name('carreras.editEspecialidad');
	Route::post('contenido/carreras/storeEspecialidad', [CarrerasController::class, 'storeEspecialidad'])->name('carreras.storeEspecialidad');
	Route::post('contenido/carreras/updateEspecialidad/{id}', [CarrerasController::class, 'updateEspecialidad'])->name('carreras.updateEspecialidad');
	Route::get('contenido/carreras/destroyEspecialidad/{id}', [CarrerasController::class, 'destroyEspecialidad'])->name('carreras.destroyEspecialidad');
	Route::get('contenido/carreras/editObjetivos/{id}', [CarrerasController::class, 'editObjetivos'])->name('carreras.editObjetivos');
	Route::get('contenido/carreras/storeObjetivos', [CarrerasController::class, 'storeObjetivos'])->name('carreras.storeObjetivos');
	Route::get('contenido/carreras/updateObjetivos/{id}', [CarrerasController::class, 'updateObjetivos'])->name('carreras.updateObjetivos');
	Route::get('contenido/carreras/destroyObjetivos/{id}', [CarrerasController::class, 'destroyObjetivos'])->name('carreras.destroyObjetivos');
	Route::get('contenido/carreras/editAtributos/{id_pro}', [CarrerasController::class, 'editAtributos'])->name('carreras.editAtributos');
	Route::get('contenido/carreras/storeAtributos', [CarrerasController::class, 'storeAtributos'])->name('carreras.storeAtributos');
	Route::get('contenido/carreras/updateAtributos/{id}', [CarrerasController::class, 'updateAtributos'])->name('carreras.updateAtributos');
	Route::get('contenido/carreras/destroyAtributos/{id}', [CarrerasController::class, 'destroyAtributos'])->name('carreras.destroyAtributos');
	Route::get('contenido/carreras/storeCriterios', [CarrerasController::class, 'storeCriterios'])->name('carreras.storeCriterios');
	Route::get('contenido/carreras/updateCriterios/{id}', [CarrerasController::class, 'updateCriterios'])->name('carreras.updateCriterios');
	Route::get('contenido/carreras/destroyCriterios/{id}', [CarrerasController::class, 'destroyCriterios'])->name('carreras.destroyCriterios');
	Route::get('contenido/carreras/editEstructura/{id_pro}', [CarrerasController::class, 'editEstructura'])->name('carreras.editEstructura');
	Route::get('contenido/carreras/storeEstructura', [CarrerasController::class, 'storeEstructura'])->name('carreras.storeEstructura');
	Route::get('contenido/carreras/updateEstructura/{id}', [CarrerasController::class, 'updateEstructura'])->name('carreras.updateEstructura');
	Route::get('contenido/carreras/destroyEstructura/{id}', [CarrerasController::class, 'destroyEstructura'])->name('carreras.destroyEstructura');
	Route::get('contenido/carreras/editDetalles/{id_pro}/{id_per}', [CarrerasController::class, 'editDetalles'])->name('carreras.editDetalles');
	Route::get('contenido/carreras/storeDetallesFormacion', [CarrerasController::class, 'storeDetallesFor'])->name('carreras.storeDetallesFor');
	Route::get('contenido/carreras/storeDetallesProduccion', [CarrerasController::class, 'storeDetallesPro'])->name('carreras.storeDetallesPro');
	Route::get('contenido/carreras/updateDetallesFormacion/{id}', [CarrerasController::class, 'updateDetallesFormacion'])->name('carreras.updateDetallesForm');
	Route::get('contenido/carreras/destroyDetallesFormacion/{id}', [CarrerasController::class, 'destroyDetallesFormacion'])->name('carreras.destroyDetallesForm');
	Route::get('contenido/carreras/updateDetallesProduccion/{id}', [CarrerasController::class, 'updateDetallesProduccion'])->name('carreras.updateDetallesProd');
	Route::get('contenido/carreras/destroyDetallesProduccion/{id}', [CarrerasController::class, 'destroyDetallesProduccion'])->name('carreras.destroyDetallesProd');
	Route::get('contenido/carreras/showContacto/{id_pro}', [CarrerasController::class, 'showContacto'])->name('carreras.showContacto');
	Route::get('contenido/carreras/showContactoLeido/{id}', [CarrerasController::class, 'showContactoLeido'])->name('carreras.showContactoLeido');
	Route::get('contenido/carreras/readContacto/{id_pro}', [CarrerasController::class, 'readContacto'])->name('carreras.readContacto');
	Route::get('contenido/carreras/updateContacto/{id_pro}', [CarrerasController::class, 'updateContacto'])->name('carreras.updateContacto');
	Route::get('contenido/carreras/destroyContacto/{id_pro}', [CarrerasController::class, 'destroyContacto'])->name('carreras.destroyContacto');
	Route::get('contenido/carreras/editPlanEstudios/{id_pro}', [CarrerasController::class, 'editPlanEstudios'])->name('carreras.editPlanEstudios');
	Route::post('contenido/carreras/storePlanEstudios/{id_pro}', [CarrerasController::class, 'storePlanEstudios'])->name('carreras.storePlanEstudios');
	Route::post('contenido/carreras/updatePlanEstudios/{id_pro}', [CarrerasController::class, 'updatePlanEstudios'])->name('carreras.updatePlanEstudios');
	Route::get('contenido/carreras/destroyPlanEstudios/{id_asig}', [CarrerasController::class, 'destroyPlanEstudios'])->name('carreras.destroyPlanEstudios');
	Route::post('contenido/carreras/storeMatEsp/{id_pro}', [CarrerasController::class, 'storeMatEsp'])->name('carreras.storeMatEsp');
    Route::post('contenido/carreras/updateMatEspecialidad/{id_pro}', [CarrerasController::class, 'updateMatEspecialidad'])->name('carreras.updateMatEspecialidad');
    Route::get('contenido/carreras/destroyMatEspecialidad/{id_asig}', [CarrerasController::class, 'destroyMatEspecialidad'])->name('carreras.destroyMatEspecialidad');
	Route::get('contenido/carreras/showMateriasEspecialidad2/{id_pro}', [CarrerasController::class, 'showMateriasEspecialidad2'])->name('carreras.showMateriasEspecialidad2');
    Route::post('contenido/carreras/foto/{id_pro}', [CarrerasController::class, 'act_foto'])->name('carreras.actualizarFoto');

    //Rutas de transparencia
    Route::get('contenido/transparencia/archivos/agregar/{id_per}', [TransparenciaController::class, 'archPerAgregar'])->name('transparencia.archivos.agregar');
    Route::post('contenido/transparencia/archivos/guardar', [TransparenciaController::class, 'store'])->name('transparencia.archivos.guardar');
    Route::get('contenido/transparencia/archivos/eliminar/{id_arch}', [TransparenciaController::class, 'archDestroy'])->name('transparencia.archivos.eliminar');
    Route::get('contenido/periodos/inicio', [TransparenciaController::class, 'periodos'])->name('periodos.inicio');
    Route::get('contenido/periodo/agregar', [TransparenciaController::class, 'perCreate'])->name('periodos.agregar');
    Route::get('contenido/periodo/modificar', [TransparenciaController::class, 'perUpdate'])->name('periodo.update');
    Route::get('contenido/periodo/eliminar', [TransparenciaController::class, 'perDestroy'])->name('periodo.eliminar');

    //Rutas convenios
    Route::get('contenido/convenios/inicio',[ConvenioController::class,'index'])->name('convenios.inicio');
    Route::post('contenido/convenios/guardar',[ConvenioController::class,'save'])->name('convenios.save');
    Route::get('contenido/convenios/eliminar',[ConvenioController::class,'destroy'])->name('convenios.eliminar');
   
	//Rutas de áreas
	Route::post('contenido/areas/guardar',[AreasController::class,'save'])->name('guardar.area');
    Route::get('contenido/areas/inicio',[AreasController::class,'index'])->name('areas.inicio');
    Route::get('contenido/areas/modificar',[AreasController::class,'update'])->name('areas.update');
    Route::get('contenido/areas/eliminar',[AreasController::class,'destroy'])->name('areas.eliminar');

    //Rutas privadas del buzón cn
    Route::get('contenido/buzon/show',[BuzonController::class,'show'])->name('buzon.show')->middleware('permission:VIP|ver_buzon');
    Route::get('contenido/buzon/edit/{id}',[BuzonController::class,'edit'])->name('buzon.edit')->middleware('permission:VIP|editar_buzon');
    Route::get('contenido/buzon/destroy',[BuzonController::class,'destroy'])->name('buzon.destroy')->middleware('permission:VIP|eliminar_buzon');
    Route::get('contenido/buzon/leidos',[BuzonController::class,'leidos'])->name('buzon.leidos')->middleware('permission:VIP|editar_buzon');

    //Rutas privadas de biblioteca
    Route::get('contenido/biblioteca/estadisticos',function(){return view('admin.biblioteca.estadisticos');})->name('biblioteca.estadisticos')->middleware('permission:VIP|ver_biblioteca');
    Route::get('contenido/biblioteca/periodo',function(){return view('admin.biblioteca.periodo');})->name('biblioteca.periodo')->middleware('permission:VIP|ver_biblioteca');
    Route::get('contenido/biblioteca/periodo/find',[BibliotecaController::class,'periodoFind'])->name('biblioteca.periodo.find')->middleware('permission:VIP|ver_biblioteca');
    Route::get('contenido/biblioteca/serviciosAjax',[BibliotecaController::class,'cargarServiciosAjax'])->name('biblioteca.serviciosAjax');
    Route::get('contenido/biblioteca/servicios/consulta',[BibliotecaController::class,'serviciosFind'])->name('biblioteca.servicios.find')->middleware('permission:VIP|ver_biblioteca');
    Route::get('contenido/biblioteca/servicios/ver',function(){return view('admin.biblioteca.servicios');})->name('biblioteca.servicios')->middleware('permission:VIP|crear_biblioteca');

    //Rutas de institución
    Route::get('institucion/pases/index',[PasesController::class,'index'])->name('pases.index')->middleware('permission:VIP|ver_pases');
    Route::get('institucion/pases/create',[PasesController::class,'create'])->name('pases.create')->middleware('permission:VIP|crear_pases');
    Route::post('institucion/pases/store',[PasesController::class,'store'])->name('pases.store')->middleware('permission:VIP|crear_pases');
	Route::get('institucion/pases/edit/{id}',[PasesController::class,'edit'])->name('pases.edit')->middleware('permission:VIP|editar_pases');
	Route::post('institucion/pases/update/{id}',[PasesController::class,'update'])->name('pases.update')->middleware('permission:VIP|editar_pases');
	Route::get('institucion/pases/destroy/{id}',[PasesController::class,'destroy'])->name('pases.destroy')->middleware('permission:VIP|eliminar_pases');
	Route::get('institucion/pases/verificar/{id}',[PasesController::class,'verificar'])->name('pases.verificar')->middleware('permission:VIP|verificar_pases');
	Route::get('institucion/pases/estadisticos',[PasesController::class,'estadisticos'])->name('pases.estadisticos')->middleware('permission:VIP|verificar_pases');
	Route::get('institucion/pases/estadisticos/generar',[PasesController::class,'estadisticosGenerar'])->name('pases.estadisticos.generar')->middleware('permission:VIP|verificar_pases');
	Route::get('institucion/pases/show',[PasesController::class,'show'])->name('pases.show')->middleware('permission:VIP|verificar_pases');
	Route::get('institucion/pases/consultar',[PasesController::class,'consultarPases'])->name('pases.consultar')->middleware('permission:VIP|verificar_pases');
	//Ruta para el correo de autorización de pases
	Route::get('pases/autorizar/{pase_id}/{autorizar}', [PasesController::class, 'autorizar'])->name('pases.autorizar')->middleware('permission:VIP|verificar_pases');



	//Rutas de los adeudos
	Route::get('Institucion/adeudos/index',[AdeudosController::class,'index'])->name('adeudos.index');
	Route::get('Institucion/adeudos/crear',[AdeudosController::class,'create'])->name('adeudos.create');
	Route::post('Institucion/adeudos/guardar',[AdeudosController::class,'store'])->name('adeudos.store');
	Route::get('Institucion/adeudos/editar/{id}',[AdeudosController::class,'edit'])->name('adeudos.edit');
	Route::post('Institucion/adeudos/modificar/{id}',[AdeudosController::class,'update'])->name('adeudos.update');
	Route::get('Institucion/adeudos/eliminar/{id}',[AdeudosController::class,'destroy'])->name('adeudos.destroy');
	Route::get('Institucion/adeudos/indexEliminar',[AdeudosController::class,'indexEliminar'])->name('adeudos.indexEliminar');
	Route::post('Institucion/adeudos/eliminarTodo',[AdeudosController::class,'destroyAll'])->name('adeudos.destroyAll');
});

