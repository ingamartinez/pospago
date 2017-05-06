<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>RUTERO DEL {{ $invoice }}</title>
 
<link href="{{asset('css/pdf.css')}}" rel='stylesheet'>
  </head>
  <body>

    <main>
      <div id="details" class="clearfix">
        <div id="invoice">
          <h1>TOTAL DE REFERIDOS INGRESADOS</h1>	
          <div class="date">Fecha de consulta: {{ $date }}</div>
		  
			 
			 <div class="date">Cedula del Promotor/Asesor: {{@$nombre->cedula_e_c}} </div>
			
			
			
			
		  
		    
			<div class="date">Nombre del Promotor/Asesor: {{ @$nombre->nombre_e_c }}</div>
				
			

			



	
		    <div class="date">Distribuidor: AMCOM S.A</div>
			<div class="date">Formato: SJ_V001</div>
			
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="total">#</th>
            <th class="desc">Departamento</th>
            <th class="unit">Ciudad</th>
			<th class="desc">Nombres Y Apellidos</th>
			<th class="unit">Empresa</th>
			<th class="desc">{{ $data['movil'] }}</th>
			<th class="unit">Estado</th>
			<th class="desc">Producto de Interes</th>
			<th class="unit">Presupuesto Identificado</th>
			<th class="desc">Quiere Equipo</th>
			<th class="unit">Marca Preferida</th>
			<th class="desc">{{ $data['tecnologia'] }}</th>
			<th class="desc">{{ $data['observacion'] }}</th>
			<th class="unit">Gestión del Asesor</th>
			
           
          </tr>
        </thead>
        <tbody>

        @forelse($referidos as $referido)
			<tr>
<td>{{$referido->id}} </td>
<td>{{$referido->departamento}}</td>
<td>{{$referido->ciudad}}</td>
<td>{{$referido->nombres}} {{$referido->apellidos}}</td>
<td>{{$referido->empresa}}</td>
<td>{{$referido->numero_movil}}</td>
<td>{{$referido->estado}}</td>
<td>{{$referido->producto_de_interes}}</td>
<td>{{$referido->presupuesto_identificado}}</td>
<td>{{$referido->quiere_equipo}}</td>
<td>{{$referido->que_marca}}</td>
<td>{{$referido->que_tecnologia}}</td>
<td>{{$referido->observacion_del_asesor}}</td>
<td></td>
			</tr>
			@endforeach

        </tbody>
        <tfoot>
          <tr>
            <td colspan="0"></td>
            <td></td>
            <td></td>
          </tr>
        </tfoot>
      </table>
  </body>
</html>