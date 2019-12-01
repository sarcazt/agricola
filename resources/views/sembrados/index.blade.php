@extends('layout/plantilla')
@section('content')

<div class="col-md-12 separador60px">
 <a href="{{url('/sembrados/create')}}" class="btn btn-success pull-right">Crear sembrado</a>

{{--  <button><a href="{{ route('finca.pdf',1) }} " target="_blank" >ver pdf <i class="fa fa-file-pdf-o icono_pdf"></i></a></button>

 <button><a href="{{ route('finca.pdf',2) }}">Descargar pdf <i class="fa fa-cloud-download"></i></a></button> --}}
</div>
<hr>

  <table class="table table-striped table-bordered table-hover" id="TblSembrados">
     <thead>
      <tr>
       <th>id</th>
       <th>Lote ID</th>
       <th>Cultivo ID</th>
       <th>Semilla ID</th>
       <th>Cantidad semillas</th>
       <th>Trabajador ID</th>
       {{-- <th>Foto</th> --}}
       <th>Descripcion labor</th>
       <th>Estado ID</th>
       <th>Condicion Meteorologica ID</th>
       <th>Creado</th>
       <th>Modificado</th>
       {{-- <th colspan="4" >Acciones</th> --}}
     </tr>
     {{ csrf_field() }}
     </thead>
     {{-- <tbody>
      @foreach($sembrados as $sembrados)  
      <tr> --}}
        {{-- <td>{{$sembrados->id}}</td>
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
        <td>{{$sembrados->updated_at}}</td> --}}
        {{-- <td><a href="{{ url('sembrados', $sembrados->id) }}" class="btn btn-primary">Ver</a></td>
        <td><a class="btn btn-success" href="{{ route('sembrados.edit', $sembrados->id) }}" >Editar</span></a></td>
        <td>{!! Form::open(['method' => 'DELETE', 'route'=>['sembrados.destroy', $sembrados->id]]) !!}
     {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
     {!! Form::close() !!}</td> --}}
       {{-- </tr>
       @endforeach
    </tbody> --}}

  </table>

<script>
  $(document).ready( function () {
    
    $('#TblSembrados').DataTable(
    {
      "processing": true,
      "serverSide": true,
      "ajax": "{{ url('data_sembrados')}}",
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
      },
      "columns":[
      {data: 'id'},
      {data: 'lote_id'},
      {data: 'cultivo'},
      {data: 'semilla_id'},
      {data: 'cantidad_semilla'},
      {data: 'trabajador_id'},
      // {data: 'foto'},
      {data: 'descripcion_labor'},
      {data: 'estado_id'},
      {data: 'condicion_metereologica_id'},
      {data: 'created_at'},
      {data: 'updated_at'}
      // {data: 'action', name: 'action', orderable: false, searchable: false}

      ]
    } 
    );
  });

</script>
 
@endsection