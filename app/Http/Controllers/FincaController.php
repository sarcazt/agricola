<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Finca;
use App\Departamento;
use App\Ciudades;
use Validator;
use DB;


class FincaController extends Controller
{
	public function index()
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

		return view('fincas.index', compact('fincas'));
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

}



