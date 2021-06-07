@extends('admin.layout.template01')



@section('principal')
    <h1 class="text-center bg-green-400 text-3xl uppercase font-black my-1">Listagem de Produtos</h1>
    <form action="{{route('produtos.search')}}" method="post" class="bg-green-300">
        @csrf
        <div class="max-w-sm bg-green-300  my-1 p-1 pr-0 flex items-center">
            <input type="text" name="search" placeholder="Pesquisar" class="flex-1 appearance-none rounded shadow p-1 text-grey-dark mr-2 focus:outline-none">
            <button type="submit" class="uppercase p-1 rounded bg-blue-500 text-blue-50 max-w-max shadow-sm hover:shadow-lg">Pesquisar</button>
        </div>

        <hr>
    </form>
    <hr>
    <div class="w-12/12 p-6 bg-green-400 sm:w-12/12 md:w-5:12 mx-auto">
        <div class="justify-self-center max-w-sm bg-green-400 p-1 pr-0 flex items-center">
            <a href="{{ route('produtos.create') }}" class=" text-center px-6 py-1 rounded bg-yellow-700 text-blue-50 max-w-max shadow-sm hover:shadow-lg">Cadastrar Novo Produto</a>
        </div>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="px-10 py-1 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Imagem</th>
                    <th class="px-10 py-1 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Descrição do Produto</th>
                    <th class="px-20 py-1 border-b-2 border-gray-300 text-right text-sm leading-4 text-blue-500 tracking-wider">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td  class="px-6 py-1 whitespace-no-wrap border-b border-gray-500">
                            <img src="{{ url("storage/{$produto ->imagem}") }}" alt="{{ $produto ->descricao }}" class="w-10">
                        </td>
                        <td class="px-6 py-1 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $produto -> descricao }}</td>
                        <td class="px-6 py-1 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5 text-right">
                            <a href="{{ route('produtos.show', [$produto ->id]) }}"  class="px-5 py-1 border-blue-900 border bg-blue-900 text-white rounded transition duration-300 hover:bg-blue-400 hover:text-white focus:outline-none">Ver</a>
                            <a href="{{ route('produtos.edit', [$produto ->id]) }}"  class="px-5 py-1 border-blue-900 border bg-blue-900 text-white rounded transition duration-300 hover:bg-blue-400 hover:text-white focus:outline-none">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if(session('message'))
        <div class="flex justify-center items-center m-1 font-medium py-1 px-2 rounded-md text-green-700 bg-green-100 border border-green-300 ">
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
