<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProdutos;
use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index() 
    { 
        $produtos = Produtos::orderby('descricao', 'asc')->paginate();
        return view('admin.produtos.index', compact('produtos'));    
    }

    public function create()
    {
    //    dd('estou no create' );
        return view('admin.produtos.create');
    }
    public function store(StoreUpdateProdutos $request)
    {
        $Produtos = Produtos::create($request ->all());
        return redirect()
                ->route('produtos.index')
                ->with('message', 'Produto Criado com sucesso!!!');
    }
    public function show($id)  
    {
       // $produtos = Produtos::where('id', $id)->first();
       if(!$produtos = Produtos::find($id))
       {
           return redirect()->route('produtos.index');
       } 
       // dd($produtos);
       return view('admin.produtos.show', compact('produtos'));
    }  
    public function delete($id)
    {
        //dd('deletando produto....');
        if(!$produtos = Produtos::find($id))
            return redirect()->route('produtos.index');
        $produtos->delete();
        return redirect()
                ->route('produtos.index')
                ->with('message', 'Produto deletado com sucesso!!!');
    }
    public function edit($id)  
    {
       // $produtos = Produtos::where('id', $id)->first();
       if(!$produtos = Produtos::find($id))
       {
           return redirect()->back();
       } 
       // dd($produtos);
       return view('admin.produtos.edit', compact('produtos'));
    }
    public function update(StoreUpdateProdutos $request, $id)  
    {
       // $produtos = Produtos::where('id', $id)->first();
       if(!$produtos = Produtos::find($id))
       {
           return redirect()->back();
       } 
       // dd($produtos);
       
       $produtos->update($request->all());

       return redirect()
                ->route('produtos.index')
                ->with('message', 'Produto atualizado com sucesso!!!');
    }    
    public function pesquisa(Request $request)
    {
        //dd('Pesquisando por {$request->pesquisa}');
        $Filter = $request->except('_token');
        $produtos = Produtos::where('descricao', 'LIKE', "%{$request->search}%")            
                            ->orwhere('unidade', 'LIKE', "%{$request->search}%")
                            ->orderby('descricao', 'asc')->paginate();
        return view('admin.produtos.index', compact('produtos'));
    }
}
