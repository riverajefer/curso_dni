@extends('layouts/default')
@section('content')

<hr>

@if(Sentry::check())
	Usuario: {{Sentry::getUser()->first_name}}
@endif


<a href="{{URL::to('menu')}}">MENÚ</a>

@stop
{{-- Titulo --}}
@section('title')
@parent
.:: Inicio ::.
@stop

