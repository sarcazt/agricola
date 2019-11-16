@extends('layout.plantilla')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />
    <div>
        <a href="{{ url('fincas')}}" class="btn btn-info pull-right"> << Atras </a>
        <h1>Crear finca</h1>
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
        {!! Form::open(['url' => 'fincas', 'files' => true]) !!}
        <div class="col-md-6">
            
            <div class="form-group">
            {!! Form::label('departamento_id', 'Departamento:') !!}
            {!! Form::select('departamento_id', $departamentos, null, ['class' => 'form-control']) !!}
            </div>  
            
            <div class="form-group">
              <label>Ciudad:</label>
              {!! Form::select('ciudad_id',[''=>'seleccionar ciudad'],null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('direccion', 'Dirección:') !!}
                {!! Form::text('direccion',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('telefono', 'Telefono:') !!}
                {!! Form::text('telefono',null,['class' => 'form-control', 'required' => 'required']) !!}
            </div>
            {{-- <div class="form-group">
                {!! Form::label('Imagen', 'Imagen:') !!}
                {!! Form::file('imagen',null,['class'=>'form-control']) !!}
            </div> --}}
        {{-- </div> --}}
        {{-- <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('Sinopsis', 'Sinopsis:') !!}
                {!! Form::textarea('sinopsis',null,['class' => 'form-control', 'required' => 'required', 'rows' => '16', 'style' => 'resize: none; text-align:justify;']) !!}
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