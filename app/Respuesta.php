<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
       protected $table = 'go_respuestas';

	protected $fillable = ['respuesta','id_pregunta'];

	protected $guarded = ['id'];

	public $timestamps = false;


    public function pregunta()
    {
        return $this->belongsTo('App\Pregunta','id_pregunta');
    }
}
