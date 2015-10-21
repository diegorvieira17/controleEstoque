<html>
	<head>
		<link href="/css/app.css" rel="stylesheet">
		<link href="/css/custom.css" rel="stylesheet">
		<title>Controle de estoque</title>

		<!-- Fonts -->
		<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="/produtos">
							Controle de Estoque
						</a>
					</div>
					<ul class="nav navbar-nav navbar-left">
						<li><a href="{{action('ProdutoController@lista')}}">Listagem</a></li>
						<li><a href="{{action('ProdutoController@novo')}}">Novo</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						@if (Auth::guest())
							<li><a href="/auth/login">Login</a></li>
							<li><a href="/auth/register">Register</a></li>
						@else
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="/auth/logout">Logout</a></li>
								</ul>
							</li>
						@endif
					</ul>
				</div>
			</nav>
			@yield("conteudo")
			<footer class="footer">
				<p>© Desenvolvido por mobileProject.</p>
			</footer>

				<!-- Scripts -->
				<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
				<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
		</div>
	</body>
</html>