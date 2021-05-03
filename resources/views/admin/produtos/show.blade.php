<h1>Detalhe do produto: {{$produtos->descricao}}</h1>
<hr>
<form action="{{route('produtos.index')}}" method="get">
    <button type="submit"><-- Pagina Inicial</button>
</form>
<hr>
<UL>
    <li><strong>Descricao:</strong> {{$produtos->descricao}}</li> 
    <li><strong>Unidade: </strong>{{$produtos->unidade}}</li>
    <li><strong>Valor: </strong>{{$produtos->valor}}</li>
</UL>

<form action="{{route('produtos.delete', $produtos->id)}}" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit">Deletar o produto</button>
</form> 