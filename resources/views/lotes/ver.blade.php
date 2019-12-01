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
                    <label for="nom_finca" class="col-sm-2 control-label">Nombre Finca:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nom_finca" placeholder="{{$lote->nom_finca}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nom_lote" class="col-sm-2 control-label">Nombre Lote:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nom_lote" placeholder="{{$lote->nom_lote}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tamano" class="col-sm-2 control-label">Tamaño:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tamano" placeholder="{{$lote->tamano}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="area" class="col-sm-2 control-label">Area:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="area" placeholder="{{$lote->area}}" readonly>
                    </div>
                </div>

            </div>
        </div>
        <hr>
    </form>
@stop