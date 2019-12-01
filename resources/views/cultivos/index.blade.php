@extends('layout/plantilla')
@section('content')
<div class="row">
  <section class="content">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista de cultivos</h3></div>
          <div class="pull-right">
          <a href="{{url('/cultivos/create')}}" class="btn btn-success pull-right">Crear cultivos</a>
          </div>
          <div id="mytable" class="table-container">
          <table class="table table-striped table-bordered table-hover">
             <thead>
               <th>id</th>
               <th>Descripcion</th>
               <th>Creado</th>
               <th>Modificado</th>
               <th colspan="4" >Acciones</th>
             </thead>
             <tbody>
              @if($cultivos->count())  
              @foreach($cultivos as $cultivo)  
              <tr>
                <td>{{$cultivo->id}}</td>
                <td>{{$cultivo->descripcion}}</td>
                <td>{{$cultivo->created_at}}</td>
                <td>{{$cultivo->updated_at}}</td>
                <td><a href="{{ url('cultivos', $cultivo->id) }}" class="btn btn-primary">Ver</a></td>
                <td><a class="btn btn-success" href="{{ route('cultivos.edit', $cultivo->id) }}" >Editar</span></a></td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>
 
          </table>
        </div>
      </div>
  </div>
</section>
 
@endsection