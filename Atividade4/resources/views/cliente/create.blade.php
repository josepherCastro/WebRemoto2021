@extends('templates.main',['titulo'=> " Cadastrar Cliente", 'tag' => "CID"])

@section('titulo') Cadastrar Cliente @endsection

@section('conteudo')

<form action = "{{ route('cliente.store') }}" method = "POST">
        @csrf
        <div class="form-group">
            <div class='row'>
                <div class='col-sm-6'>
                    <label>Nome</label>
                    <input value="{{old('nome')}}" type="text" class="form-control" name="nome">
                </div>
                <div class='col-sm-6'>
                    <label>Email</label>
                    <input value="{{old('email')}}" type="text" class="form-control" name="email">
                </div>
                <div class='col-sm-6'>
                    <label>Telefone</label>
                    <input value="{{old('telefone')}}" type="text" class="form-control" name="telefone">
                </div>
            </div>
            <div class='row' style="margin-top:20px">
                <div class='col-sm-4'>
                        <a href="{{route('cliente.index')}}" class="btn btn-danger btn-block"><b>Cancelar / Voltar</b></a>
                </div>
                <div class='col-sm-8'>
                    <button type="submit" class="btn btn-success btn-block"><b>Confirmar / Salvar</b></button>
                </div>
            </div>
        </div>
    </form>

@endsection