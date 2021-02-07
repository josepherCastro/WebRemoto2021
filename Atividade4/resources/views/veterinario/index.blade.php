@extends('templates.main', ['titulo'=> "Veterinario", 'tag' => "VET"])

@section('titulo') Veterinarios @endsection

@section('conteudo')

<div class="row">
    <div class="col-sm-12">
        <a href="{{route('veterinario.create')}}" class="btn btn-primary btn-block">
            <b>Novo Veterinario</b>
        </a>
    </div>
</div>
<br>

<x-tablelistVeterinario :header="['Nome','Evento']" :data="$veterinario"/>

@endsection