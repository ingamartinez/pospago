@extends('layouts.app')



@section('content')


<!-- <ul class="nav nav-tabs" role="tablist" style="margin-left: -11px;">
	<li role="presentation" class="active"><a href="#">Añadir</a></li>
	<li role="presentation"><a href="#">Listado</a></li>
	</ul>
<br> -->

@include('widgets.form_open',['router'=>'referido'])




<div class="row">
	<div class="box col-md-12">
		<div class="box-inner">
			<div class="box-header well">
				<h2>
					<i class="glyphicon glyphicon-star yellow">
					</i>
				Información</h2>
				
				<div class="box-icon">
					<!-- <a href="#" class="btn btn-setting btn-round btn-default"><i
					class="glyphicon glyphicon-cog"></i></a>-->	
					<a href="#" class="btn btn-minimize btn-round btn-default"><i
						class="glyphicon glyphicon-chevron-down"></i>
					</a>
					<!-- <a href="#" class="btn btn-close btn-round btn-default"><i
					class="glyphicon glyphicon-remove"></i>-->	
				</a>
			</div>
		</div>
		<div id="informacion" class="box-content row">
			<div class="col-lg-7 col-md-12">
				{{--@include('widgets.select', array('name'=>'departamento','label'=>'Departamento','values'=>$departamento))--}}
				@include('widgets.select', array('name'=>'ciudad','label'=>'Ciudad/Población','values'=>$poblacion))
				@include('widgets.text', array('name'=>'nombres','label'=>'Nombres','required' => ''))
				@include('widgets.text', array('name'=>'apellidos','label'=>'Apellidos','required' => ''))
				@include('widgets.text', array('name'=>'empresa','label'=>'Empresa'))
				@include('widgets.email', array('name'=>'correo','label'=>'Correo Electrónico '))
				<!-- @include('widgets.fecha_cumple', array('name'=>'fecha_de_nacimiento','label'=>'Fecha Cumpleaños','required' => ''))-->
				<!-- @include('widgets.text', array('name'=>'direccion','label'=>'Dirección'))-->
				<!--@include('widgets.text', array('name'=>'barrio','label'=>'Barrio'))-->
				@include('widgets.number', array('name'=>'numero_movil','label'=>'Número Móvil','required' => ''))
				@include('widgets.number', array('name'=>'numero_movil_2','label'=>'Número Móvil 2(Opcional)'))
				@include('widgets.select', array('name'=>'producto_de_interes','label'=>'Producto de Interes','values'=>$interes))
				@include('widgets.select', array('name'=>'numero_llamadas','label'=>'# de llamadas','values'=>$numero_llamadas,'id'=>'numero_llamadas'))
				@include('widgets.select', array('name'=>'tipo_de_prospecto','label'=>'Tipo de prospecto','values'=>$tipo_de_prospecto,'id'=>'tipo_de_prospecto'))
				
				<div id='div_id_pdv'>
					@include('widgets.number', array('name'=>'id_pdv','label'=>'ID PDV'))
					{{--@include('widgets.textreq', array('name'=>'id_pdv','label'=>'Nombre del Punto'))--}}
					{{--<div class="col-lg-offset-2 col-lg-10">
						<input class="btn btn-info" name="validaripdv" value="VALIDAR IDPDV">--}}
					</div>
				</div>
			</div>
			
			
		</div>
	</div>
	




