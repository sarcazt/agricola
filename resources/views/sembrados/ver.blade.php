@extends('layout/plantilla')
@section('content')
    <div>
        <a href="{{ url('sembrados_lote/'.$lote_id.'')}}" class="btn btn-info pull-right"> << Atras </a>
        <h1>Ver Sembrado</h1>
    </div>
    <hr>
    <form class="form-horizontal">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">id:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="id" placeholder="{{$sembrados->id}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lote_id" class="col-sm-2 control-label">lote_id:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="lote_id" placeholder="{{$sembrados->lote_id}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cultivo_id" class="col-sm-2 control-label">cultivo_id:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="cultivo_id" placeholder="{{$sembrados->cultivo_id}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="semilla_id" class="col-sm-2 control-label">semilla_id:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="semilla_id" placeholder="{{$sembrados->semilla_id}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cantidad_semilla" class="col-sm-2 control-label">cantidad_semilla:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="cantidad_semilla" placeholder="{{$sembrados->cantidad_semilla}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="trabajador_id" class="col-sm-2 control-label">trabajador_id:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="trabajador_id" placeholder="{{$sembrados->trabajador_id}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="foto" class="col-sm-2 control-label">foto:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="foto" placeholder="{{$sembrados->foto}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="descripcion_labor" class="col-sm-2 control-label">descripcion_labor:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="descripcion_labor" placeholder="{{$sembrados->descripcion_labor}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="estado_id" class="col-sm-2 control-label">estado_id:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="estado_id" placeholder="{{$sembrados->estado_id}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="condicion_metereologica_id" class="col-sm-2 control-label">condicion_metereologica_id:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="condicion_metereologica_id" placeholder="{{$sembrados->condicion_metereologica_id}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fecha_creacion" class="col-sm-2 control-label">Fecha creación:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="fecha_creacion" placeholder="{{$sembrados->created_at}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fecha_modi" class="col-sm-2 control-label">Fecha modificación:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="fecha_modi" placeholder="{{$sembrados->updated_at}}" readonly>
                    </div>
                </div>

            </div>
        </div>
        <hr>
    </form>
@stop