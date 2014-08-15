@extends('layouts.default')
@section('content')

<div class="container">
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Ingresar</h3>
			 	</div>
			  	<div class="panel-body">
			    	{{ Form::open(array('url'=>'login/ingresar')) }}
                    <fieldset>
			    	  	<div class="form-group">
			    	  		<?php $parametros1= array('class'=>'form-control input-lg', 'placeholder'=>'Usuario','required'=>'required')?>
			    	  		{{ Form::text('username', null, $parametros1 ) }}
			    		</div>
			    		<div class="form-group">
			    			<?php $parametros2= array('class'=>'form-control input-lg', 'placeholder'=>'Password','required'=>'required')?>
			    	  		{{ Form::password('password', $parametros2 ) }}
			    		</div>
			    		<div class="checkbox">
			    	    	<label>
			    	    		<input name="remember" type="checkbox" value="Remember Me"> 
			    	    		Recordar
			    	    	</label>
			    	    </div>			    		
			    	    <button type="submit" class="btn btn-block btn-social btn-success">
			    	    	<i class="fa fa-chevron-circle-right "></i> Login
			    	    </button>
			    	</fieldset>
			      	{{ Form::close() }}
			    </div>
			</div>
		</div>
	</div>
</div>
@stop