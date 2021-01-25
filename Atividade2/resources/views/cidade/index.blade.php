@extends('templates.main', ['titulo'=> "Cidades", 'tag' => "CID"])

@section('titulo') Cidades @endsection

@section('conteudo')

<div class="row">
    <div class="col-sm-12">
        <a href="{{route('cidade.create')}}" class="btn btn-primary btn-block">
            <b>Nova Cidade</b>
        </a>
    </div>
</div>
<br>

<x-tablelist :header="['ID','Cidade','Porte','Info','Editar','Remover']" :data="$cidades"/>

@endsection