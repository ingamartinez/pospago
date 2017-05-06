<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    
    protected $table = 'go_preguntas';

	protected $fillable = ['pregunta','tipo_de_respuesta','id_area'];

	protected $guarded = ['id'];

	public $timestamps = false;


    public function area()
    {
        return $this->belongsTo('App\Area','id_area');
    }

     public function respuestas()
    {
        return $this->hasMany('App\Respuesta','id_pregunta');
    }
}
