<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ReferidoForm;

use Auth;

class ReferidoController extends Controller
{

     public function __construct() 
     {
    //     $this->beforeFilter('authSentry:kkkkkkk', ['only' => 'create']);
	 date_default_timezone_set('America/Bogota');
   }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
	   
        $consulta = \DB::table((new \App\Referido)->getTable())->select('id','nombres','apellidos','asesor','created_at');

        $tabla=new \App\library\DataTables;
        $tabla->unset_add();
        $tabla->unset_delete();
        $t= $tabla->tabla($consulta,'referido');

        return view("list")->with('tabla', $t);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
		$estado_equipo=array('Si'=>'Si','No'=>'No');
		$marca_equipo=array(' '=>' ','Alcatel'=>'Alcatel','Apple'=>'Apple','Huawei'=>'Huawei','LG'=>'LG','Motorola'=>'Motorola','Nokia'=>'Nokia','Samsung'=>'Samsung','Sendtel'=>'Sendtel','Sony'=>'Sony');
		$tecnologia_equipo=array(' '=>' ','4G(LTE)'=>'4G (LTE)','3G (HSPA+)'=>'3G (HSPA+)','2G (GSM)'=>'2G (GSM)');

		$camara_primaria=array(' '=>' ','20.7 MP'=>'20.7 MP','16 MP'=>'16 MP','13 MP'=>'13 MP','12 MP'=>'12 MP','8 MP'=>'8 MP','5 MP'=>'5 MP','3.2 MP'=>'3.2 MP','3.15 MP'=>'3.15 MP','VGA'=>'VGA');
		
		$departamento=array('BOLIVAR'=>'BOLIVAR');

        $poblacion=array('MAGANGUE'=>'MAGANGUE','CARTAGENA'=>'CARTAGENA','ACHI'=>'ACHI','ALTOS DEL ROSARIO'=>'ALTOS DEL ROSARIO','ARENAL'=>'ARENAL','ARJONA'=>'ARJONA','ARROYOHONDO'=>'ARROYOHONDO','BARRANCO DE LOBA'=>'BARRANCO DE LOBA','CALAMAR'=>'CALAMAR','CANTAGALLO'=>'CANTAGALLO','CICUCO'=>'CICUCO','CORDOBA'=>'CORDOBA','CLEMENCIA'=>'CLEMENCIA','EL CARMEN DE BOLIVAR'=>'EL CARMEN DE BOLIVAR','EL GUAMO'=>'EL GUAMO','EL PEÑON'=>'EL PEÑON','HATILLO DE LOBA'=>'HATILLO DE LOBA','MAHATES'=>'MAHATES','MARGARITA'=>'MARGARITA','MARIA LA BAJA'=>'MARIA LA BAJA','MONTECRISTO'=>'MONTECRISTO','MOMPOS'=>'MOMPOS','NOROSI'=>'NOROSI','MORALES'=>'MORALES','PINILLOS'=>'PINILLOS','REGIDOR'=>'REGIDOR','RIO VIEJO'=>'RIO VIEJO','SAN CRISTOBAL'=>'SAN CRISTOBAL','SAN ESTANISLAO'=>'SAN ESTANISLAO','SAN FERNANDO'=>'SAN FERNANDO','SAN JACINTO'=>'SAN JACINTO','SAN JACINTO DEL CAUCA'=>'SAN JACINTO DEL CAUCA','SAN JUAN NEPOMUCENO'=>'SAN JUAN NEPOMUCENO','SAN MARTIN DE LOBA'=>'SAN MARTIN DE LOBA','SAN PABLO'=>'SAN PABLO','SANTA CATALINA'=>'SANTA CATALINA','SANTA ROSA'=>'SANTA ROSA','SANTA ROSA DEL SUR'=>'SANTA ROSA DEL SUR','SIMITI'=>'SIMITI','SOPLAVIENTO'=>'SOPLAVIENTO','TALAIGUA NUEVO'=>'TALAIGUA NUEVO','TIQUISIO'=>'TIQUISIO','TURBACO'=>'TURBACO','TURBANA'=>'TURBANA','VILLANUEVA'=>'VILLANUEVA','ZAMBRANO'=>'ZAMBRANO',);



