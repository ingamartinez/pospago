<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{

	protected $table = 'go_areas';

	protected $fillable = ['area'];

	protected $guarded = ['id'];

	public $timestamps = false;


 public function preguntas()
    {
        return $this->hasMany('App\Pregunta','id_area');
    }

}
