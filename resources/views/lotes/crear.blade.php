@extends('layout.plantilla')
@section('content')

    <div>
        <a href="{{ url('lotes_finca/'.$finca_id.'')}}" class="btn btn-info pull-right"> << Atras </a>
        <h1>Crear lotes</h1>
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
        {!! Form::open(['url' => 'lotes', 'files' => true]) !!}
        <div class="col-md-6">
            
            <div class="form-group">
                {!! Form::label('finca_id', 'finca_id:') !!}
                {!! Form::text('finca_id',$finca_id,['class'=>'form-control','readonly' => 'true']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('tamano', 'Tamaño:') !!}
                {!! Form::text('tamano',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('nombre', 'Nombre:') !!}
                {!! Form::text('nombre',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('area', 'Area:') !!}
                {!! Form::text('area',null,['class' => 'form-control', 'required' => 'required']) !!}
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
    
@stop