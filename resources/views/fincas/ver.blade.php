@extends('layout/plantilla')
@section('content')
    <div>
        <a href="{{ url('fincas')}}" class="btn btn-info pull-right"> << Atrás </a>
        <h1>Ver Finca</h1>
    </div>
    <hr>
    <form class="form-horizontal">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="departamento" class="col-sm-2 control-label">Departamento:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="departamento" placeholder="{{$finca->departamento}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ciudad" class="col-sm-2 control-label">Ciudad:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="ciudad" placeholder="{{$finca->ciudad}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="direccion" class="col-sm-2 control-label">Direccion:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="direccion" placeholder="{{$finca->direccion}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="telefono" class="col-sm-2 control-label">Teléfono:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="telefono" placeholder="{{$finca->telefono}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fecha_creacion" class="col-sm-2 control-label">Fecha creación:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="fecha_creacion" placeholder="{{$finca->created_at}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fecha_modi" class="col-sm-2 control-label">Fecha modificación:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="fecha_modi" placeholder="{{$finca->updated_at}}" readonly>
                    </div>
                </div>

            </div>
        </div>
        <hr>
    </form>
@stop