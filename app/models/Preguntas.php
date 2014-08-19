<?php

class Preguntas extends Eloquent  {

	protected $table = 'preguntas';

	/************** Relacion muchos a muchos   ******************/ 
	/************** Un usuario responde muchas preguntas ****************/ 
	/************** Una preguntas es respondida por muchos usuarios ****************/ 
    public function user()
    {
        return $this->belongsToMany('User', 'user_pregunta', 'preguntas_id', 'user_id')->withPivot('respuesta');
    }


}
