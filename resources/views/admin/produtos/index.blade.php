@extends('admin.layout.template01')

@section('title', 'Listagem de Produtos')

@section('principal')
    <h1 color='red'>Produtos Cadastrados</h1>
    <hr>
    <form action="{{route('produtos.search')}}" method="post">
        @csrf
        <input type="text" name="search" placeholder="Pesquisar">
        <button type="submit">Pesquisar</button>
        <hr>
    </form>
    <hr>
    @foreach ($produtos as $produto)
    <p>{{ $produto -> descricao }}
            [<a href="{{ route('produtos.show', [$produto ->id]) }}">Ver</a>]
            [<a href="{{ route('produtos.edit', [$produto ->id]) }}">Editar</a>]        
        </p>
    @endforeach
    <hr>
    <a href="{{ route('produtos.create') }}">Cadastrar novo produto</a>
    <hr>
    @if(session('message'))
        <div>
            {{session('message')}}
        </div>
    @endif
    <hr>
    @if(isset($filter))
        {{$produtos->appends($filter)->links()}}
    else
        {{$produtos->links()}}
    @endif
@endsection