        $tipo_de_prospecto=array('REFERIDO POR PUNTO DE VENTA'=>'REFERIDO POR PUNTO DE VENTA','IMPULSO'=>'IMPULSO','CUADERNO DE RECARGAS'=>'CUADERNO DE RECARGAS','LINEAS PREPAGO ALTO CONSUMO'=>'LINEAS PREPAGO ALTO CONSUMO','BASE DE DATOS GESTORES'=>'BASE DE DATOS GESTORES','ALIANZA BRILLA'=>'ALIANZA BRILLA');
        
        $interes_anterior=array('Min Tigo'=>'Min Tigo','Datos'=>'Datos','Min Tigo + Datos'=>'Min Tigo + Datos','Min Tigo+Datos+Infinito'=>'Min Tigo+Datos+Infinito','Min Tigo+Datos+Infinito+Comu'=>'Min Tigo+Datos+Infinito+Comu',       'Min TD'=>'Min TD','Min TD + Datos'=>'Min TD + Datos','Min TD+Datos+Infinito'=>'Min TD+Datos+Infinito','Min TD+Datos+Infinito+Comu'=>'Min TD+Datos+Infinito+Comu');
        $interes=array('Normal'=>'Normal','Minutos'=>'Minutos','Datos'=>'Datos','Comunidad'=>'Comunidad');
        
       $estado=array(''=>'','ACTIVO'=>'ACTIVO','INTERESADO'=>'INTERESADO','NO INTERESADO'=>'NO INTERESADO','PORTABILIDAD POTENCIAL'=>'PORTABILIDAD POTENCIAL','ACTIVACIÓN BRILLA'=>'ACTIVACIÓN BRILLA');
	   
	   $time_residencia=array('6'=>'6','12'=>'12','18'=>'18','24'=>'24');
	   $numero_llamadas=array('1'=>'1','2'=>'2','3'=>'3','4'=>'4');
	   $time_otro_operado=array('6'=>'6','12'=>'12','18'=>'18','24'=>'24');
	   $tipo_operador=array('Tigo'=>'Tigo','Claro'=>'Claro','Movistar'=>'Movistar','UFF'=>'UFF','Éxito'=>'Éxito','ETB'=>'ETB','UFF'=>'UFF','Virgine'=>'Virgine','Avantel'=>'Avantel');
	   $tipo_plan=array('Pre-Pago'=>'Pre-Pago','Pos-Pago'=>'Pos-Pago');
	   $tiene_celular=array('Si'=>'Si','No'=>'No');
	   
        $motivo_no_compra=array(
			'NO APLICA'=>'NO APLICA',
            'NO LE INTERESA'=>'NO LE INTERESA',
            'TIENE PLAN'=>'TIENE PLAN',
            'NO CONTACTADO'=>'NO CONTACTADO'

            );
			 $producto_brilla=array(
			'Plan Pos + Equipo'=>'Plan Pos + Equipo',
            'Smartphone'=>'Smartphone',
            );
			

