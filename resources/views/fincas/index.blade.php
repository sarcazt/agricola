@extends('layout/plantilla')
@section('content')

<div class="col-md-12 separador60px">
 <a href="{{url('/fincas/create')}}" class="btn btn-danger pull-right">Crear Finca</a>

 <button><a href="{{ route('finca.pdf',1) }} " target="_blank" >ver pdf <i class="fa fa-file-pdf-o icono_pdf"></i></a></button>

 <button><a href="{{ route('finca.pdf',2) }}">Descargar pdf <i class="fa fa-cloud-download"></i></a></button>
</div>

<hr>
<table class="table table-striped table-bordered table-hover" id="TblFincas">
 <thead >
   <tr class="bg-info">
     <th>Nit</th>
     <th>Nombre</th>
     <th>Fecha creación</th>
     <th>Acciones</th>
   </tr>
   {{ csrf_field() }}
 </thead>


</table>

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
      {data: 'nit'},
      {data: 'nombre'},
      {data: 'created_at'},
      {data: 'action', name: 'action', orderable: false, searchable: false}

      ]
    } 
    );

//implementar modal para confirmacion :D
/**/
$('#TblFincas').on('click', '.delete_button', function() {
  var id = $(this).data('id');

  $.ajax({
    type: 'DELETE',
    url: 'fincas/' + id,
    data: {
      '_token': $('input[name=_token]').val(),
    },
    success: function(data) {
       $('#TblFincas').DataTable().ajax.reload();
    },error: function(data){
      console.log(data);
    }
  });
});
/**/

});
</script>
@endsection
