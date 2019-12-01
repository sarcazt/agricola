@extends('layout.plantilla')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />
    <div>
        <a href="{{ url('fincas')}}" class="btn btn-info pull-right"> << Atras </a>
        <h1>Editar Finca</h1>
    </div>
    <hr>
    <div class="row">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {!! Form::model($finca, ['method' => 'PATCH', 'route' => ['fincas.update', $finca->id], 'files' => true ]) !!}
        <div class="col-md-6">

            <div class="form-group">
                {!! Form::label('nit', 'Nit:') !!}
                {!! Form::text('nit',null,['class'=>'form-control','readonly' => 'true']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('nombre', 'Nombre:') !!}
                {!! Form::text('nombre',null,['class'=>'form-control']) !!}
            </div>

            {{-- cargo todos los departamentos pero selecciono el que esta en el registro --}}
            <div class="form-group">
            {!! Form::label('departamento_id', 'Departamento:') !!}
            {!! Form::select('departamento_id', $departamentos, $finca->dep_id, ['class' => 'form-control sel-status']) !!}
            </div> 

            {{-- si la persona se equivo de municipio le cargo las ciudades del departamento que habia escogido, si cambia departamento se hace ajax para cargar ciudades correspondientes --}}
            <div class="form-group">
              <label>Ciudad:</label>
              {!! Form::select('ciudad_id',$ciudades,null,['class'=>'form-control sel-status']) !!}
            </div>



            <div class="form-group">
                {!! Form::label('direccion', 'Direccion:') !!}
                {!! Form::text('direccion',null,['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('telefono', 'Telefono:') !!}
                {!! Form::text('telefono',null,['class' => 'form-control', 'required' => 'required']) !!}
            </div>


            {{-- <div class="row">
                <div class="col-md-2">
                    <img src="{{asset('img/'.$pelicula->imagen)}}" class="img-rounded img-responsive">
                    {!! Form::hidden('imagenOriginal', $pelicula->imagen) !!}
                </div>
                <div class="col-md-10">
                    <div class="form-group">
                        {!! Form::label('Imagen', 'Imagen:') !!}
                        {!! Form::file('imagen',null,['class'=>'form-control']) !!}
                    </div>
                </div>
            </div> --}}
        
        <div class="form-group">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}
    </div>

    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {

          $(".sel-status").select2();

          $("select[name='departamento_id']").change(function(){
              var departamento_id = $(this).val();
              var token = $("input[name='_token']").val();
              $.ajax({
                  url: "<?php echo route('ciudadesAjax') ?>",
                  method: 'POST',
                  data: {departamento_id:departamento_id, _token:token},
                  success: function(data) {
                    $("select[name='ciudad_id'").html('');
                    $("select[name='ciudad_id'").html(data.options);
                }
            });
          });

      });

  </script>

@stop
