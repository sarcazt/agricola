<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8">


<div style="height: 70px;text-align: right;" class="col-md-10">
	<div class="col-md-3"><img  style="height: 50px;" src={{URL::asset('/img/logo.png')}}></div>
	
</div>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap
/3.3.4/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
