<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/
/*

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('login');
		}
	}
});

*/


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});


/************* Filtro de Autentificación ***************/
Route::filter('auth', function()
{
	if (!Sentry::check())
	{
		return Redirect::to('login')->with('message_error', 'Debes estar Autentificado');
	}
});


/*
|--------------------------------------------------------------------------
| Filtros Rojo
|--------------------------------------------------------------------------
*/
/*

/************* Filtro Estado *********************/
Route::filter('acumula_rojo', function()
{
	$pagina   =  Route::input('id');
	$id_user  =  Sentry::getUser()->id;
	$consulta =  RojoPaginas::whereUser_id($id_user)->get();
	
	if($consulta=='[]')
	{
		$user = new RojoPaginas;
		$user->user_id = $id_user;
		$user->pagina_actual = $pagina;
		$user->terminado = false;
		$user->save();
	}
	else
	{
		$page_bd = User::find($id_user)->RojoPaginas->pagina_actual;
		$page_siguiente = $page_bd+1;

		if($pagina > $page_siguiente)
		{
		  return Redirect::to('rojo/pagina/'.$page_bd)->with('message_error', 'Uy!!! No puedes acanzar tan rápido.');
		}		
		$RP =  RojoPaginas::whereUser_id($id_user)->update(array('pagina_actual' => $pagina));
	}

});

/************* Filtro Acumula *********************/
Route::filter('terminado_rojo', function()
{
	$id_user     = Sentry::getUser()->id;
	$terminado   = User::find($id_user)->RojoPaginas->terminado;

	if($terminado==1)
	{
		return Redirect::to('menu')->with('message_error', 'No puedes volver a ver las diapositivas');
	}

});


/*
|--------------------------------------------------------------------------
| Filtros Amarillo
|--------------------------------------------------------------------------
*/
/*

/************* Filtro Estado *********************/
Route::filter('acumula_amarillo', function()
{
	$pagina   =  Route::input('id');
	$id_user  =  Sentry::getUser()->id;
	$consulta =  AmarilloPaginas::whereUser_id($id_user)->get();
	
	if($consulta=='[]')
	{
		$user = new AmarilloPaginas;
		$user->user_id = $id_user;
		$user->pagina_actual = $pagina;
		$user->terminado = false;
		$user->save();
	}
	else
	{
		$page_bd = User::find($id_user)->AmarilloPaginas->pagina_actual;
		$page_siguiente = $page_bd+1;

		if($pagina > $page_siguiente)
		{
		  return Redirect::to('amarillo/pagina/'.$page_bd)->with('message_error', 'Uy!!! No puedes avanzar tan rápido.');
		}		
		$RP =  AmarilloPaginas::whereUser_id($id_user)->update(array('pagina_actual' => $pagina));
	}

});

/************* Filtro Acumula *********************/
Route::filter('terminado_amarillo', function()
{
	$id_user     = Sentry::getUser()->id;
	$terminado   = User::find($id_user)->AmarilloPaginas->terminado;

	if($terminado==1)
	{
		return Redirect::to('menu')->with('message_error', 'No puedes volver a ver las diapositivas');
	}

});


/************* Si paso la prueba Rojo  *********************/
Route::filter('paso_rojo', function()
{
	$id_user     = Sentry::getUser()->id;
	$terminado   = User::find($id_user)->RojoPaginas->terminado;
	$page_bd = User::find($id_user)->RojoPaginas->pagina_actual;

	if($terminado==0)
	{
		return Redirect::to('rojo/pagina/'.$page_bd)->with('message_error', 'Uy!!! No puedes avanzar tan rápido.');
	}

});



/*
|--------------------------------------------------------------------------
| Filtros Verde
|--------------------------------------------------------------------------
*/
/*

/************* Filtro Estado *********************/
Route::filter('acumula_verde', function()
{
	$pagina   =  Route::input('id');
	$id_user  =  Sentry::getUser()->id;
	$consulta =  VerdePaginas::whereUser_id($id_user)->get();
	
	if($consulta=='[]')
	{
		$user = new VerdePaginas;
		$user->user_id = $id_user;
		$user->pagina_actual = $pagina;
		$user->terminado = false;
		$user->save();
	}
	else
	{
		$page_bd = User::find($id_user)->VerdePaginas->pagina_actual;
		$page_siguiente = $page_bd+1;

		if($pagina > $page_siguiente)
		{
		  return Redirect::to('verde/pagina/'.$page_bd)->with('message_error', 'Uy!!! No puedes avanzar tan rápido verde.');
		}		
		$RP =  VerdePaginas::whereUser_id($id_user)->update(array('pagina_actual' => $pagina));
	}

});

/************* Filtro Acumula *********************/
Route::filter('terminado_verde', function()
{
	$id_user     = Sentry::getUser()->id;
	$terminado   = User::find($id_user)->VerdePaginas->terminado;

	if($terminado==1)
	{
		return Redirect::to('menu')->with('message_error', 'No puedes volver a ver las diapositivas');
	}

});

/************* Si paso la prueba Amarillo  *********************/
Route::filter('paso_amarillo', function()
{
	$id_user     = Sentry::getUser()->id;
	$terminado   = User::find($id_user)->AmarilloPaginas->terminado;
	$page_bd = User::find($id_user)->AmarilloPaginas->pagina_actual;

	if($terminado==0)
	{
		// la idea es que retoner a la prueba
		return Redirect::to('amarillo/pagina/'.$page_bd)->with('message_error', 'Uy!!! No puedes avanzar tan rápido.');
	}

});
