@extends('layout/plantilla')
@section('content')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <h1>AGRICULTURA</h1>
 <a href="{{url('/fincas/create')}}" class="btn btn-success pull-left">Crear Finca</a>
 <br>
 <br>
 <br>
<button><a href="{{ route('finca.pdf',1) }} " target="_blank">ver pdf <i class="fa fa-file-pdf-o" style="font-size: 20px;color: red"></i></a></button>

 <button><a href="{{ route('finca.pdf',2) }}">Descargar pdf <i class="fa fa-cloud-download"></i></a></button>


 <hr>
 <table class="table table-striped table-bordered table-hover" id="TblFincas">
     <thead>
     <tr class="bg-info">
         <th>Departamento</th>
         <th>Ciudad</th>
         <th>Fecha creación</th>
         <th>Acciones</th>
     </tr>
     </thead>
     {{-- <tbody> --}}
     {{-- @foreach ($fincas as $finca) --}}
        {{-- <tr> --}}
             {{-- <td><img src="{{ asset('img/'.$finca->imagen) }}" height="35" width="30"></td> --}}
             {{-- <td>{{ $finca->departamento }}</td>
             <td>{{ $finca->ciudad }}</td>
             <td>{{ $finca->created_at }}</td>

             <td><a href="{{ url('fincas', $finca->id) }}" class="btn btn-primary">Ver</a></td>
             <td><a href="{{ route('fincas.edit', $finca->id) }}" class="btn btn-warning">Editar</a></td>
             <td>
             {!! Form::open(['method' => 'DELETE', 'route'=>['fincas.destroy', $finca->id]]) !!}
             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
             {!! Form::close() !!}
             </td>
             <td><a href="{{ route('lotes_finca', $finca->id) }}" class="btn btn-warning">lotes</a></td> --}}
             
        {{-- </tr> --}}
     {{-- @endforeach --}}
     {{-- </tbody> --}}
     
 </table>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
 <script >
     $(document).ready( function () {
        $('#TblFincas').DataTable(
            {
                "processing": true,
                "serverSide": true,
                "ajax": "data_fincas",
                "language": {
                  "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                },
                "columns":[
                    {data: 'departamento'},
                    {data: 'ciudad'},
                    {data: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                    
                ]
            } 
        );

        //implementar modal para confirmacion :D
      /**/
      $('#TblFincas').on('click', '.delete_button', function() {
        var id = $(this).data('id');
        var fila = $(this).parents();
            
            $.ajax({
                type: 'DELETE',
                url: 'fincas/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {

                  $(fila[1]).remove();
                }
            });
        });
      /**/

    });
 </script>
@endsection
