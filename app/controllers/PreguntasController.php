<?php

class PreguntasController extends \BaseController {


	public function guardarPregunta() 
	{



		/**************** Obtenemos los datos del POst  *********************/
		$valor        = Input::get('respuesta1');
		$user_id      = Input::get('user_id');
		$pregunta_id  = Input::get('pregunta_id');

		//return "Respuesta: $valor";
		
		/**************** Guardamos en la table, intermedia Muchos a Muchos ****************/
		$usuario = User::find($user_id);
		$usuario->preguntas()->attach($pregunta_id, array('respuesta'=>$valor));

		/**************** Validamos la Respuesta  *********************/
		$pregunta = Preguntas::find($pregunta_id);
		$respuesta = $pregunta->respuesta;

		if($valor == $respuesta)
		{
			return "ok";

		}
		else{
			return "fallo";

		}
		
	}

	
}