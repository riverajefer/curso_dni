<?php

class RojoController extends \BaseController {


	public function pagina($id) 
	{

		$id_user     = Sentry::getUser()->id;
		$terminado   = User::find($id_user)->RojoPaginas->terminado;

		$siguiente = $id + 1;
		$anterior  =  $id -1;
		$total = 5;
		if($id > $total)
		{
			App::abort(404);
		}

		$data = array(
			'id_page'   => $id,
			'anterior'  => $anterior,
			'siguiente' => $siguiente,
			'estado' => $terminado,
			);

    	return View::make('rojo/'.$id)->with($data);
	}

	
}