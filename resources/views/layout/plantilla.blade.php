<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8">

<link rel="stylesheet" type="text/css" href={{URL::asset('/css/layout.css')}}>
<link rel="stylesheet" type="text/css" href={{URL::asset('/css/general.css')}}>

<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="separador20px"></div>
<div class="col-md-12 encabezado">
	<div class="col-md-3" >
		<img class="tamano" src={{URL::asset('/img/chat.png')}}>
	</div>
	<div class="col-md-6 nombre_aplicacion" >
		<h1>SERVICEFINC</h1>
	</div>
	<div class="col-md-3">
		<img class="tamano user" src={{URL::asset('/img/user.png')}}>
	</div>
</div>
<div class="col-md-12 ">
	<ul class="menu">

		<li><a href="#home"><img class="img_home" src={{URL::asset('/img/home.png')}}></a></li>
		<li><a href="#home">Espacio Trabajo</a></li>
		<li><a href="#home">Informes</a></li>
		<li><a href="#home">Gestión</a></li>
		<li><a href="#home">Ayuda</a></li>
	</ul>
</div>
<div class="col-md-12 separador20px"></div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap
/3.3.4/css/bootstrap.min.css">
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<body >
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
