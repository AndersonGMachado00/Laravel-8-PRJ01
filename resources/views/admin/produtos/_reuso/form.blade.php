<hr>
@if($errors -> any())
    <ul>
        @foreach($errors->all() as $errors )
            <li>{{ $errors }}</li>
        @endforeach
    </ul>
@endif
@csrf
<input type="string" name="descricao" id="descricao" placeholder="Descrição" value="{{$produtos->descricao ?? old('descricao')}}">
<input type="string" name="unidade" id="unidade" placeholder="Unidade" value="{{$produtos->unidade ?? old('unidade')}}">
<input type="string" name="valor" id="valor" placeholder="Vlr_R$" value="{{$produtos->valor ?? old('valor')}}">
<br> <br> <input type="file" name="imagem" id="imagem"><br>
<button type="submit">Enviar</button>
