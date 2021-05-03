<h1>Cadastro de Produtos</h1>
<hr>
<form action="{{route('produtos.index')}}" method="get">
    <button type="submit"><-- Pagina Inicial</button>
</form>
<hr>
<form action="{{route('produtos.store')}}" method="post">
    @include('admin.produtos._reuso.form')
</form>
<hr>
