<?php

class LoginController extends \BaseController {

	public function getIndex() 
	{
    	return View::make('login');
	}

	/**************** Ingresar  *******************/

	public function postIngresar()
	{

    	// Authenticate the user
    	try
		{
			$credentials = array(
		        'email'    => Input::get('username'),
		        'password' => Input::get('password'),
		    );

		    if(Input::get('remember'))
		    {
		    	$user = Sentry::authenticateAndRemember($credentials, false);
		    	//$user = Sentry::authenticate($credentials, false);
		    }
		    else{
		    	$user = Sentry::authenticate($credentials, false);
		    }
	    }

		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
			return Redirect::to('login')
			    ->with('message_error', 'Se requiere campo Username')
			    ->withInput();
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
			return Redirect::to('login')
			    ->with('message_error', 'Se requiere campo Contraseña')
			    ->withInput();
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
		    return Redirect::to('login')
			    ->with('message_error', 'Su Email o Password no son correctos')
			    ->withInput();
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    return Redirect::to('login')
			    ->with('message_error', 'El usuario no se ha encontrado')
			    ->withInput();			
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
		    return Redirect::to('login')
			    ->with('message_error', 'El usuario no está activada')
			    ->withInput();			
		}

		// The following is only required if the throttling is enabled
		catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
		    return Redirect::to('login')
			    ->with('message_error', 'El usuario está suspendido')
			    ->withInput();			
		}
		catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
		    return Redirect::to('login')
			    ->with('message_error', 'El usuario está prohibido')
			    ->withInput();				
		}

/************** Donde Quede  *****************/
	
	$id_user   =  Sentry::getUser()->id;
	$consultaR =  RojoPaginas::whereUser_id($id_user)->get();
	$consultaA =  AmarilloPaginas::whereUser_id($id_user)->get();
	$consultaV =  VerdePaginas::whereUser_id($id_user)->get();

	if($consultaR!='[]')
	{
		// redirect donde quede rojo
		$pagina = User::find($id_user)->RojoPaginas->pagina_actual;
		return Redirect::to('rojo/pagina/'.$pagina);
	}
	elseif($consultaA!='[]')
	{
		// redirect donde quede Amarillo
		$pagina = User::find($id_user)->AmarilloPaginas->pagina_actual;
		return Redirect::to('amarillo/pagina/'.$pagina);
	}

	elseif($consultaV=='[]')
	{
		// redirect donde quede Verde
		$pagina = User::find($id_user)->VerdePaginas->pagina_actual;
		return Redirect::to('verde/pagina/'.$pagina);
	}
	else{
		// Quedó en el Home;
	}


  } //  fin ingresar

}