@extends('layout/plantilla')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />

<div>
  <a href="{{ url('sembrados')}}" class="btn btn-info pull-right">
    << Atras </a> <h1>Editar Sembrados</h1>
</div>



<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
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
          <h3 class="panel-title">Editar Sembrado</h3>
        </div>
        <div class="panel-body">
          <div class="table-container">
            <form method="POST" action="{{route('sembrados.update',$sembrados->id)}}" role="form">
              {{ csrf_field() }}
              <input name="_method" type="hidden" value="PATCH">



              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">id:</label>
                    <div class="col-sm-10">
                      <input type="text" name="id" id="id" class="form-control" value="{{$sembrados->id}}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">lote_id:</label>
                    <div class="col-sm-10">
                      <input type="text" name="lote_id" id="lote_id" class="form-control" value="{{$sembrados->lote_id}}">
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">cultivo_id:</label>
                    <div class="col-sm-10">
                      <input type="text" name="cultivo_id" id="cultivo_id" class="form-control" value="{{$sembrados->cultivo_id}}">
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">semilla_id:</label>
                    <div class="col-sm-10">
                      <input type="text" name="semilla_id" id="semilla_id" class="form-control" value="{{$sembrados->semilla_id}}">
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">cantidad_semilla:</label>
                    <div class="col-sm-10">
                      <input type="text" name="cantidad_semilla" id="cantidad_semilla" class="form-control" value="{{$sembrados->cantidad_semilla}}">
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">trabajador_id:</label>
                    <div class="col-sm-10">
                      <input type="text" name="trabajador_id" id="trabajador_id" class="form-control" value="{{$sembrados->trabajador_id}}">
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">foto:</label>
                    <div class="col-sm-10">
                      <input type="text" name="foto" id="foto" class="form-control" value="{{$sembrados->foto}}">
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">descripcion_labor:</label>
                    <div class="col-sm-10">
                      <input type="text" name="descripcion_labor" id="descripcion_labor" class="form-control" value="{{$sembrados->descripcion_labor}}">
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">estado_id:</label>
                    <div class="col-sm-10">
                      <input type="text" name="estado_id" id="estado_id" class="form-control" value="{{$sembrados->estado_id}}">
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">condicion_metereologica_id:</label>
                    <div class="col-sm-10">
                      <input type="text" name="condicion_metereologica_id" id="condicion_metereologica_id" class="form-control" value="{{$sembrados->condicion_metereologica_id}}">
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">created_at:</label>
                    <div class="col-sm-10">
                      <input type="text" name="created_at" id="created_at" class="form-control" value="{{$sembrados->created_at}}">
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">updated_at:</label>
                    <div class="col-sm-10">
                      <input type="text" name="updated_at" id="updated_at" class="form-control" value="{{$sembrados->updated_at}}">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12">
                  <input type="submit" value="Actualizar" class="btn btn-success btn-block">
                  <a href="{{ route('sembrados.index') }}" class="btn btn-info btn-block">Atrás</a>
                </div>

              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>
  @endsection