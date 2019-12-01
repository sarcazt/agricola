@extends('layout/plantilla')
@section('content')
 
<div class="col-md-12 separador60px">
   <a href="{{ url('fincas')}}" class="btn btn-info pull-right"> << Atras </a>
   <a href="{{ url('/lotes/create')}}" class="btn btn-danger pull-left">Crear lote</a>
</div>

 <hr>
 <table class="table table-striped table-bordered table-hover" id="TblLotes">
 <thead >
   <tr class="bg-info">
     <th>Nombre</th>
     <th>Estado</th>
     <th>Fecha creación</th>
     <th>Acciones</th>
   </tr>
   {{ csrf_field() }}
 </thead>


</table>

<script >
  $(document).ready( function () {
    $('#TblLotes').DataTable(
    {
      "processing": true,
      "serverSide": true,
      "ajax": "{{ url('data_lotes')}}",
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
      },
      "columns":[
        {data: 'nombre'},
        {data: 'estado'},
        {data: 'created_at'},
        {data: 'action', name: 'action', orderable: false, searchable: false}
      ]
    } 
    );

  //implementar modal para confirmacion :D
  /**/
  $('#TblLotes').on('click', '.delete_button', function() {
    var id = $(this).data('id');
    
    $.ajax({
      type: 'DELETE',
      url: '{{ url('lotes')}}'+'/'+ id,
      data: {
        '_token': $('input[name=_token]').val(),
      },
      success: function(data) {
         $('#TblLotes').DataTable().ajax.reload();
      },error: function(data){
        console.log(data['responseJSON']['message']);
        alert(data['responseJSON']['message']);
      }
    });
  });
  /**/

  });
  </script>
@endsection
