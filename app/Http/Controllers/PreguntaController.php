<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\PreguntaForm;

class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
     $consulta = \DB::table((new \App\Pregunta)->getTable())->select('id','pregunta', 'id_area');

     $tabla=new \App\library\DataTables;
     $tabla->unset_delete();
     $t= $tabla->tabla($consulta,'pregunta');

     return view("list")->with('tabla', $t);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

     $areas = \App\Area::All()->pluck('area','id');

     $tipo_de_respuesta=array(
        '1'=>'Si - No',
        '2'=>'Si - No - Mal Estado',
        '3'=>'Calificar de 1 a 5',
        '4'=>'Multiples Respuestas');

     return view("createUpdatePregunta")
     ->with('areas', $areas)
     ->with('tipo_de_respuesta',$tipo_de_respuesta );
 }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(PreguntaForm $request)
    {
        if (\Request::ajax())
        {
            $pregunta = new \App\Pregunta;

            $pregunta->pregunta = \Request::input('pregunta');
            $pregunta->tipo_de_respuesta = \Request::input('tipo_de_respuesta');
            $pregunta->id_area = \Request::input('id_area');


            $pregunta->save();

            $respuestas=[];
            if($pregunta->tipo_de_respuesta==4){
                foreach (\Request::input('respuestas') as $key => $value) {
                 if(!empty($value)){
                    $respuestas[]=new \App\Respuesta(['respuesta' => $value]);
                }
            }
        }


        $pregunta->respuestas()->saveMany($respuestas);
        return response()->json(['message' => 'Post saved']);
    }
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
      $areas = \App\Area::All()->pluck('area','id');

      $tipo_de_respuesta=array(
        '1'=>'Si - No',
        '2'=>'Si - No - Mal Estado',
        '3'=>'Calificar de 1 a 5',
        '4'=>'Multiples Respuestas');

      return view("createUpdatePregunta")
      ->with('pregunta', \App\Pregunta::find($id))
      ->with('areas', $areas)
      ->with('tipo_de_respuesta',$tipo_de_respuesta );

  }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id, PreguntaForm $request)
    {
      if (\Request::ajax())
      {
        $pregunta = \App\Pregunta::find($id);

        $pregunta->pregunta = \Request::input('pregunta');
        $pregunta->tipo_de_respuesta = \Request::input('tipo_de_respuesta');
        $pregunta->id_area = \Request::input('id_area');


        $pregunta->save();

        $respuestas=[];
        if($pregunta->tipo_de_respuesta==4){
            foreach ($pregunta->respuestas as $key => $respuesta) {

                $respuesta->respuesta=\Request::input('respuestas')[$key];
               $respuesta->save();
           }


       }


        // $pregunta->respuestas()->saveMany($respuestas);


       return response()->json(['message' => 'Post saved']);
   }
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
