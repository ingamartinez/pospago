<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
class Pdf_R_I_TController extends Controller
{
	   /**
     * Para crear el pdf.
     *
     * @return Response
     */

	    public function contarreferidos() 
    {
		
		$cedula= Auth::user()->username;
		$date = date('d-m-Y');
		
		$nombre= \DB::table('tabla_e_c')
		->where('cedula_e_c', '=', $cedula)
		->first();
		
		
		$referidos= \DB::table('go_referidos')->where('asesor', '=', $cedula)->get();
		$contarreferido= \DB::table('go_referidos')->where('asesor', '=', $cedula)->count('asesor');
        $data = $this->getData();
       
        $invoice = "ASESOR";
        $view =  \View::make('pdf_reporte_r_i_t', compact('data', 'date', 'invoice','referidos','nombre','cedula','contarreferido'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('pdf_reporte_r_i_t');
    }

    public function getData() 
    {
        $data =  [
            'quantity'      => '1' ,
            'description'   => 'some ramdom text',
            'price'   => '500',
            'total'     => '500',
			'movil' => 'Mòvil',
			'tecnologia' => 'Tecnología',
			'observacion'=> 'Observación',
			'actualizacion'=> 'Actualización'
        ];
        return $data;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
