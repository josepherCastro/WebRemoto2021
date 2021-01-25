@extends('templates.main', ['titulo' => "Informações da Cidade", 'tag' => "CID"])

@section('titulo') {{$dados['cidade']}} @endsection

@section('conteudo')

<ul class="list-group list-group-flush">
    <li class="list-group-item"><b>ID:</b> {{$dados['id']}}</li>
    <li class="list-group-item"><b>Cidade:</b> {{$dados['cidade']}}</li>
    <li class="list-group-item"><b>Porte:</b> {{$dados['porte']}}</li>
    <li class="list-group-item">
        <a href="{{route('cidade.index')}}" class="btn btn-secondary btn-block"><b>Voltar</b></a>
    </li>
</ul>

@endsection