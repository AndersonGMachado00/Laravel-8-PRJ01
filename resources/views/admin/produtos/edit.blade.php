<h1>Atualizar o Produto: <strong>{{$produtos->descricao}}</strong></h1>
<hr>
<form action="{{route('produtos.index')}}" method="get">
    <button type="submit"><-- Pagina Inicial</button>
</form>
<hr>
<form action="{{route('produtos.update', $produtos->id)}}" method="post">
    @method('PUT')
    @include('admin.produtos._reuso.form')
</form>
<hr>
