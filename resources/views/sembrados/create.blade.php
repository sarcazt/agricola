@extends('layout.plantilla')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />
<div>
  <a href="{{ url('sembrados_lote/'.$lote_id.'')}}" class="btn btn-info pull-right">
    << Atras </a> <h1>Crear sembrados</h1>
</div>
<div class="row">
  <section class="content">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <strong>Error!</strong> Revise los campos obligatorios.<br><br>
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-info">
      {{Session::get('success')}}
    </div>
    @endif

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Nuevo sembrado</h3>
      </div>
      <div class="panel-body">
        <div class="table-container">
          <form method="POST" action="{{ route('sembrados.store') }}" role="form">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="id" id="id" class="form-control input-sm" placeholder="Id de sembrado">
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="lote_id" id="lote_id" class="form-control input-sm" placeholder="Id del lote">
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="cultivo_id" id="cultivo_id" class="form-control input-sm" placeholder="Id de cultivo">
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="semilla_id" id="semilla_id" class="form-control input-sm" placeholder="Id de la semilla">
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="cantidad_semilla" id="cantidad_semilla" class="form-control input-sm" placeholder="cantidad_semilla">
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="trabajador_id" id="trabajador_id" class="form-control input-sm" placeholder="trabajador_id">
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="foto" id="foto" class="form-control input-sm" placeholder="Foto">
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="descripcion_labor" id="descripcion_labor" class="form-control input-sm" placeholder="Descripcion de la labor">
                </div>
              </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="text" name="estado_id" id="estado_id" class="form-control input-sm" placeholder="Id del estado">
              </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="text" name="condicion_metereologica_id" id="condicion_metereologica_id" class="form-control input-sm" placeholder="Condicion meteorologica">
              </div>
            </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="text" name="created_at" id="created_at" class="form-control input-sm" placeholder="Fecha creacion">
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="text" name="updated_at" id="updated_at" class="form-control input-sm" placeholder="Fecha Actualizacion">
          </div>
        </div>
      </div>
      <div class="row">

      <div class="form-group">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary form-control btn-success']) !!}
        </div>

      </div>
      </form>
    </div>
</div>

</div>
</div>
</section>
@endsection