<h2>Cadastrar Cidade </h2>

<form action = "{{ route('cidade.store') }}" method = "POST">
    @csrf
    <a href="{{route('cidade.index')}}"><h4>voltar</h4></a>
    <label>Cidade : </label> <input type="text" name="nome">

    <div>
        <label>Porte: </label>
        <select name="porte">
            <option value="pequeno">Pequeno</option>
            <option value="medio">Medio</option>
            <option value="grande">Grande</option>
        </select>
    </div>

    <input type="submit" value="Salvar">
</form>