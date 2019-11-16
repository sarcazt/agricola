<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Sembrados;
use App\Departamento;
use App\Ciudades;
use Validator;
use DB;

class SembradosController extends Controller
{

    public function index()
    {
        $sembrados=Sembrados::orderBy('id','DESC')->paginate(5);
        return view('Sembrados.index',compact('sembrados')); 
    }

    public function create()
    {
        return view('sembrados.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[ 'id'=>'required', 'lote_id'=>'required', 'cultivo_id'=>'required', 'semilla_id'=>'required', 'cantidad_semilla'=>'required', 'trabajador_id'=>'required', 'foto'=>'required', 'descripcion_labor'=>'required', 'estado_id'=>'required', 'condicion_metereologica_id'=>'required', 'created_at'=>'required', 'updated_at'=>'required']);
        Sembrados::create($request->all());
        return redirect()->route('sembrados.index')->with('success','Registro creado satisfactoriamente');
    
    }

    public function show($id)
    {
        $sembrados=Sembrados::find($id);
        return  view('sembrados.ver',compact('sembrados'));
    }

    public function edit($id)
    {
        $sembrados=Sembrados::find($id);
        return view('sembrados.editar',compact('sembrados'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[ 'id'=>'required', 'lote_id'=>'required', 'cultivo_id'=>'required', 'semilla_id'=>'required', 'cantidad_semilla'=>'required', 'trabajador_id'=>'required', 'foto'=>'required', 'descripcion_labor'=>'required', 'estado_id'=>'required', 'condicion_metereologica_id'=>'required', 'created_at'=>'required', 'updated_at'=>'required']);
 
        Sembrados::find($id)->update($request->all());
        return redirect()->route('sembrados.index')->with('success','Registro actualizado satisfactoriamente');
 
    }

    public function destroy($id)
    {
    	Sembrados::find($id)->delete();
    	return redirect('sembrados');
    }
}
