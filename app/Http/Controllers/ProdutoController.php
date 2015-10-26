<?php

namespace Estoque\Http\Controllers;

use Request;
use Estoque\Http\Requests;
use Estoque\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Estoque\Produto;
use Estoque\Http\Requests\ProdutosRequest;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        // $this->middleware('autorizacao');  // todos os métodos passarão pela middleware
        // $this->middleware('autorizacao',['only' => ['adiciona', 'remove']]);  // somente os métodos adiciona e remove passarão pela middleware
        // $this->middleware('autorizacao',['except' => ['lista']]);  // todos os métodos passarão pela middleware exceto o listar
        $this->middleware('auth',['except' => ['lista']]);  // usando o middleware de autenticação padrão do laravel
    }

    public function lista()
    {
        $produtos = Produto::all();

        return view("produtos.listagem")->with("produtos", $produtos);
    }

    public function mostra($id)
    {
        $produto = Produto::find($id);

        if (empty($produto))
        {
            return "Esse produto não existe";
        }

        return view("produtos.detalhes")->with("produto", $produto);
    }

    public function novo()
    {
        return view('produtos.formulario');
    }

    public function adiciona(ProdutosRequest $request)
    {
        ### validação ###



        ### fim validação ###

        ### passando todos os parâmetros manualmente ###
        // $produto = new Produto();
        // $produto->nome = Request::input('nome');
        // $produto->descricao = Request::input('descricao');
        // $produto->valor = Request::input('valor');
        // $produto->quantidade = Request::input('quantidade');

        // $produto->save();

        ### passando automaticamente usando o metodo Request::all() ###
        // $params = Request::all();
        // $produto = new Produto($params);

        // $produto->save();

        ### usando a factory create para criar o objeto, passar os parâmetros e gravar no banco
        Produto::create($request->all());

        ### redirecionando para uma URI ###
        // return redirect('/produtos')
            // ->withInput(Request::only('nome'));
        // OU
        ### redirecionando para uma action da controle (mais recomendado) ###
        return redirect()
            ->action('ProdutoController@lista')
            ->withInput(Request::only('nome'));
    }

    public function listaJson()
    {
        $produtos = Produto::all();
        return $produtos;
    }

    public function remove($id)
    {
        $produto = Produto::find($id);
        $produto->delete();

        return redirect()
            ->action('ProdutoController@lista');
    }

    public function altera($id)
    {
        $produto = Produto::find($id);

        if (empty($produto))
        {
            return "Esse produto não existe";
        }

        return view("produtos.altera")->with("produto", $produto);
    }

    public function salva(ProdutosRequest $request, $id)
    {
        Produto::find($id)->update(Request::all());

        return redirect()
            ->action('ProdutoController@lista');
    }

}
