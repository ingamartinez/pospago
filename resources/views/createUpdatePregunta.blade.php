@extends('layouts.app')



@section('content')


@include('widgets.form_open', array('router'=>'pregunta'))



@include('widgets.textarea', array('name'=>'pregunta','label'=>'Pregunta'))


@include('widgets.select', array('name'=>'id_area','label'=>'Area','values'=>$areas,'id'=>'id_area'))

@include('widgets.select', array('name'=>'dias','label'=>'Dias','values'=>['Lunes','Martes','Miercoles','Jueves','Viernes'],'id'=>'dias','multiple'=>'multiple'))


@include('widgets.select', array('name'=>'tipo_de_respuesta','label'=>'Tipo de respuesta','values'=>$tipo_de_respuesta,'id'=>'tipo_de_respuesta'))

<div id="respuestas" style="display: none;">
	@if(isset($pregunta))

@if($pregunta->respuestas->count()>0)
	@forelse($pregunta->respuestas as $respuesta)

	@include('widgets.textarea', array('name'=>'respuestas[]','label'=>'Opcion','value'=>$respuesta->respuesta))

	@endforeach
@else
@include('widgets.textarea', array('name'=>'respuestas[]','label'=>'Opcion 1'))
	@include('widgets.textarea', array('name'=>'respuestas[]','label'=>'Opcion 2'))
	@include('widgets.textarea', array('name'=>'respuestas[]','label'=>'Opcion 3'))
	@include('widgets.textarea', array('name'=>'respuestas[]','label'=>'Opcion 4'))

@endif

	@else

	@include('widgets.textarea', array('name'=>'respuestas[]','label'=>'Opcion 1'))
	@include('widgets.textarea', array('name'=>'respuestas[]','label'=>'Opcion 2'))
	@include('widgets.textarea', array('name'=>'respuestas[]','label'=>'Opcion 3'))
	@include('widgets.textarea', array('name'=>'respuestas[]','label'=>'Opcion 4'))
	@endif
</div>




@include('widgets.form_close')
@endsection



@section('script_fin')
@parent

<script type="text/javascript">

// $('#id_area').chosen({allow_single_deselect:true,width: "100%"}).change( function() {


// });

$('#tipo_de_respuesta').chosen({allow_single_deselect:true,width: "100%"}).change( function() {

	if($("#tipo_de_respuesta").val()=='4'){
		$("#respuestas").fadeIn(500);
	}else{
		$("#respuestas").fadeOut(500);
	}
});

// $('#dias').chosen({allow_single_deselect:true,width: "100%"}).change( function() {

// });


</script>
@if(isset($pregunta) and $pregunta->respuestas->count()>0)

<script type="text/javascript">

$("#respuestas").fadeIn(500);
</script>
@endif
@endsection


