@extends('layout.plantillapdf')
@section('content')
<style type="text/css">

    table {
      border-collapse: collapse;
    }

    table,th,td{
        border: solid 1px;
        width: 100%;
        text-align: center;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    
    th {
      background-color: #3383FF;
      color: white;
    }


</style>
    <h2><b>Fincas Actuales</b></h2>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Nit</th>
                <th>Nombre</th>
                <th>Departamento</th>
                <th>Ciudad</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Fecha creación</th>
            </tr>                            
        </thead>
        <tbody>
            @foreach($fincas as $finca)
            <tr>
                <td>{{ $finca->nit }}</td>
                <td>{{ $finca->nombre }}</td>
                <td>{{ $finca->departamento }}</td>
                <td>{{ $finca->ciudad }}</td>
                <td>{{ $finca->direccion }}</td>
                <td>{{ $finca->telefono }}</td>
                <td class="text-right">{{ $finca->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection