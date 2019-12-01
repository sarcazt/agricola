<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Lote;
use Validator;
use DB;
use DataTables;

class LoteController extends Controller
{
    

	public function index($id)
	{
        session(['id_finca' => $id]);
		return view('lotes.index');
	}

    public function registros_lote(){
        $finca_id = session('id_finca');

        $query = DB::select("select id,nombre,case when estado = null then 'Vacio' else 'Ocupado' end as estado,
                    created_at from lotes where finca_id = ".$finca_id);

        return DataTables::of($query)
        
        ->addColumn('action', function ($data){
            return '
                <div style="display:flex;align-items:center;justify-content:center" >
                <a title="ver lote" style="margin-right: 5%;text" href="'.url('lotes', $data->id).'" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></a>

                <a title="editar lote" style="margin-right: 5%;text" href="'.route('lotes.edit',    $data->id).'" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i></a>

                <a title="eliminar lote" style="margin-right: 5%;text" data-id="'.$data->id.'" class="btn btn-danger delete_button"><i class="glyphicon glyphicon-trash"></i></a>

                <a title="ver sembrados" style="margin-right: 5%;text" href="'.route('sembrados_lote', $data->id).'" class="btn btn-info">sembrados <i class="glyphicon glyphicon-th"></i></a>

                </div>
                ';
        })
        ->make(true);
    }

	public function show($id)
	{
        $lote = DB::table('lotes')
            ->join('fincas', 'lotes.finca_id', '=', 'fincas.id')
            ->select('lotes.finca_id','fincas.nombre as nom_finca','lotes.nombre as nom_lote','lotes.tamano','lotes.area')
            ->where('lotes.id','=',$id)
            ->get();  

		//como en la vista no hay foreach y la consulta devuelve 1 solo registro se captura la 1ra posicion
        $lote = $lote[0]; 

		return view('lotes.ver', compact('lote'));
	}

	public function create()
	{	
        // return view('fincas.crear',compact('departamentos'));
        
        $finca_id = session('id_finca');
		return view('lotes.crear',compact('finca_id'));
	}

	public function store(Request $request)
	{
		$lote = $request->all();

		$validator = Validator::make($lote, [
			'finca_id'    => 'required',
			'tamano'  => 'required|max:50',
			'nombre'    => 'required|max:20',
			'area'     => 'required',
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
			$current_id = DB::table('lotes')->max('id');
			$lote['id'] = $current_id + 1;

			Lote::create($lote);
            $finca_id = session('id_finca');
			return redirect('lotes_finca/'.$finca_id);    
		}
	}

	public function edit($id)
    {	
        $lote = Lote::find($id);
        return view('lotes.editar', compact('lote'));        
        
    }

	public function update(Request $request, $id)
    {
        $nuevosDatosLote = $request->all();
        $lote = Lote::find($id);

        $validator = Validator::make($nuevosDatosLote, [
            'tamano'  => 'required|max:50',
            'nombre'    => 'required|max:20',
            'area'     => 'required',
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

            $lote->update($nuevosDatosLote);
            $finca_id = session('id_finca');
            return redirect('lotes_finca/'.$finca_id);
        }
    }

    public function destroy($id)
    {
        $lote = Lote::find($id);
       
        if (is_null($lote["sembrar_id"]) || empty($lote["sembrar_id"])) {

            Lote::find($id)->delete();
            // $finca_id = session('id_finca');
            // return redirect('lotes_finca/'.$finca_id);
        }else{
            $mensaje = "Ya se ha iniciado proceso de siembra, no se puede eliminar lote";
            // return back()->withErrors($mensaje);
            return response()->json([
                'success' => false,
                'error' => 'Lote no eliminado',
                'message' => $mensaje
            ],404);
        }

    	
    }

}



