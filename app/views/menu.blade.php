@extends('layouts/default')
@section('content')

@if(Sentry::check())
	Usuario: {{Sentry::getUser()->first_name}}
@endif

<h1>MENÚ</h1>
<hr>
<ul>
	<li><a href="{{URL::to('rojo/pagina/1')}}">ROJO</a></li>
	<li><a href="{{URL::to('amarillo/pagina/1')}}">AMARILLO</a></li>
	<li><a href="{{URL::to('verde/pagina/1')}}">VERDE</a></li>
</ul>


@stop
{{-- Titulo --}}
@section('title')
@parent
.:: Inicio ::.
@stop

