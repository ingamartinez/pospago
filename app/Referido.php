<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referido extends Model
{
	protected $table = 'go_referidos';

	protected $fillable = [
	'departamento',
	'ciudad',
	'nombres',
	'apellidos',
	'empresa',
	'correo',
	'fecha_de_nacimiento',
	'direccion',
	'barrio',
	'numero_movil',
	'numero_movil_2',
	'producto_de_interes',
	'tipo_de_prospecto',
	'id_pdv',
	'estado',
	'cedula_cliente',
	'movil_plan_cliente',
	'fecha_de_compra',
	'fecha_de_posible_compra',
	'presupuesto_identificado',
	'quiere_equipo',
	'que_marca',
	'que_tecnologia',
	'que_camara',
	'observacion_del_asesor',
	'primer_referido_nombres',
	'primer_referido_apellidos',
	'primer_referido_numero_movil',
	'segundo_referido_nombres',
	'segundo_referido_apellidos',
	'segundo_referido_numero_movil',
	'asesor'
	];

	protected $guarded = ['id'];


}
