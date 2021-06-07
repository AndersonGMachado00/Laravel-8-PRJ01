@extends('admin.layout.template01')



@section('title', 'Cadastro de Produtos')

@section('principal')
    <form action="{{route('produtos.index')}}" method="get">
        <button type="submit"><-- Pagina Inicial</button>
    </form>
    <hr>

    <h1 class="text-center text-3x1 uppercase font-black my-4">Novo Cadastro</h1>
    <div class="w-11/12 p-12 bg-write sm:w-8/12 md:w-5:12 mx-auto">
        <form action="{{route('produtos.store')}}" method="post" enctype="multipart/form-data" >
            @include('admin.produtos._reuso.form')
        </form>
    </div>
@endsection
<hr>

