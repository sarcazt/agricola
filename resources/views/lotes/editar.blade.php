@extends('layout.plantilla')
@section('content')

    <div>
        <a href="{{ url('lotes_finca/'.$lote->finca_id.'')}}" class="btn btn-info pull-right"> << Atras </a>
        <h1>Editar Lote</h1>
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
        {!! Form::model($lote, ['method' => 'PATCH', 'route' => ['lotes.update', $lote->id], 'files' => true ]) !!}
        <div class="col-md-6">

            <div class="form-group">
                {!! Form::label('tamano', 'tamano:') !!}
                {!! Form::text('tamano',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('nombre', 'nombre:') !!}
                {!! Form::text('nombre',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('area', 'area:') !!}
                {!! Form::text('area',null,['class'=>'form-control']) !!}
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
@stop
