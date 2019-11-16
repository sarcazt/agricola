@extends('layout/plantilla')
@section('content')
    <div>
        <a href="{{ url('lotes_finca/'.$lote->finca_id.'')}}" class="btn btn-info pull-right"> << Atrás </a>
        <h1>Ver Lote</h1>
    </div>
    <hr>
    <form class="form-horizontal">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">id:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="id" placeholder="{{$lote->id}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="finca_id" class="col-sm-2 control-label">finca_id:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="finca_id" placeholder="{{$lote->finca_id}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tamano" class="col-sm-2 control-label">tamaño:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tamano" placeholder="{{$lote->tamano}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">nombre:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" placeholder="{{$lote->nombre}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="area" class="col-sm-2 control-label">area:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="area" placeholder="{{$lote->area}}" readonly>
                    </div>
                </div>

            </div>
        </div>
        <hr>
    </form>
@stop