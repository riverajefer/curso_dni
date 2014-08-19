@extends('layouts/default')
@section('content')

<script type="text/javascript">
jQuery(document).ready(function($) {
  if (window.history && window.history.pushState) {
    window.history.pushState('forward', null, '');
    $(window).on('popstate', function() {
      	location.reload();
    });
  }
});    
</script>

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h1 class="text-danger">Página 5</h1>
		<hr>
	<p>
		Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos
	</p>

		<ul class="pager">
		    <li class="previous"><a href="{{URL::to('rojo/pagina/'.$anterior)}}" >&larr; Anterior</a></li>
			<li class="next"><a href="{{URL::to('rojo/termina_paginas/')}}" >Empezar Prueba &rarr;</a></li>
		</ul>
	</div>
</div>



@stop
{{-- Titulo --}}
@section('title')
@parent
.:: Pagina 5 ::.
@stop

