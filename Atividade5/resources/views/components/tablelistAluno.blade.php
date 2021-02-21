<div class="table-responsive" style="overflow-x:visible; overflow-y: visible;">
    <table class="table table-striped" id="tabela">
        <thead>
            <tr style="text-align: center">
                @foreach ($header as $item)
                    <th>{{$item}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr style="text-align: center">
                    <td style="display:none;">{{ $item['id']}}</td>

                    <td>{{ $item->nome}}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->curso->nome }}</td>

                    <td>
                        <select class="form-control">
                            @foreach($item->disciplina as $disciplina)
                                <option>{{$disciplina->nome}}</option>
                            @endforeach
                        </select>
                    </td>

                    <td  class="text-center d-flex align-items-center justify-content-center">
                        <a class="btn"nohref style="cursor:pointer" onCLick="visualizar('{{ $item['id'] }}')">
                            <i class="fa fa-question"></i>
                        </a>
                        <a class="btn" nohref style="cursor:pointer" onCLick="editar('{{ $item['id'] }}')">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
                        <a class="btn" nohref style="cursor:pointer" onCLick="remover('{{ $item['id'] }}' , '{{ $item['nome'] }}')">
                            <i class="fa fa-trash-o"></i>
                        </a>
                        <a href="{{route('matricula.show', $item->id)}}" style='cursor: pointer'><img src="{{ asset('img/icons/config.svg') }}" class='icon'></a>
                        <form action="{{ route('aluno.destroy', $item['id']) }}" method="POST" name="form_{{$item['id']}}">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>