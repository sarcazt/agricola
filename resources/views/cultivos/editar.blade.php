@extends('layout/plantilla')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />

<div>
  <a href="{{ url('cultivos/')}}" class="btn btn-info pull-right">
    << Atras </a> <h1>Editar Cultivos</h1>
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
          <h3 class="panel-title">Editar Cultivos</h3>
        </div>
        <div class="panel-body">
          <div class="table-container">
            <form method="POST" action="{{route('cultivos.update',$cultivos->id)}}" role="form">
              {{ csrf_field() }}
              <input name="_method" type="hidden" value="PATCH">



              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">id:</label>
                    <div class="col-sm-10">
                      <input type="text" name="id" id="id" class="form-control" value="{{$cultivos->id}}" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">descripcion:</label>
                    <div class="col-sm-10">
                      <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{$cultivos->descripcion}}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">created_at:</label>
                    <div class="col-sm-10">
                      <input type="text" name="created_at" id="created_at" class="form-control" value="{{$cultivos->created_at}}">
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">updated_at:</label>
                    <div class="col-sm-10">
                      <input type="text" name="updated_at" id="updated_at" class="form-control" value="{{$cultivos->updated_at}}">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12">
                  <input type="submit" value="Actualizar" class="btn btn-success btn-block">
                </div>

              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>
  @endsection