@extends('layout/plantilla')
@section('content')
 <h1>AGRICULTURA</h1>
 <a href="{{url('/lotes/create')}}" class="btn btn-success pull-right">Crear lote</a>
 <hr>
 <br>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 <table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>id</th>
         <th>finca_id</th>
         <th>tamaño</th>
         <th>nombre</th>
         <th colspan="3" >Acciones</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($lotes as $lote)
         <tr>
             {{-- <td><img src="{{ asset('img/'.$finca->imagen) }}" height="35" width="30"></td> --}}
             <td>{{ $lote->id }}</td>
             <td>{{ $lote->finca_id }}</td>
             <td>{{ $lote->tamano }}</td>
             <td>{{ $lote->nombre }}</td>
             <td><a href="{{ url('lotes', $lote->id) }}" class="btn btn-primary">Ver</a></td>
             <td><a href="{{ route('lotes.edit', $lote->id) }}" class="btn btn-warning">Editar</a></td>
             <td>
             {!! Form::open(['method' => 'DELETE', 'route'=>['lotes.destroy', $lote->id]]) !!}
             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
             {!! Form::close() !!}
             </td>
         </tr>
     @endforeach
     </tbody>
 </table>
@endsection
