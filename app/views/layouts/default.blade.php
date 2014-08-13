<!doctype html>
<html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	
<title> 
	@section('title') 
	@show 
</title>  


<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
<!--********** HEAD ***************-->
	@include('includes.head')
</head>
<body>
<!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->


<!--********** HEADER ***************-->
@include('includes.header')
<!--********** FIN HEADER ***************-->

<!--********** MENSAJES DE ERRORES ***************-->
@if(Session::has('message_error'))
	<div class="alert alert-dismissable">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  {{ Session::get('message')}}
	</div>
@endif

<!--********** MENSAJES SUCCESS ***************-->
@if(Session::has('message_success'))
	<div class="alert alert-dismissable">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  {{ Session::get('message')}}
	</div>
@endif


<!--********** CONTENIDO ***************-->
@yield('content') 
<!--********** FIN CONTENIDO ***************-->


<!--********** FOOTER ***************-->
<footer class="row" id="footer">
	@include('includes.footer')
</footer> 
<!--********** FIN FOOTER ***************-->
</body>
</html>