@extends('layout.principal')

@section('conteudo')

	<h1>Alterar Produto</h1>

	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
			</ul>
		</div>
	@endif

	<form action="/produtos/salva/{{ $produto->id }}" method="post">

		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

		<div class="form-group">
			<label>Nome</label>
			<input name="nome" class="form-control" value="{{ $produto->nome }}">
		</div>
		<div class="form-group">
			<label>Descrição</label>
			<input name="descricao" class="form-control" value="{{ $produto->descricao }}">
		</div>
		<div class="form-group">
			<label>Valor</label>
			<input name="valor" class="form-control" value="{{ $produto->valor }}">
		</div>
		<div class="form-group">
			<label>Quantidade</label>
			<input name="quantidade" type="number" class="form-control" value="{{ $produto->quantidade }}">
		</div>
		<button type="submit" class="btn btn-primary btn-block">Submit</button>
	</form>

@endsection