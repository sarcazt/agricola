<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Sembrados;
use App\Departamento;
use App\Ciudades;
use Validator;
use DB;
use Hamcrest\Core\HasToString;

class SembradosController extends Controller
{
    public function index($id)
    {
        session(['id_lote' => $id]);
        // $sembrados= DB::table('Sembrados')->where('lote_id','=',$id)::orderBy('id','DESC')->paginate(5);
        $sembrados = DB::table('sembrados')
        ->where('lote_id','=',$id)
        ->get();
        return view('sembrados.index',compact('sembrados')); 
    }

    public function create()
    {

        $lote_id = session('id_lote');
        $now = new \DateTime();
        $count = 0;
        $inicio = $now->format('Y-m-d') . " 00:00:00";
        $fin = $now->format('Y-m-d') . " 23:59:59";
        // $sembrados1 = DB::table('sembrados')
        // ->whereBetween('created_at', ['$now 00:00:00', '$now 23:59:59'])
        // ->where('lote_id','=',$lote_id);
        echo $inicio;
        echo $fin;
        echo $lote_id;

          $sembrados1 = DB::select("select * from sembrados where created_at between '" . $inicio . "' and '" . $fin . "' and lote_id = " . $lote_id);
        // $sembrados1 = DB::select("select * from sembrados where created_at between '2019-11-18 00:00:00' and '2019-11-18 23:59:59' and lote_id = 2");
        foreach($sembrados1 as $t){
            // $idsembrado = $t->id;
            // echo $idsembrado;
            $count = $count + 1;
        } 
        echo $count;
        if ($count >= 1){
            return redirect()->route('sembrados_lote', $lote_id);
        } else {
            return view('sembrados.create',compact('lote_id'));
        }
    }

    public function store(Request $request)
    {
        $this->validate($request,[ 'id'=>'required', 'lote_id'=>'required', 'cultivo_id'=>'required', 'semilla_id'=>'required', 'cantidad_semilla'=>'required', 'trabajador_id'=>'required', 'foto'=>'required', 'descripcion_labor'=>'required', 'estado_id'=>'required', 'condicion_metereologica_id'=>'required', 'created_at'=>'required', 'updated_at'=>'required']);
        Sembrados::create($request->all());
        
        $lote_id = session('id_lote');
        return redirect()->route('sembrados_lote', $lote_id)->with('success','Registro creado satisfactoriamente');
    
    }

    public function show($id)
    {
        $lote_id = session('id_lote');
        $sembrados=Sembrados::find($id);
        return  view('sembrados.ver',compact('sembrados','lote_id'));
    }

    public function edit($id)
    {
        $lote_id = session('id_lote');
        $sembrados=Sembrados::find($id);
        return view('sembrados.editar',compact('sembrados','lote_id'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[ 'id'=>'required', 'lote_id'=>'required', 'cultivo_id'=>'required', 'semilla_id'=>'required', 'cantidad_semilla'=>'required', 'trabajador_id'=>'required', 'foto'=>'required', 'descripcion_labor'=>'required', 'estado_id'=>'required', 'condicion_metereologica_id'=>'required', 'created_at'=>'required', 'updated_at'=>'required']);
 
        Sembrados::find($id)->update($request->all());
        $lote_id = session('id_lote');
        return redirect()->route('sembrados_lote', $lote_id)->with('success','Registro actualizado satisfactoriamente');
 
    }

    public function destroy($id)
    {
    	Sembrados::find($id)->delete();
    	return redirect('sembrados');
    }
}
