@extends('layout.principal')

@section('conteudo')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					<h4>Usuário {{ Auth::user()->name }} logado com sucesso!</h4>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
