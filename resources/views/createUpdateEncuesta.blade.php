@extends('layouts.app')



@section('content')


@include('widgets.form_open', array('router'=>'pregunta'))

@forelse($areas as $area)

 @if($area->preguntas->count()>0)
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">{{$area->area}}</h3>
  </div>
  <div class="panel-body">


@forelse($area->preguntas as $pregunta)
@if($pregunta->tipo_de_respuesta==1)

<div class="form-group">
	<label for="Nombre" class="col-lg-12"> {{$pregunta->pregunta}}</label>
	<div class="col-lg-12">
		<div class="radio">
			@forelse($pregunta->respuestas as $respuesta)
			<label>
				{!! Form::radio('pregunta_'.$pregunta->id,$respuesta->id,null) !!}{{$respuesta->respuesta}}
			</label>
			@endforeach

			
		</div>
	</div>
</div>

@else
@if($pregunta->tipo_de_respuesta==2)

<div class="form-group">
	<label for="Nombre" class="col-lg-12"> {{$pregunta->pregunta}}</label>
	<div class="col-lg-12">
		<div class="radio">
			@forelse($pregunta->respuestas as $respuesta)
			<label>
				{!! Form::radio('pregunta_'.$pregunta->id,$respuesta->id,null) !!}{{$respuesta->respuesta}}
			</label>
			@endforeach
			
		</div>
	</div>
</div>

@else
@if($pregunta->tipo_de_respuesta==3)

<div class="form-group">
	<label for="Nombre" class="col-lg-12"> {{$pregunta->pregunta}}</label>
	<div class="col-lg-12">
		<div class="radio">
			@forelse($pregunta->respuestas as $respuesta)
			<label>
				{!! Form::radio('pregunta_'.$pregunta->id,$respuesta->id,null) !!}{{$respuesta->respuesta}}
			</label>
			@endforeach
			
		</div>
	</div>
</div>


@else
@if($pregunta->tipo_de_respuesta==4)

<div class="form-group">
	<label for="Nombre" class="col-lg-12"> {{$pregunta->pregunta}}</label>
	<div class="col-lg-12">
		
		@forelse($pregunta->respuestas as $respuesta)
		<div class="radio">
			<label>
				{!! Form::radio('pregunta_'.$pregunta->id,$respuesta->id,null) !!}{{$respuesta->respuesta}}
			</label>
		</div>
		@endforeach
		
		
	</div>
</div>

@endif
@endif
@endif
@endif

@endforeach

    


  </div>
</div>
@endif
@endforeach



@include('widgets.form_close')
@endsection
