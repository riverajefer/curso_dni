@extends('layouts/default')
@section('content')

<?php
$user_id = Sentry::getUser()->id;
?>
<div class="row">
<div class="col-md-6 col-md-offset-3">

<h1 class="text-danger">PREGUNTAS ROJO</h1>
<hr>
{{Form::open(array("","id"=>"frm"))}}

<!-- PREGUNTA -->
<strong>Pregunta:</strong> {{$pregunta->pregunta}}<br>

<!-- OPCIONES DE RESPUESTA -->
	<div class="radio">
	  <label>
	    <input type="radio" name="respuesta1" id="opcion1" value="0">
	    Falso
	  </label>
	</div>
	<div class="radio">
	  <label>
	    <input type="radio" name="respuesta1" id="opcion2" value="1">
	    Verdadero
	  </label>
	</div>
	<hr>

<button type="submit" class="btn btn-primary">Enviar</button>
<input type="hidden" value="{{$pregunta->id}}" name="pregunta_id">
<input type="hidden" value="{{$user_id}}" name="user_id">

{{ Form::close() }}


</div>
</div>
<hr>

<!--ENVIAR RESPUESTA POR AJAX  AL CONTROLADOR-->	
<script>
$("document").ready(function(){
    $("#frm").submit(function(e){
        e.preventDefault();
        var postData = $(this).serialize();
        $.ajax({
            type: "POST",
            url : "guardarPregunta",
            data : postData,
            success : function(data){
                console.log("Salida: "+data);
                if(data=='ok')
                {
                	$('#modalOK').modal('show');
                }
                else
                {
                	$('#modalFallo').modal('show');
                }
            }
        });

	});

$('#modalOK').on('hidden.bs.modal', function (e) {
  location.reload();
})

$('#modalFallo').on('hidden.bs.modal', function (e) {
  location.reload();
})

});//end of document ready function
</script>


<!-- Modal Respuesta OK -->
<div class="modal fade" id="modalOK" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal OK</h4>
      </div>
      <div class="modal-body">
       	<h2>OK Respondiste bien</h2>
       	<h3>Retro: {{$pregunta->retro}}</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Siguiente Pregunta</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Respuesta Fallo -->
<div class="modal fade" id="modalFallo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal Fallo</h4>
      </div>
      <div class="modal-body">
       	<h2>Fallaste, </h2>
       	<h3>La respuesta era: tal</h3>
       	<h3>Retro: {{$pregunta->retro}}</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Siguiente Pregunta</button>
      </div>
    </div>
  </div>
</div>


@stop
{{-- Titulo --}}
@section('title')
@parent
.:: Preguntas ::.
@stop

