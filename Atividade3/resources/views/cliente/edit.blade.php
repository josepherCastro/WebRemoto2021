@extends('templates.main', ['titulo' => "Alterar Cliente",'tag' => "CLI"])


@section('conteudo')
    <form action ="{{ route('cliente.update', $cliente['id'])}}" method = "POST">
        @csrf
        <div class="form-group">
            <label class="font-weight-bold">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{$cliente['nome'] }}">
        </div>

        <div class="row">
            <div class="col-sm-7">
                <div class="form-group">
                    <label class="font-weight-bold" >E-mail</label>
                    <input type="text" name="email" class="form-control" value="{{ $cliente['email'] }}">

                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <label class="font-weight-bold">Telefone</label>
                    <input type="text" name="telefone" class="form-control" value="{{ $cliente['telefone'] }}">

                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-4">
                <a  href="{{ route('cliente.index') }}" class="btn btn-danger btn-lg w-100">Cancelar / Voltar</a>
            </div>
            <div class="col-sm-8">
                <button type="submit" class="btn btn-primary btn-lg w-100">Confirmar / Salvar</button>
            </div>
        </div>

        @method('PUT')
    </form>
@endsection