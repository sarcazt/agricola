<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cultivos;
use App\Departamento;
use App\Ciudades;
use Validator;
use DB;
use Hamcrest\Core\HasToString;

class CultivosController extends Controller
{
    public function index()
    {
        $cultivos= Cultivos::all();
        return view('cultivos.index', compact('cultivos')); 
    }

    public function create()
    {
        $cultivos=Cultivos::all();
        return  view('cultivos.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,['id'=>'required', 'descripcion'=>'required', 'created_at'=>'required', 'updated_at'=>'required']);
        Cultivos::create($request->all());
        
        return redirect('cultivos')->with('success','Registro creado satisfactoriamente');
    
    }

    public function show($id)
    {
        $cultivos_id = session('id');
        $cultivos=Cultivos::find($id);
        return  view('cultivos.ver',compact('cultivos','cultivos_id'));
    }

    public function edit($id)
    {
        $cultivos_id = session('cultivos_id');
        $cultivos=Cultivos::find($id);
        return view('cultivos.editar',compact('cultivos','cultivos_id'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,['id'=>'required', 'descripcion'=>'required', 'created_at'=>'required', 'updated_at'=>'required']);
 
        Cultivos::find($id)->update($request->all());
        return redirect('cultivos')->with('success','Registro actualizado satisfactoriamente');
 
    }

    public function destroy($id)
    {
    	// Sembrados::find($id)->delete();
    	// return redirect('sembrados');
    }
}
