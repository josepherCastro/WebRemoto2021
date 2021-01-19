<h2>Lista das Cidades</h2>

<a href="{{route('cidade.create')}}"> <h4>Nova Cidade</h4> </a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Cidade</th>
            <th>Porte</th>
            <th>INFO</th>
            <th>EDITAR</th>
            <th>REMOVER</th>
        </tr>
    </thead>
    @foreach ($cidades as $item)
    <tbody>
        <td>{{ $item['id'] }}</td>
        <td>{{ $item['cidade'] }}</td>
        <td>{{ $item['porte'] }}</td>
        <td><a href="{{route('cidade.show', $item['id'])}}">info</a></td>
        <td><a href="{{route('cidade.edit', $item['id'])}}">editar</a></td>
        <td>
            <form action="{{route('cidade.destroy', $item['id']) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="remover">
            </form>
        </td>
        
    </tbody>
    @endforeach
</table>