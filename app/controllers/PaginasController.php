<?php

class PaginasController extends \BaseController {


	public function Rojo($id) 
	{

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
			);

    	return View::make('rojo/'.$id)->with($data);
	}

	public function Amarillo($id) 
	{
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
			);

    	return View::make('amarillo/'.$id)->with($data);
	}

	public function Verde($id) 
	{
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
			);

    	return View::make('verde/'.$id)->with($data);
	}	
}