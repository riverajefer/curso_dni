@extends('layouts/default')
@section('content')

<h1>Hola Mundo</h1>
<hr>

@if(Sentry::check())
	Usuario: {{Sentry::getUser()->first_name}}
@endif




@stop
{{-- Titulo --}}
@section('title')
@parent
.:: Inicio ::.
@stop

