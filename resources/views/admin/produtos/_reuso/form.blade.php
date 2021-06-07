<hr>
@if($errors -> any())
    <ul>
        @foreach($errors->all() as $errors )
            <li class="flex justify-center items-center m-1 font-medium py-1 px-2 rounded-md text-yellow-700 bg-yellow-100 border border-yellow-300">{{ $errors }}</li>
        @endforeach
    </ul>
@endif
@csrf
<input type="string" name="descricao" id="descricao" placeholder="Descrição" value="{{$produtos->descricao ?? old('descricao')}}" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner">
<input type="string" name="unidade" id="unidade" placeholder="Unidade" value="{{$produtos->unidade ?? old('unidade')}}" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner">
<input type="string" name="valor" id="valor" placeholder="Vlr_R$" value="{{$produtos->valor ?? old('valor')}}" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner">
<br> <br> <input type="file" name="imagem" id="imagem" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"><br>
<button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">Enviar</button>