        return view("createUpdateReferido")
		->with('departamento', $departamento)
        ->with('poblacion', $poblacion)
        ->with('estado', $estado)
		->with('estado_equipo', $estado_equipo)
		->with('marca_equipo', $marca_equipo)
		->with('tecnologia_equipo', $tecnologia_equipo)
		->with('camara_primaria', $camara_primaria)
        ->with('motivo_no_compra', $motivo_no_compra)
        ->with('tipo_de_prospecto', $tipo_de_prospecto)
		->with('time_residencia', $time_residencia)
		->with('time_otro_operado', $time_otro_operado)
		->with('tipo_operador', $tipo_operador)
		->with('tipo_plan', $tipo_plan)
		->with('tiene_celular', $tiene_celular)
		->with('producto_brilla', $producto_brilla)
		->with('numero_llamadas', $numero_llamadas)
        ->with('interes', $interes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ReferidoForm $request)
    {
        // if (\Request::ajax())
        // {
            $referido = new \App\Referido;

            $referido->departamento = \Request::input('departamento');
            $referido->ciudad = \Request::input('ciudad');
            $referido->nombres = \Request::input('nombres');
            $referido->apellidos = \Request::input('apellidos');
            $referido->empresa = \Request::input('empresa');
            $referido->correo = \Request::input('correo');
            $referido->fecha_de_nacimiento = \Request::input('fecha_de_nacimiento');
            $referido->direccion = \Request::input('direccion');
            $referido->barrio = \Request::input('barrio');
            $referido->numero_movil = \Request::input('numero_movil');
            $referido->numero_movil_2 = \Request::input('numero_movil_2');
            $referido->producto_de_interes = \Request::input('producto_de_interes');
            $referido->tipo_de_prospecto = \Request::input('tipo_de_prospecto');
            $referido->id_pdv = \Request::input('id_pdv');
            $referido->estado = \Request::input('estado');
            $referido->cedula_cliente = \Request::input('cedula_cliente');
            $referido->movil_plan_cliente = \Request::input('movil_plan_cliente');
            $referido->fecha_de_compra = \Request::input('fecha_de_compra');
            $referido->fecha_de_posible_compra = \Request::input('fecha_de_posible_compra');
            $referido->presupuesto_identificado = \Request::input('presupuesto_identificado');
            $referido->quiere_equipo = \Request::input('quiere_equipo');
            $referido->que_marca = \Request::input('que_marca');
            $referido->que_tecnologia = \Request::input('que_tecnologia');
            $referido->que_camara = \Request::input('que_camara');
            $referido->que_camara = \Request::input('numero_llamadas');
            $referido->observacion_del_asesor = \Request::input('observacion_del_asesor');
            $referido->primer_referido_nombres = \Request::input('primer_referido_nombres');
            $referido->primer_referido_apellidos = \Request::input('primer_referido_apellidos');
            $referido->primer_referido_numero_movil = \Request::input('primer_referido_numero_movil');
            $referido->segundo_referido_nombres = \Request::input('segundo_referido_nombres');
            $referido->segundo_referido_apellidos = \Request::input('segundo_referido_apellidos');
            $referido->segundo_referido_numero_movil = \Request::input('segundo_referido_numero_movil');

            $referido->asesor = Auth::user()->username;

            $referido->save();
            // return response()->json(['message' => 'Post saved']);
            return redirect('referido/create')->with('message', 'Se guardo correctamente');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
       $estado_equipo=array('Si'=>'Si','No'=>'No');
		$marca_equipo=array(' '=>' ','Alcatel'=>'Alcatel','Apple'=>'Apple','Huawei'=>'Huawei','LG'=>'LG','Motorola'=>'Motorola','Nokia'=>'Nokia','Samsung'=>'Samsung','Sendtel'=>'Sendtel','Sony'=>'Sony');
		$tecnologia_equipo=array(' '=>' ','4G(LTE)'=>'4G (LTE)','3G (HSPA+)'=>'3G (HSPA+)','2G (GSM)'=>'2G (GSM)');

		$camara_primaria=array(' '=>' ','20.7 MP'=>'20.7 MP','16 MP'=>'16 MP','13 MP'=>'13 MP','12 MP'=>'12 MP','8 MP'=>'8 MP','5 MP'=>'5 MP','3.2 MP'=>'3.2 MP','3.15 MP'=>'3.15 MP','VGA'=>'VGA');
		
		$departamento=array('BOLIVAR'=>'BOLIVAR');

        $poblacion=array('MAGANGUE'=>'MAGANGUE','CARTAGENA'=>'CARTAGENA','ACHI'=>'ACHI','ALTOS DEL ROSARIO'=>'ALTOS DEL ROSARIO','ARENAL'=>'ARENAL','ARJONA'=>'ARJONA','ARROYOHONDO'=>'ARROYOHONDO','BARRANCO DE LOBA'=>'BARRANCO DE LOBA','CALAMAR'=>'CALAMAR','CANTAGALLO'=>'CANTAGALLO','CICUCO'=>'CICUCO','CORDOBA'=>'CORDOBA','CLEMENCIA'=>'CLEMENCIA','EL CARMEN DE BOLIVAR'=>'EL CARMEN DE BOLIVAR','EL GUAMO'=>'EL GUAMO','EL PEÑON'=>'EL PEÑON','HATILLO DE LOBA'=>'HATILLO DE LOBA','MAHATES'=>'MAHATES','MARGARITA'=>'MARGARITA','MARIA LA BAJA'=>'MARIA LA BAJA','MONTECRISTO'=>'MONTECRISTO','MOMPOS'=>'MOMPOS','NOROSI'=>'NOROSI','MORALES'=>'MORALES','PINILLOS'=>'PINILLOS','REGIDOR'=>'REGIDOR','RIO VIEJO'=>'RIO VIEJO','SAN CRISTOBAL'=>'SAN CRISTOBAL','SAN ESTANISLAO'=>'SAN ESTANISLAO','SAN FERNANDO'=>'SAN FERNANDO','SAN JACINTO'=>'SAN JACINTO','SAN JACINTO DEL CAUCA'=>'SAN JACINTO DEL CAUCA','SAN JUAN NEPOMUCENO'=>'SAN JUAN NEPOMUCENO','SAN MARTIN DE LOBA'=>'SAN MARTIN DE LOBA','SAN PABLO'=>'SAN PABLO','SANTA CATALINA'=>'SANTA CATALINA','SANTA ROSA'=>'SANTA ROSA','SANTA ROSA DEL SUR'=>'SANTA ROSA DEL SUR','SIMITI'=>'SIMITI','SOPLAVIENTO'=>'SOPLAVIENTO','TALAIGUA NUEVO'=>'TALAIGUA NUEVO','TIQUISIO'=>'TIQUISIO','TURBACO'=>'TURBACO','TURBANA'=>'TURBANA','VILLANUEVA'=>'VILLANUEVA','ZAMBRANO'=>'ZAMBRANO',);



        $tipo_de_prospecto=array('REFERIDO POR PUNTO DE VENTA'=>'REFERIDO POR PUNTO DE VENTA','IMPULSO'=>'IMPULSO','CUADERNO DE RECARGAS'=>'CUADERNO DE RECARGAS','LINEAS PREPAGO ALTO CONSUMO'=>'LINEAS PREPAGO ALTO CONSUMO','FACTURERO COMPRA SMARTPHONE'=>'FACTURERO COMPRA SMARTPHONE','ALIANZA BRILLA'=>'ALIANZA BRILLA');
        
        $interes=array('Min Tigo'=>'Min Tigo','Datos'=>'Datos','Min Tigo + Datos'=>'Min Tigo + Datos','Min Tigo+Datos+Infinito'=>'Min Tigo+Datos+Infinito','Min Tigo+Datos+Infinito+Comu'=>'Min Tigo+Datos+Infinito+Comu',       'Min TD'=>'Min TD','Min TD + Datos'=>'Min TD + Datos','Min TD+Datos+Infinito'=>'Min TD+Datos+Infinito','Min TD+Datos+Infinito+Comu'=>'Min TD+Datos+Infinito+Comu');
        
       $estado=array('ACTIVO'=>'ACTIVO','INTERESADO'=>'INTERESADO','NO INTERESADO'=>'NO INTERESADO','PORTABILIDAD POTENCIAL'=>'PORTABILIDAD POTENCIAL','ACTIVACIÓN BRILLA'=>'ACTIVACIÓN BRILLA');
	   
	   $time_residencia=array('6'=>'6','12'=>'12','18'=>'18','24'=>'24');
	   $time_otro_operado=array('6'=>'6','12'=>'12','18'=>'18','24'=>'24');
	   $tipo_operador=array('Tigo'=>'Tigo','Claro'=>'Claro','Movistar'=>'Movistar','UFF'=>'UFF','Éxito'=>'Éxito','ETB'=>'ETB','UFF'=>'UFF','Virgine'=>'Virgine','Avantel'=>'Avantel');
	   $tipo_plan=array('Pre-Pago'=>'Pre-Pago','Pos-Pago'=>'Pos-Pago');
	   $tiene_celular=array('Si'=>'Si','No'=>'No');
	   
        $motivo_no_compra=array(
			'NO APLICA'=>'NO APLICA',
            'NO LE INTERESA'=>'NO LE INTERESA',
            'TIENE PLAN'=>'TIENE PLAN',
            'NO CONTACTADO'=>'NO CONTACTADO'

            );
			 $producto_brilla=array(
			'Plan Pos + Equipo'=>'Plan Pos + Equipo',
            'Smartphone'=>'Smartphone',
            );
            

        return view("createUpdateReferido")
        ->with('referido', \App\Referido::find($id))
        ->with('departamento', $departamento)
        ->with('poblacion', $poblacion)
        ->with('estado', $estado)
        ->with('estado_equipo', $estado_equipo)
        ->with('marca_equipo', $marca_equipo)
        ->with('tecnologia_equipo', $tecnologia_equipo)
        ->with('camara_primaria', $camara_primaria)
        ->with('motivo_no_compra', $motivo_no_compra)
        ->with('tipo_de_prospecto', $tipo_de_prospecto)
        ->with('time_residencia', $time_residencia)
        ->with('time_otro_operado', $time_otro_operado)
        ->with('tipo_operador', $tipo_operador)
        ->with('tipo_plan', $tipo_plan)
        ->with('tiene_celular', $tiene_celular)
        ->with('producto_brilla', $producto_brilla)
        ->with('interes', $interes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //  if (\Request::ajax())
        // {
          
            $referido = \App\Referido::find($id);
            
            $referido->departamento = \Request::input('departamento');
            $referido->ciudad = \Request::input('ciudad');
            $referido->nombres = \Request::input('nombres');
            $referido->apellidos = \Request::input('apellidos');
            $referido->empresa = \Request::input('empresa');
            $referido->correo = \Request::input('correo');
            $referido->fecha_de_nacimiento = \Request::input('fecha_de_nacimiento');
            $referido->direccion = \Request::input('direccion');
            $referido->barrio = \Request::input('barrio');
            $referido->numero_movil = \Request::input('numero_movil');
            $referido->numero_movil_2 = \Request::input('numero_movil_2');
            $referido->producto_de_interes = \Request::input('producto_de_interes');
            $referido->tipo_de_prospecto = \Request::input('tipo_de_prospecto');
            $referido->id_pdv = \Request::input('id_pdv');
            $referido->estado = \Request::input('estado');
            $referido->cedula_cliente = \Request::input('cedula_cliente');
            $referido->movil_plan_cliente = \Request::input('movil_plan_cliente');
            $referido->fecha_de_compra = \Request::input('fecha_de_compra');
            $referido->fecha_de_posible_compra = \Request::input('fecha_de_posible_compra');
            $referido->presupuesto_identificado = \Request::input('presupuesto_identificado');
            $referido->quiere_equipo = \Request::input('quiere_equipo');
            $referido->que_marca = \Request::input('que_marca');
            $referido->que_tecnologia = \Request::input('que_tecnologia');
            $referido->que_camara = \Request::input('que_camara');
            $referido->observacion_del_asesor = \Request::input('observacion_del_asesor');
            $referido->primer_referido_nombres = \Request::input('primer_referido_nombres');
            $referido->primer_referido_apellidos = \Request::input('primer_referido_apellidos');
            $referido->primer_referido_numero_movil = \Request::input('primer_referido_numero_movil');
            $referido->segundo_referido_nombres = \Request::input('segundo_referido_nombres');
            $referido->segundo_referido_apellidos = \Request::input('segundo_referido_apellidos');
            $referido->segundo_referido_numero_movil = \Request::input('segundo_referido_numero_movil');

            $referido->save();
            // return response()->json(['message' => 'Post saved']);
            return redirect()->route('referido.edit', ['referido' => $id])->with('message', 'Actulaizado Correctamente');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
