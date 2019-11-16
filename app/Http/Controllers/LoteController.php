<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Lote;
use Validator;
use DB;


class LoteController extends Controller
{
    

	public function index($id)
	{
        session(['id_finca' => $id]);

        $lotes = DB::table('lotes')
                 ->where('finca_id','=',$id)
                 ->get();

		return view('lotes.index', compact('lotes'));
	}

	public function show($id)
	{
		$lote = Lote::find($id);
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
            $finca_id = session('id_finca');
            return redirect('lotes_finca/'.$finca_id);
        }else{
            $mensaje = "ya se ha iniciado proceso de siembra no se puede eliminar lote";
            return back()->withErrors($mensaje);
        }

    	
    }

}



