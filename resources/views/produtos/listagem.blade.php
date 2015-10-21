@extends('layout.principal')

@section('conteudo')

	@if(empty($produtos))

		<div class="alert alert-danger">
			Nenhum produto cadastrado!
		</div>

	@else

		<h1>Listagem de Produtos</h1>

		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				@foreach($produtos as $produto)
					<tr class="{{$produto->quantidade<=1 ? 'danger' : ''}}">
						<td>{{ $produto->nome }}</td>
						<td>{{ $produto->valor }}</td>
						<td>{{ $produto->descricao }}</td>
						<td>{{ $produto->quantidade }}</td>
						<td><a href="/produtos/mostra/{{$produto->id}}"><span class="glyphicon glyphicon-search"></span></a></td>
						<td><a href="/produtos/remove/{{$produto->id}}"><span class="glyphicon glyphicon-trash"></span></a></td>
						<td><a href="/produtos/altera/{{$produto->id}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
					</tr>
				@endforeach
			</table>
		</div>

	@endif

	<h4>
		<samp class="label label-danger pull-right">Um ou menos itens no estoque</samp>
	</h4>

	@if(old('nome'))
		<div class="alert alert-success">
			<strong>Sucesso</strong>
				O produto {{ old('nome') }} foi adicionado.
		</div>
	@endif

@endsection