<div class="row">
	<div class="box col-md-12">
		<div class="box-inner">
			<div class="box-header well">
				<h2><i class="glyphicon glyphicon-bell blue"></i> Datos Estratégicos
				</h2>
				<div class="box-icon">
					<!-- <a href="#" class="btn btn-setting btn-round btn-default"><i
					class="glyphicon glyphicon-cog"></i></a>-->	
					<a href="#" class="btn btn-minimize btn-round btn-default"><i
						class="glyphicon glyphicon-chevron-down"></i>
					</a>
					<!-- <a href="#" class="btn btn-close btn-round btn-default"><i
					class="glyphicon glyphicon-remove"></i>-->	
				</a>
			</div>
			
		</div>
		
		<div id="datos_estrategicos" class="box-content row">
			<div class="col-lg-7 col-md-12">
				
				@include('widgets.select', array('id'=>'estado','name'=>'estado','label'=>'Estado','values'=>$estado,'placeholder'=>'Escoja Estado'))
				<div class=".col-xs-12 .col-md-8" id='div_fecha_compra'>	
					@include('widgets.fecha_compra', array('name'=>'fecha_de_compra','label'=>'Fecha de Compra'))
					@include('widgets.text', array('id'=>'numeromiles','name'=>'cedula_cliente','label'=>'C.C del Cliente','opciones'=>['onkeyup'=>'format(this)','onchange'=>'format(this)']))
					@include('widgets.number', array('name'=>'movil_plan_cliente','label'=>'Móvil del Plan Activado'))
				</div>
				
			</div>
			
			<div  class="col-lg-7 col-md-12" id='div_no_interesado'>	
			    @include('widgets.fecha_contacto', array('name'=>'fecha_de_contacto','label'=>'Fecha de Contacto'))		 
				<!--@include('widgets.text', array('name'=>'referido_otro_operador_nombres','label'=>'Nombres'))
				@include('widgets.text', array('name'=>'referido_otro_operador_apellidos','label'=>'Apellidos'))-->
				@include('widgets.select', array('id'=>'tipo_operador','name'=>'tipo_operador','label'=>'Operador','values'=>$tipo_operador))
				@include('widgets.select', array('id'=>'tipo_plan','name'=>'tipo_plan','label'=>'Tipo de Plan','values'=>$tipo_plan))
				@include('widgets.select', array('id'=>'tiempo_con_otro_operador','name'=>'tiempo_con_otro_operador','label'=>'Tiempo de Permanencia','values'=>$time_otro_operado))
				@include('widgets.number', array('name'=>'movil_plan_cliente','label'=>'Número Móvil'))
				@include('widgets.select', array('id'=>'tiene_celular','name'=>'tiene_celular','label'=>'Tiene Smartphone','values'=>$tiene_celular))
			</div>
			
			<!--Comienzo a alianza brilla -->
			<div  class="col-lg-7 col-md-12" id='div_alianza_brilla'>	
				@include('widgets.fecha_brilla', array('name'=>'fecha_de_compra_brilla','label'=>'Fecha de Compra'))			
				@include('widgets.text', array('id'=>'numeromiles','name'=>'cedula_cliente_brilla','label'=>'C.C del Cliente','opciones'=>['onkeyup'=>'format(this)','onchange'=>'format(this)']))
				@include('widgets.select', array('id'=>'producto_brilla','name'=>'producto_brilla','label'=>'Producto','values'=>$producto_brilla))
			    @include('widgets.number', array('name'=>'num_contrato','label'=>'Número de Contrato Brilla'))
			</div>
			
			<!--@include('widgets.tel', array('name'=>'numero_personas_acargo','label'=>'Personas A Cargo'))-->
			<!--@include('widgets.select', array('id'=>'tiempo_permanencia_casa','name'=>'tiempo_residencia_casa','label'=>'Tiempo de Residencia','values'=>$time_residencia))-->
			<!--@include('widgets.text', array('name'=>'ref_movil','label'=>'Referencia Del Móvil'))-->
			<!--@include('widgets.tel', array('name'=>'valor_movil','label'=>'Valor'))-->

			<div class="col-lg-7 col-md-12" id='div_alianza_brilla_plan_equipo'>
				@include('widgets.number', array('name'=>'movil_plan_brilla','label'=>'Número del Móvil'))
				@include('widgets.text', array('id'=>'numeromiles','name'=>'cargo_basico','label'=>'Cargo Básico','opciones'=>['onkeyup'=>'format(this)','onchange'=>'format(this)']))
				@include('widgets.text', array('name'=>'ref_movil','label'=>'Referencia  Del Equipo'))
			</div>
			
			<div class="col-lg-7 col-md-12" id='div_alianza_brilla_equipo'>
				@include('widgets.number', array('name'=>'movil_equipo_brilla','label'=>'Número del Móvil'))
				@include('widgets.text', array('id'=>'numeromiles','name'=>'valor_equipo','label'=>'Valor Del Equipo','opciones'=>['onkeyup'=>'format(this)','onchange'=>'format(this)']))
				@include('widgets.text', array('name'=>'ref_equipo','label'=>'Referencia Del Equipo'))
			</div>
			
		
		<!--Fin alianza brilla -->
		
		
		<div class="col-lg-7 col-md-12" id='div_fecha_posible_compra'>
			@include('widgets.fecha_posible_compra', array('id'=>'datepicker','name'=>'fecha_de_posible_compra','label'=>'Fecha de Posible Compra'))
		</div>
		
		<div class="col-lg-7 col-md-12"  id='div_interesado_equipo'>
			@include('widgets.text', array('id'=>'numeromiles','name'=>'presupuesto_identificado','label'=>'Presupuesto Identificado','opciones'=>['onkeyup'=>'format(this)','onchange'=>'format(this)']))
			{{--@include('widgets.select', array('id'=>'quiere_equipo','name'=>'quiere_equipo','label'=>'¿Quiere Equipo?','values'=>$estado_equipo))--}}
			
			<div  id='div_caracteristicas_equipo'>
				{{--@include('widgets.select', array('name'=>'que_marca','label'=>'¿Cual Es Su Marca Preferida?','values'=>$marca_equipo))--}}
				{{--@include('widgets.select', array('name'=>'que_tecnologia','label'=>'¿Que Tecnología?','values'=>$tecnologia_equipo))--}}
				{{--@include('widgets.select', array('name'=>'que_camara','label'=>'¿Que Cámara?','values'=>$camara_primaria))--}}
			</div>
			
		</div>
		<!--@include('widgets.select', array('name'=>'motivo_no_compra','label'=>'Motivo no compra','values'=>$motivo_no_compra))-->
		
		
		<div  class="col-lg-7 col-md-12">
		@include('widgets.textarea', array('name'=>'observacion_del_asesor','label'=>'Observación del asesor'))
		<!--@include('widgets.textarea', array('name'=>'observacion_del_call_center','label'=>'Observación del call center'))-->
		</div>
		
