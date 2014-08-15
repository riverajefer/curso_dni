@extends('layouts/default')
@section('content')

<div class="container">
  <div class="row">
    <div class="span12">
      <div class="hero-unit center">
          <h1>Page Not Found <small><font face="Tahoma" color="red">Error 404</font></small></h1>
          <br />
          <h2>La página que buscas, no existe !!!</h2>
          <br>
          <a href="{{ URL::to('/') }}" class="btn btn-large btn-warning">
          <i class="icon-home icon-white"></i> Inicio</a>
        </div>
        <br />
        <br />
        <p></p>
        <!-- By ConnerT HTML & CSS Enthusiast -->  
    </div>
  </div>
</div>


@stop
