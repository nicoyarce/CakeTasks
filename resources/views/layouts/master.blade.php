<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Holistic</title>
		<!-- Bootstrap core CSS -->
		<link href="/css/bootstrap.css" rel="stylesheet" >
		<!-- Custom styles for this template -->
		<link href="/css/personal.css" rel="stylesheet">
		<!--Font Awesome -->
		<link href="/css/all.css" rel="stylesheet">
		<!-- JQuery -->
		<script src="/js/jquery-3.3.1.min.js" type="text/javascript"></script>
		<!--Bootstrap JS -->
		<script src="/js/bootstrap.min.js" type="text/javascript"></script>
	</head>
	<body>
		<div id="carga">
			<img src="/ajax-loader.gif">
		</div>
		<header>
			@include('layouts.navbar')
		</header>
		<!-- Begin page content -->
		<br>
		@include('flash::message')
		<main role="main" class="container">
			@yield('content')
			<script>
				$(document).ajaxStart(function() {
					$("#carga").show();
				});
				$(document).ajaxStop(function() {
					$("#carga").hide();
				});
			</script>			
		</main>
		<!-- Begin footer -->
		<footer class="footer">
			<div class="container">
				<span class="text-muted small">Desarrollado por Nicolás Oyarce</span>
			</div>
		</footer>
	</body>
</html>
