<?php

Route::get('/', function()
{
	return View::make('index');
});


/****************** MENÚ  ************************/
Route::get('menu', array('before' => 'auth', function()
{
    return View::make('menu');
}));

/****************** LOGIN  ************************/
Route::get('login', function()
{
	return View::make('login');
});


/****************** RUTAS, DE ACCIONES , PARA EL CONTROLADOR LOGIN *********************/
Route::controller('login', 'LoginController');



Route::get('hola', function()
{
	$id_user     = Sentry::getUser()->id;
	$terminado   = User::find($id_user)->RojoPaginas->terminado;
	return Response::json(array('name' => 'Steve', 'estado' => $terminado));

});

/****************** Salir **********************/

Route::get('logout', function()
{
	Sentry::logout();
	return Redirect::to('login');
});


Route::get('registro', function()
{
	
	Sentry::register(array(
	    'email'    => 'doe',
	    'password' => '123',
	    'first_name'=> 'Jhon',
	    'last_name' => 'Doe',
	    'activated' => true,
	));
	return "Registrado...";

});


/****************** Paginas Controller Action Rojo  ************************/

Route::get('rojo/pagina/{id}', array('before' => 'auth|acumula_rojo|terminado_rojo', 'uses' => 'PaginasController@Rojo'))
->where('id', '[0-9]+');


/****************** Paginas Controller Action Amarillo  ************************/

Route::get('amarillo/pagina/{id}', array('before' => 'auth|acumula_amarillo|terminado_amarillo|paso_rojo', 'uses' => 'PaginasController@Amarillo'))
->where('id', '[0-9]+');


/****************** Paginas Controller Action Verde  ************************/

Route::get('verde/pagina/{id}', array('before' => 'auth|acumula_verde|terminado_verde|paso_amarillo', 'uses' => 'PaginasController@Verde'))
->where('id', '[0-9]+');



/****************** Rojo Preguntas **********************/
Route::get('rojo/termina_paginas/', function()
{
	// Termina, cambia de estado
	$id_user  =  Sentry::getUser()->id;
	$RP =  RojoPaginas::whereUser_id($id_user)->update(array('terminado' => '1'));

	return Redirect::to('rojo/preguntas/');

});



/****************** Rojo Preguntas **********************/
Route::get('rojo/preguntas/', function()
{

$preguntas = DB::table('preguntas')
            ->whereNOTExists(function($query)
            {
                $query->select(DB::raw(1))
                      ->from('user_pregunta')
                      ->whereRaw('preguntas.id = preguntas_id');
            })
            ->orderByRaw('RAND()')->take(1)->get();

$cuenta = DB::table('preguntas')
            ->whereNOTExists(function($query)
            {
                $query->select(DB::raw(1))
                      ->from('user_pregunta')
                      ->whereRaw('preguntas.id = preguntas_id');
            })
            ->orderByRaw('RAND()')->count();
            
if($cuenta==1)            
{
	return "Ultima Pregunta";
}


return View::make('rojo/preguntas')->with('pregunta', $preguntas[0]);

});

/****************** Rojo Preguntas Guardar **********************/

Route::post('rojo/guardarPregunta/', 'PreguntasController@guardarPregunta');

/****************** Amarillo Prueba Evaluacion **********************/
Route::get('amarillo/preguntas/', function()
{
	$id_user  =  Sentry::getUser()->id;
	$RP =  AmarilloPaginas::whereUser_id($id_user)->update(array('terminado' => '1'));
	return "Terminado Empieza Evaluacion Amarillo";
});

/****************** Verde Prueba Evaluacion **********************/

Route::get('verde/preguntas/', function()
{
	$id_user  =  Sentry::getUser()->id;
	$RP =  VerdePaginas::whereUser_id($id_user)->update(array('terminado' => '1'));
	return "Terminado Empieza Evaluacion Verde";
});


/****** Error 404 ******/
App::missing(function($exception)
{
    return Response::view('missing', array(), 404);
});

Route::get('preguntas', function()
{
	$preguntas = DB::table('preguntas')->orderByRaw('RAND()')->take(5)->get();
	return Response::json($preguntas);

});