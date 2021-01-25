@extends('templates.main',['titulo'=> " Cadastrar Cidade", 'tag' => "CID"])

@section('titulo') Cadastrar Cidade @endsection

@section('conteudo')

<form action = "{{ route('cidade.store') }}" method = "POST">
        @csrf
        <div class="form-group">
            <div class='row'>
                <div class='col-sm-6'>
                    <label>Cidade</label>
                    <input type="text" class="form-control" name="nome">
                </div>
                <div class='col-sm-6'>
                    <label>Porte</label>
                    <select name="porte" class="form-control">
                        <option value="pequeno">Pequeno</option>
                        <option value="medio">Medio</option>
                        <option value="grande">Grande</option>
                    </select>
                </div>
            </div>
            <div class='row' style="margin-top:20px">
                <div class='col-sm-4'>
                        <a href="{{route('cidade.index')}}" class="btn btn-danger btn-block"><b>Cancelar / Voltar</b></a>
                </div>
                <div class='col-sm-8'>
                    <button type="submit" class="btn btn-success btn-block"><b>Confirmar / Salvar</b></button>
                </div>
            </div>
        </div>
    </form>

@endsection