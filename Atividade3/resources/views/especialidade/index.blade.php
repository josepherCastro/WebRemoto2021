@extends('templates.main', ['titulo'=> "Especialidade", 'tag' => "ESP"])

@section('titulo') Especialidades @endsection

@section('conteudo')

<div class="row">
    <div class="col-sm-12">
        <a href="{{route('especialidade.create')}}" class="btn btn-primary btn-block">
            <b>Nova Especialidade</b>
        </a>
    </div>
</div>
<br>

<x-tablelistEspecialidade :header="['Nome','Evento']" :data="$especialidade"/>

@endsection