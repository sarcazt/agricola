@extends('layout/plantilla')
@section('content')
<div class="row">
  <section class="content">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Sembrados</h3></div>
          <div class="pull-right">
          <a href="{{url('/sembrados/create')}}" class="btn btn-success pull-right">Crear sembrado</a>
          </div>
          <div id="mytable" class="table-container">
          <table class="table table-striped table-bordered table-hover">
             <thead>
               <th>id</th>
               <th>Lote ID</th>
               <th>Cultivo ID</th>
               <th>Semilla ID</th>
               <th>Cantidad semillas</th>
               <th>Trabajador ID</th>
               <th>Foto</th>
               <th>Descripcion labor</th>
               <th>Estado ID</th>
               <th>Condicion Meteorologica ID</th>
               <th>Creado</th>
               <th>Modificado</th>
               <th colspan="4" >Acciones</th>
             </thead>
             <tbody>
              @foreach($sembrados as $sembrados)  
              <tr>
                <td>{{$sembrados->id}}</td>
                <td>{{$sembrados->lote_id}}</td>
                <td>{{$sembrados->cultivo}}</td>
                <td>{{$sembrados->semilla_id}}</td>
                <td>{{$sembrados->cantidad_semilla}}</td>
                <td>{{$sembrados->trabajador_id}}</td>
                <td>{{$sembrados->foto}}</td>
                <td>{{$sembrados->descripcion_labor}}</td>
                <td>{{$sembrados->estado_id}}</td>
                <td>{{$sembrados->condicion_metereologica_id}}</td>
                <td>{{$sembrados->created_at}}</td>
                <td>{{$sembrados->updated_at}}</td>
                <td><a href="{{ url('sembrados', $sembrados->id) }}" class="btn btn-primary">Ver</a></td>
                <td><a class="btn btn-success" href="{{ route('sembrados.edit', $sembrados->id) }}" >Editar</span></a></td>
                <td>{!! Form::open(['method' => 'DELETE', 'route'=>['sembrados.destroy', $sembrados->id]]) !!}
             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
             {!! Form::close() !!}</td>
               </tr>
               @endforeach
            </tbody>
 
          </table>
        </div>
      </div>
  </div>
</section>
 
@endsection