@extends('layout/plantilla')
@section('content')
 <h1>AGRICULTURA</h1>
 <a href="{{url('/fincas/create')}}" class="btn btn-success pull-right">Crear Finca</a>
 <hr>
 <table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Departamento</th>
         <th>Ciudad</th>
         <th>Fecha creación</th>
         <th colspan="4" >Acciones</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($fincas as $finca)
         <tr>
             {{-- <td><img src="{{ asset('img/'.$finca->imagen) }}" height="35" width="30"></td> --}}
             <td>{{ $finca->departamento }}</td>
             <td>{{ $finca->ciudad }}</td>
             <td>{{ $finca->created_at }}</td>
             <td><a href="{{ url('fincas', $finca->id) }}" class="btn btn-primary">Ver</a></td>
             <td><a href="{{ route('fincas.edit', $finca->id) }}" class="btn btn-warning">Editar</a></td>
             <td>
             {!! Form::open(['method' => 'DELETE', 'route'=>['fincas.destroy', $finca->id]]) !!}
             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
             {!! Form::close() !!}
             </td>
             <td><a href="{{ route('lotes_finca', $finca->id) }}" class="btn btn-warning">lotes</a></td>
         </tr>
     @endforeach
     </tbody>
 </table>
@endsection
