<h2>Alterar Cidade</h2>

<form action="{{ route('cidade.update', $dados['id'])}}" method="POST">
    @csrf
    @method('PUT')
    <a href="{{route('cidade.index')}}"><h4>voltar</h4></a>
    <label>Cidade : </label> <input type="text" name="cidade" value="{{$dados ['cidade']}}">

    <div>
        <label>Porte: </label>
        <select name="porte" value="{{$dados ['porte']}}">
            <option >Pequeno</option>
            <option >Medio</option>
            <option >Grande</option>
        </select>
    </div>
    <input type="submit" value="Salvar">

</form>