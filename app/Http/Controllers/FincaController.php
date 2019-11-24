<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Finca;
use App\Departamento;
use App\Ciudades;
use Validator;
use DB;
use Barryvdh\DomPDF\Facade as PDF;
use DataTables;


class FincaController extends Controller
{   
    public function index()
    {
        return view('fincas.index');
    }

	public function registros_finca()
	{
        $fincas = DB::table('fincas')
            ->join('departamentos', 'fincas.departamento_id', '=', 'departamentos.id')

            ->join('ciudades', function($join)
		        {
		            $join->on('fincas.ciudad_id', '=', 'ciudades.id')
		                 ->on('fincas.departamento_id', '=', 'ciudades.departamento_id');
		        })
            ->select('fincas.id','departamentos.descripcion as departamento', 'ciudades.descripcion as ciudad', 'fincas.direccion','fincas.telefono','fincas.created_at','fincas.updated_at')
            ->get();         

        return DataTables::of($fincas)
        ->addColumn('action', function ($data){
            return '
                <div style="display:flex;align-items:center;justify-content:center">
                <a style="margin-right: 5%;text" href="'.url('fincas', $data->id).'" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></a>

                <a style="margin-right: 5%;text" href="'.route('fincas.edit', $data->id).'" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i></a>

                <a style="margin-right: 5%;text" data-id="'.$data->id.'" class="btn btn-danger delete_button"><i class="glyphicon glyphicon-trash"></i></a>

                <a style="margin-right: 5%;text" href="'.route('lotes_finca', $data->id).'" class="btn btn-info">lotes <i class="glyphicon glyphicon-th"></i></a>
                </div>
                ';
        })
        ->make(true);
	}

	public function show($id)
	{
		$finca = DB::table('fincas')
            ->join('departamentos', 'fincas.departamento_id', '=', 'departamentos.id')

            ->join('ciudades', function($join)
		        {
		            $join->on('fincas.ciudad_id', '=', 'ciudades.id')
		                 ->on('fincas.departamento_id', '=', 'ciudades.departamento_id');
		        })
            ->select('fincas.id','departamentos.descripcion as departamento', 'ciudades.descripcion as ciudad', 'fincas.direccion','fincas.telefono','fincas.created_at','fincas.updated_at')
            ->where('fincas.id','=',$id)
            ->get();
        
        //como en la vista no hay foreach y la consulta devuelve 1 solo registro se captura la 1ra posicion
        $finca = $finca[0]; 

		return view('fincas.ver', compact('finca'));
	}

	public function create()
	{	
		$departamentos = Departamento::all()->pluck("descripcion","id");
		return view('fincas.crear',compact('departamentos'));
	}

	public function store(Request $request)
	{
		$finca = $request->all();
		$validator = Validator::make($finca, [
			'departamento_id'    => 'required|max:50',
			'ciudad_id'  => 'required|max:50',
			'direccion'    => 'max:20',
			'telefono'     => 'required',
		]);

		if ($validator->fails()) {
			return back()->withErrors($validator)->withInput();
		} else {
			// if ($request->file('imagen')) {
			// 	$pelicula['imagen'] = $request->file('imagen')->getClientOriginalName();
			// 	$request->file('imagen')->move(public_path('img'), $pelicula['imagen']);
			// }else{
			// 	$pelicula['imagen'] = 'default';
			// }
			/*hace la funcion de autoincrementable*/
			$current_id = DB::table('fincas')->max('id');
			$finca['id'] = $current_id + 1;

			Finca::create($finca);
			return redirect('fincas');    
		}
	}

	public function edit($id)
    {	
        // $finca = Finca::find($id);
        $finca = DB::table('fincas')
            ->join('departamentos', 'fincas.departamento_id', '=', 'departamentos.id')

            ->join('ciudades', function($join)
		        {
		            $join->on('fincas.ciudad_id', '=', 'ciudades.id')
		                 ->on('fincas.departamento_id', '=', 'ciudades.departamento_id');
		        })
            ->select('fincas.id','departamentos.id as dep_id', 'ciudades.id as ciudad_id', 'fincas.direccion','fincas.telefono','fincas.created_at','fincas.updated_at')
            ->where('fincas.id','=',$id)
            ->get();
        
        //como en la vista no hay foreach y la consulta devuelve 1 solo registro se captura la 1ra posicion
        $finca = $finca[0]; 

        //envio departamentos para el select
        $departamentos = Departamento::all()->pluck("descripcion","id");
        //envio ciudades del departamento segun la finca que voy a editar, por si solo se equivoco de municipio
        $ciudades = Ciudades::all()
        ->where('departamento_id','=',$finca->dep_id)
        ->pluck("descripcion","id");
        
        return view('fincas.editar', compact('finca','departamentos','ciudades'));        
        
    }

	public function update(Request $request, $id)
    {
        $nuevosDatosFinca = $request->all();
        $finca = Finca::find($id);

        $validator = Validator::make($nuevosDatosFinca, [
            'departamento_id'    => 'required|max:50',
			'ciudad_id'  => 'required|max:50',
			'direccion'    => 'max:20',
			'telefono'     => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            // if ($request->file('imagen')) {
            //     $nuevosDatosFinca['imagen'] = $request->file('imagen')->getClientOriginalName();
            //     $request->file('imagen')->move(public_path('img'), $nuevosDatosFinca['imagen']);
            // }else{
            //     $nuevosDatosFinca['imagen'] = $nuevosDatosFinca['imagenOriginal'];
            // }

            $finca->update($nuevosDatosFinca);
            return redirect('fincas');
        }
    }

    public function destroy($id)
    {
    	Finca::find($id)->delete();
    	return redirect('fincas');
    }


    public function ajaxCiudades(Request $request)
    {
    	if($request->ajax()){

    		$ciudades = DB::table('ciudades')->where('departamento_id',$request->departamento_id)->pluck("descripcion","id")->all();

    		$data = view('fincas.select-ciudades',compact('ciudades'))->render();
    		return response()->json(['options'=>$data]);
    		
    	}
    }

    public function pdf($tipo)
    {        
        
        $fincas = DB::table('fincas')
            ->join('departamentos', 'fincas.departamento_id', '=', 'departamentos.id')

            ->join('ciudades', function($join)
                {
                    $join->on('fincas.ciudad_id', '=', 'ciudades.id')
                         ->on('fincas.departamento_id', '=', 'ciudades.departamento_id');
                })
            ->select('fincas.id','departamentos.descripcion as departamento', 'ciudades.descripcion as ciudad', 'fincas.direccion','fincas.telefono','fincas.created_at','fincas.updated_at')
            ->get();

        $pdf = PDF::loadView('fincas.pdf.fincas', compact('fincas'));

        if ($tipo == 1) {
            // ver pdf
            return $pdf->stream('fincas.pdf');
        }else if($tipo == 2){
            //agregar contraseña
            //$pdf->setEncryption("jaime");

            $now = new \DateTime();
            $now = $now->format('d-m-Y H:i:s');

            $archivo = 'fincas_'.$now.'.pdf';

            //descargar pdf
            return $pdf->download($archivo);    
        }else{
            return redirect('fincas');
        }
        
    }

}



