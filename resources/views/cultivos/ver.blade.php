@extends('layout/plantilla')
@section('content')
    <div>
        <a href="{{ url('cultivos/'.$cultivos_id)}}" class="btn btn-info pull-right"> << Atras </a>
        <h1>Ver Cultivos</h1>
    </div>
    <hr>
    <form class="form-horizontal">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">id:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="id" placeholder="{{$cultivos->id}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lote_id" class="col-sm-2 control-label">Descripcion:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Descripcion" placeholder="{{$cultivos->descripcion}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fecha_creacion" class="col-sm-2 control-label">Fecha creación:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="fecha_creacion" placeholder="{{$cultivos->created_at}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fecha_modi" class="col-sm-2 control-label">Fecha modificación:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="fecha_modi" placeholder="{{$cultivos->updated_at}}" readonly>
                    </div>
                </div>

            </div>
        </div>
        <hr>
    </form>
@stop