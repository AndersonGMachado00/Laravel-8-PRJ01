<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProdutos;
use App\Models\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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
        $dados =  $request ->all();
     //   dd ($dados);

        if($request->imagem->IsValid())
            {
            //dd($request->imagem);
            $namefile = Str::of($request->descricao)->slug('-'). '.' .$request->imagem->getClientOriginalExtension();
            //dd($request->file());
            $imagem = $request->imagem->storeAs('imagens', $namefile);
            $dados['imagem'] = $imagem;
            //dd($dados['imagem']);
        }
        Produtos::create($dados);

        return redirect()
                ->route('produtos.index')
                ->with('message', 'Produto Criado com sucesso!!!');
    }
    public function show($id)
        {
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

        if (Storage::exists($produtos->imagem))
            Storage::delete($produtos->imagem);

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
       $dados = $request->all();

       if($request->imagem && $request->imagem->IsValid())
            {
                if (Storage::exists($produtos->imagem))
                    Storage::delete($produtos->imagem);
            //dd($request->imagem);
            $namefile = Str::of($request->descricao)->slug('-'). '.' .$request->imagem->getClientOriginalExtension();
            //dd($request->file());
            $imagem = $request->imagem->storeAs('imagens', $namefile);
            $dados['imagem'] = $imagem;
            //dd($dados['imagem']);
       }
       $produtos->update($dados);

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