</div>		
</div>	
</div>








<div id='div_referidos_Plan'>
	<!--COMIENZO CAPA REFERIDOS DEL PLAN ACTIVADO-->	
	
		<div class="box col-md-12">
			<div class="box-inner">
				<div class="box-header well">
					<h2><i class="glyphicon glyphicon glyphicon-magnet"></i> Referidos del plan activado</h2>
					<div class="box-icon">
						<!-- <a href="#" class="btn btn-setting btn-round btn-default"><i
						class="glyphicon glyphicon-cog"></i></a>-->	
						<a href="#" class="btn btn-minimize btn-round btn-default"><i
							class="glyphicon glyphicon-chevron-up"></i>
						</a>
						<!-- <a href="#" class="btn btn-close btn-round btn-default"><i
						class="glyphicon glyphicon-remove"></i>-->	
					</a>
				</div>
				
			</div>
			<div class="box-content row">
				<div class="col-lg-7 col-md-12">
					<h2><i class="glyphicon glyphicon glyphicon-user"></i>Primer Referido</h2>
					@include('widgets.text', array('name'=>'primer_referido_nombres','label'=>'Nombres'))
					@include('widgets.text', array('name'=>'primer_referido_apellidos','label'=>'Apellidos'))
					@include('widgets.number', array('name'=>'primer_referido_numero_movil','label'=>'Número Móvil'))
					<h2><i class="glyphicon glyphicon glyphicon-user"></i>Segundo Referido</h2>
					@include('widgets.text', array('name'=>'segundo_referido_nombres','label'=>'Nombres'))
					@include('widgets.text', array('name'=>'segundo_referido_apellidos','label'=>'Apellidos'))
					@include('widgets.number', array('name'=>'segundo_referido_numero_movil','label'=>'Número Móvil'))
					<!--@include('widgets.select', array('name'=>'motivo_no_compra','label'=>'Motivo no compra','values'=>$motivo_no_compra))-->
					<!--@include('widgets.textarea', array('name'=>'observacion_del_call_center','label'=>'Observación del call center'))-->	
				</div>
				
				
				
				
			</div>
		</div>
	</div>
</div>
  

<!--FIN CAPA REFERIDOS DEL PLAN ACTIVADO-->

<div id='div_referencia_familiar'>
	<!--COMIENZO CAPA REFERENCIA FAMILIAR-->	

		<div class="box col-md-12">
			<div class="box-inner">
				
				<div class="box-header well">
					<h2><i class="glyphicon glyphicon glyphicon-magnet"></i> Referencia Familiar</h2>
					<div class="box-icon">
						<!-- <a href="#" class="btn btn-setting btn-round btn-default"><i
						class="glyphicon glyphicon-cog"></i></a>-->	
						<a href="#" class="btn btn-minimize btn-round btn-default"><i
							class="glyphicon glyphicon-chevron-up"></i>
						</a>
						<!-- <a href="#" class="btn btn-close btn-round btn-default"><i
						class="glyphicon glyphicon-remove"></i>-->	
					</a>
				</div>
				
			</div>
			<div class="box-content row">
				<div class="col-lg-7 col-md-12">
					<h2><i class="glyphicon glyphicon glyphicon-user"></i>Referencia Familiar</h2>
					@include('widgets.text', array('name'=>'ref_fami_nombres','label'=>'Nombres'))
					@include('widgets.text', array('name'=>'ref_fami_apellidos','label'=>'Apellidos'))
					@include('widgets.number',  array('name'=>'ref_fami_numero_movil','label'=>'Número Móvil'))
					<!--@include('widgets.select', array('name'=>'motivo_no_compra','label'=>'Motivo no compra','values'=>$motivo_no_compra))-->
					<!--@include('widgets.textarea', array('name'=>'observacion_del_call_center','label'=>'Observación del call center'))-->
				</div>
				
				
				
				
			</div>
		</div>
	</div>
</div>

</div>




<!--FIN CAPA REFERENCIA FAMILIAR-->	 






@include('widgets.form_close')

@endsection






@section('script_fin')
@parent

<script type="text/javascript">
	$("#div_referidos_Plan").hide(500);
	$("#div_referencia_familiar").hide(500);
	$("#datos_estrategicos").hide(500);
	$("#div_alianza_brilla").hide(500);
	$("#div_alianza_brilla_equipo").hide(500);
	$("#div_alianza_brilla_plan_equipo").hide(500);
	$("#div_fecha_posible_compra").hide(500);
	$("#div_interesado_equipo").hide(500);
	$("#div_fecha_compra").hide(500);


	

	
	
	
	$("#informacion").hide(500);
	
	/*$('#tipo_de_prospecto').chosen().change( function() {
		
		if($("#tipo_de_prospecto").val()=='REFERIDO POR PUNTO DE VENTA'){
			$("#div_id_pdv").show(500);
			}else{
			$("#div_id_pdv").hide(500);
		}
		
	});*/

	$('#tipo_de_prospecto').on('change', function() {
		if($(this).val()=='REFERIDO POR PUNTO DE VENTA'){
			$("#div_id_pdv").show(500);
			}else{
			$("#div_id_pdv").hide(500);
		}
	});

	$( "#tipo_de_prospecto option:selected" ).each(function() {
      	if($(this).val()=='REFERIDO POR PUNTO DE VENTA'){
			$("#div_id_pdv").show(500);
			}else{
			$("#div_id_pdv").hide(500);
		}
    });
	
	
	$('#estado').chosen().change( function() {
		
		
		
		
		if($("#estado").val()=='NO INTERESADO'){
			$("#div_fecha_posible_compra").hide(500);
			$("#div_interesado_equipo").hide(500);
			$("#div_no_interesado").show(500);
			}else{
			
			$("#div_fecha_posible_compra").hide(500);
			$("#div_interesado_equipo").hide(500);
			$("#div_no_interesado").hide(500);
			
		}
		
		if($("#estado").val()=='PORTABILIDAD POTENCIAL'){
			
			$("#div_fecha_posible_compra").show(500);
			$("#div_interesado_equipo").show(500);
			}else{
			
			$("#div_fecha_posible_compra").hide(500);
			$("#div_interesado_equipo").hide(500);
		}
		
		
		
		
		if($("#estado").val()=='ACTIVO'){
			$("#div_referidos_Plan").show(500);
			$("#div_fecha_compra").show(500);
			}else{
			$("#div_referidos_Plan").hide(500);
			$("#div_fecha_compra").hide(500);
		}
		
		if($("#estado").val()=='ACTIVACIÓN BRILLA'){
			
			$("#div_alianza_brilla").show(500);
			$("#div_referencia_familiar").show(500);
			}else{
			
			$("#div_alianza_brilla").hide(500);
			$("#div_referencia_familiar").hide(500);
		}
		
		
		if($("#estado").val()=='INTERESADO'){
			
			$("#div_fecha_posible_compra").show(500);
			$("#div_interesado_equipo").show(500);
		}
		
		
		
	});
	
	
	$('#quiere_equipo').chosen().change( function() {
		
		if($("#quiere_equipo").val()=='Si'){
			$("#div_caracteristicas_equipo").show(500);
			}else{
			$("#div_caracteristicas_equipo").hide(500);
		}
		
	});
	
	$('#producto_brilla').chosen().change( function() {
		
		if($("#producto_brilla").val()=='Smartphone'){
			$("#div_alianza_brilla_equipo").show(500);
			}else{
			$("#div_alianza_brilla_equipo").hide(500);
			
		}
		
		if($("#producto_brilla").val()=='Plan Pos + Equipo'){
			$("#div_alianza_brilla_plan_equipo").show(500);
			}else{
			$("#div_alianza_brilla_plan_equipo").hide(500);
			
		}
	});
	
	
	
</script>

<script>
	
	
	//Poner los puntos de miles 
	$(document).ready(function(){
		$("#numeromiles").on("click",function(){
			
			$("#numeromiles").attr("onkeyup","format(this)");
			$("#numeromiles").attr("onchange","format(this)");
		});
	});
	
</script>




<script>
	
	function format(input)
	
	{
		var num = input.value.replace(/\./g,'');
		if(!isNaN(num)){
			num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
			num = num.split('').reverse().join('').replace(/^[\.]/,'');
			input.value = num;
		}
		
		else{
			input.value = input.value.replace(/[^\d\.]*/g,'');
		}
	}
</script>

@endsection

